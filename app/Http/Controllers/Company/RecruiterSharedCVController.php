<?php

namespace App\Http\Controllers\Company;

use App\RecruiterSharedCV;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecruiterSharedCVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCVs = RecruiterSharedCV::orderBy('created_at','desc')->get(); //RecruiterSharedCV::all()->orderBy('created_at', 'desc');
        return view(config('app.THEME_PATH').'.company.cv.index', compact('allCVs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.THEME_PATH').'.company.cv.add_edit',['edit'=>false ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        RecruiterSharedCV::create($params);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecruiterSharedCV  $CV
     * @return \Illuminate\Http\Response
     */
    public function show(RecruiterSharedCV $CV)
    {
        $link = $CV->word_path;
        $officeGG = "<iframe src=\"https://docs.google.com/gview?url=$link\" frameborder='0'></iframe>";
        return view(config('app.THEME_PATH').'.company.cv.show', compact('CV', 'officeGG'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecruiterSharedCV  $CV
     * @return \Illuminate\Http\Response
     */
    public function edit(RecruiterSharedCV $CV)
    {
        return view(config('app.THEME_PATH').'.company.cv.add_edit',['edit'=>true, 'CV' => $CV]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecruiterSharedCV  $CV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecruiterSharedCV $CV)
    {
        $params = $request->all();
        $CV->update($params);
        return redirect()->route('company.cv.index')->withSuccess( __('CV updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecruiterSharedCV  $cV
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecruiterSharedCV $cV)
    {
        $cV->delete();
        return redirect()->route('company.cv.index')->withSuccess(__('CV deleted successfully'));
    }
}
