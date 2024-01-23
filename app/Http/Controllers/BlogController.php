<?php
namespace App\Http\Controllers;
use App;
use App\Seo;
use App\Job;
use App\Company;
use App\FunctionalArea;
use App\Country;
use App\Video;
use App\Industry;
use App\Testimonial;
use App\Slider;
use App\Blog;
use App\Blog_category;
use Illuminate\Http\Request;
use App\Total_jobs;
use Redirect;
use App\Traits\CompanyTrait;
use App\Traits\FunctionalAreaTrait;
use App\Traits\CityTrait;
use App\Traits\JobTrait;
use App\Traits\Active;
use App\Helpers\DataArrayHelper;
use App\Traits\Lang;
use DB;
use Cache;
use Session;
class BlogController extends Controller
{
    //use CompanyTrait;
    //use FunctionalAreaTrait;
    // use CityTrait;
    //use JobTrait;
     use Lang;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::orderBy('id', 'DESC')->where('lang', 'like', \App::getLocale())->paginate(10);
        $data['categories'] = Blog_category::get();
        return view(config('app.THEME_PATH').'.blog')->with($data);
    }
    public function getAllCarrier()
    {
        $data['blogs'] = Blog::where('cate_id',17)->paginate(10);
        return $data;
    }
    public function details($slug)
    {

        $data['blog'] = Blog::where('slug','like','%'. $slug.'%')->where("typePost",1)->where('lang', 'like', \App::getLocale())->first();

        $data['blogRelations'] = Blog::where("slug","!=",$slug)
        ->where("cate_id", $data['blog']->cate_id)
        ->where("typePost","1")
        ->where('lang', 'like', \App::getLocale())
        ->take(3)
        ->get();
    
      
        $data['blog_categories'] = Blog_category::where("typePost" , "1")->get();
        $data['blog_relateion'] = Blog_category::where("id", $data['blog']->cate_id)->first();
      
		$data['categories'] = Blog_category::where("typePost" , "1")
                            ->get();
         $data['seo'] = (object) array(
                    'seo_title' => $data['blog']->meta_title,
                    'seo_description' => $data['blog']->meta_keywords,
                    'seo_keywords' => $data['blog']->meta_descriptions,
                    'seo_other' => ''
        );
    
        return view(config('app.THEME_PATH').'.blog_detail')->with($data);
    }
    public function categories($slug)
    {
        $category = Blog_category::where('slug', $slug)
        ->where("typePost" , "1")
        ->first();
        if(!$category)
        {
            dd("not found"); 
        }

      
        $data['category'] = $category;
    
        $data['blogs_categories'] = Blog_category::where("id", $category->id)
        ->where("typePost" , "1")
        ->get();
      
       
        $data['blogs'] = Blog::whereRaw("FIND_IN_SET('$category->id',cate_id)")
                        ->where('lang', 'like', \App::getLocale())
                        ->where("typePost" , "1")
                        ->orderBy('id', 'DESC')
                        ->paginate(10);
        
                    
        return view(config('app.THEME_PATH').'.blog_categories_details', compact('data'));
    }
    public function search(Request $request)
    { 
        $data['serach_result'] = $request->get('search');
        $data['blogs'] =Blog::where('heading', 'like', $request->get('search'))
                ->orWhere('content', 'like','%' . $request->get('search') . '%')->where('lang', 'like', \App::getLocale())
                ->paginate(1);
        $data['categories'] = Blog_category::get();
        return view(config('app.THEME_PATH').'.blog_search')->with($data);
    }
}
