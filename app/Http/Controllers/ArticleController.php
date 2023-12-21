<?php

namespace App\Http\Controllers;
use App\Models\ArticlePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{

    public function GetArticle($slug)
    {
        $item = ArticlePage::where("slug", $slug)->first();
         if($item)
        {
            return view("templates.employers.article.post", compact('item'));
        }
        else 
        {
            abort(404);

        }
       
    }
}
