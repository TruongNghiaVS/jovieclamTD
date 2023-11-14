<?php

namespace App\Http\Controllers\Admin;

use App\CoverLetter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Input;
use Redirect;
use App\AdBanner;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\CoverLetterRequest;
use Image;
use App\Traits\Helper;
use Illuminate\Support\Str;
use Storage;

class AdBannerController extends Controller
{
    use Helper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create()
    {
        return view('admin.ads_banner.add-edit')->withEdit(false);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $path = 'public/uploads/ads_banner/';
        $images = $request->file('image');
        if (!isset($images)) {
            flash(__('Please select image'))->error();
            return Redirect::back();
        }
        foreach ($images as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path().Storage::disk('local')->url($path), $name);
            $data['image'] = $name;
            AdBanner::create($data);
        }
        /*         * ************************************ */
        $ads = count($images) > 1 ? Str::plural('Ad') : 'Ad';

        return Redirect::route('edit.ad-banner')->with('success', __($ads.' added successfully!'));
    }

    public function edit()
    {
        $ads = AdBanner::all();
        return view('admin.ads_banner.add-edit')->withEdit(true)->withAds($ads);
    }

    public function update(Request $request)
    {
        AdBanner::truncate();
        $data = $request->all();
        $path = 'public/uploads/ads_banner/';
        $images = $request->file('image');
        if (!isset($images)) {
            flash(__('Please select image'))->error();
            return Redirect::back();
        }
        foreach ($images as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path().Storage::disk('local')->url($path), $name);
            $data['image'] = $name;
            AdBanner::create($data);
        }

        return Redirect::back()->with('success', __('Updated successfully!'));
    }

}
