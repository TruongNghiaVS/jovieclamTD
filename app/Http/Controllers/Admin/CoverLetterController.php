<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Input;
use Redirect;
use App\CoverLetter;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\CoverLetterRequest;
use Image;
use App\Traits\Helper;

class CoverLetterController extends Controller
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

    public function indexCoverLetters()
    {
        $data = [
            'cover_letter' => CoverLetter::get()
        ];

        return view('admin.cover_letter.index', $data);
    }

    public function createCoverLetter()
    {
        return view('admin.cover_letter.add');
    }

    public function storeCoverLetter(CoverLetterRequest $request)
    {
        $data = $request->all();
        $path = 'public/uploads/cover_letter/';
        $image_thumbnail = $request->file('image_thumbnail');
        if ($image_thumbnail != '') {
            $UploadImageThumb = $this->upload_file($image_thumbnail, $path);
        }
        
        $image_main = $request->file('image_main');
        if ($image_main != '') {
            $UploadImageMain = $this->upload_file($image_main, $path);
        }

        $file = $request->file('file');
        if ($file != '') {
            $UploadFile = $this->upload_file($file, $path);
        }

        $data['image_thumbnail'] = $UploadImageThumb['file_path'];
        $data['image_main'] = $UploadImageMain['file_path'];
        $data['file_path'] = $UploadFile['file_path'];

        $cover_letter = CoverLetter::create($data);
        /*         * ************************************ */
        flash(__('Cover Letter has been added!'))->success();
        return \Redirect::route('edit.cover-letter.detail', array($cover_letter->id));
    }

    public function editCoverLetter($id)
    {
        $cover_letter = CoverLetter::findOrFail($id);
        return view('admin.cover_letter.edit')
                        ->with('cover_letter', $cover_letter);
    }

    public function updateCoverLetter($id, CoverLetterRequest $request)
    {
        $cover_letter = CoverLetter::findOrFail($id);
        $data = $request->all();

        $path = 'public/uploads/cover_letter/';
        $image_thumbnail = $request->file('image_thumbnail');
        if ($image_thumbnail != '') {
            $UploadImageThumb = $this->upload_file($image_thumbnail, $path);
            $data['image_thumbnail'] = $UploadImageThumb['file_path'];
        }else {
            $data['image_thumbnail'] = $cover_letter->image_thumbnail;
        }
        
        $image_main = $request->file('image_main');
        if ($image_main != '') {
            $UploadImageMain = $this->upload_file($image_main, $path);
            $data['image_main'] = $UploadImageMain['file_path'];
        }else {
            $data['image_main'] = $cover_letter->image_main;
        }

        $file = $request->file('file');
        if ($file != '') {
            $UploadFile = $this->upload_file($file, $path);
            $data['file_path'] = $UploadFile['file_path'];
        }else {
            $data['file_path'] = $cover_letter->file_path;
        }
        
        $cover_letter->update($data);
        flash(__('Cover Letter has been updated!'))->success();
        return \Redirect::route('edit.cover-letter.detail', array($cover_letter->id));
    }

    public function deleteCoverLetter(Request $request)
    {
        $id = $request->input('id');
        try {
            $cover_letter = CoverLetter::findOrFail($id);
            $cover_letter->delete();
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    public function fetchCoverLettersData(Request $request)
    {
        $cover_letter = CoverLetter::select('*');

        return Datatables::of($cover_letter)
                        ->addColumn('name', function ($cover_letter) {

                            return $cover_letter->name;

                        })

                        ->addColumn('action', function ($cover_letter) {
                            return '
                            <div class="btn-group">
                                <button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Thao tác
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="' . route('edit.cover-letter.detail', ['id' => $cover_letter->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Sửa</a>
                                    </li>						
                                    <li>
                                        <a href="javascript:void(0);" onclick="deleteCoverLetterDetail(' . $cover_letter->id . ');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</a>
                                    </li>
                                    
                                </ul>
                            </div>';
                        })
                        ->rawColumns(['action'])
                        ->setRowId(function($cover_letter) {

                            return 'CoverLetterDtRow' . $cover_letter->id;

                        })

                        ->make(true);
        //$query = $dataTable->getQuery()->get();
        //return $query;
    }

    public function makeActiveCountryDetail(Request $request)
    {
        $id = $request->input('id');
        try {
            $countryDetail = CountryDetail::findOrFail($id);
            $countryDetail->is_active = 1;
            $countryDetail->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeNotActiveCountryDetail(Request $request)
    {
        $id = $request->input('id');
        try {
            $countryDetail = CountryDetail::findOrFail($id);
            $countryDetail->is_active = 0;
            $countryDetail->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function sortCountryDetails()
    {
        $languages = DataArrayHelper::languagesNativeCodeArray();
        return view('admin.cover_letter.sort')->with('languages', $languages);
    }

    public function countryDetailSortData(Request $request)
    {
        $lang = $request->input('lang');
        $countryDetails = CountryDetail::select('countries_details.id', 'countries_details.cover_letter', 'countries_details.sort_order')
                ->where('countries_details.lang', 'like', $lang)
                ->orderBy('countries_details.sort_order')
                ->get();
        $str = '<ul id="sortable">';
        if ($countryDetails != null) {
            foreach ($countryDetails as $countryDetail) {
                $str .= '<li id="' . $countryDetail->id . '"><i class="fa fa-sort"></i>' . $countryDetail->cover_letter . '</li>';
            }
        }
        echo $str . '</ul>';
    }

    public function countryDetailSortUpdate(Request $request)
    {
        $countryDetailOrder = $request->input('countryDetailOrder');
        $countryDetailOrderArray = explode(',', $countryDetailOrder);
        $count = 1;
        foreach ($countryDetailOrderArray as $countryDetailId) {
            $countryDetail = CountryDetail::find($countryDetailId);
            $countryDetail->sort_order = $count;
            $countryDetail->update();
            $count++;
        }
    }
}
