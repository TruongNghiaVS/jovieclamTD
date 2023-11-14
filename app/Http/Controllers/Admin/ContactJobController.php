<?php
namespace App\Http\Controllers\Admin;
use App\ContactMessage;
use App\Http\Controllers\Controller;
use App\JobAlert;
use Illuminate\Http\Request;
use App\ContactJob;
use Auth;
use DB;
use Input;
use Redirect;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use Image;
use App\Traits\Helper;
use Carbon\Carbon;
class ContactJobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function indexContactJob()
    {
        $data = [
            'contact_job' => ContactJob::orderByDesc('id')->get()
        ];
        return view('admin.contact_job.index', $data);
    }

    public function contactIndex()
    {
        return view('admin.contact.index',
        ['contacts' => ContactMessage::orderByDesc('id')->get()]);

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
        $data['image_thumbnail'] = $path.$UploadImageThumb['file_path'];
        $data['image_main'] = $path.$UploadImageMain['file_path'];
        $data['file_path'] = $path.$UploadFile['file_path'];
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
    public function fetchContactJobData(Request $request)
    {
        $contact_job = ContactJob::select('*');
        return Datatables::of($contact_job)
                        ->addColumn('email', function ($contact_job) {
                            return $contact_job->email;
                        })
                        ->addColumn('status', function ($contact_job) {
                            return '<span dir="">chưa xem</span>';
                        })
                        ->addColumn('created_at', function ($contact_job) {
                            return Carbon::parse($contact_job->created_at)->format('Y-m-d H:i:s');
                        })
                        ->addColumn('action', function ($contact_job) {
                            return '
                            <div class="btn-group">
                                <button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Thao tác
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="' . route('edit.cover-letter.detail', ['id' => $contact_job->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Sửa</a>
                                    </li>						
                                    <li>
                                        <a href="javascript:void(0);" onclick="deleteCoverLetterDetail(' . $contact_job->id . ');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</a>
                                    </li>
                                </ul>
                            </div>';
                        })
                        ->rawColumns(['action'])
                        ->setRowId(function($contact_job) {
                            return 'CoverLetterDtRow' . $contact_job->id;
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
    /**
     * Fetch email alert data
     */
    public function fetchEmailAlertData(Request $request)
    {

        $jobAlert = JobAlert::select('*')->orderBy('id', 'desc');
        return Datatables::of($jobAlert)
            ->addColumn('email', function ($jobAlert) {
                return $jobAlert->email;
            })
            ->addColumn('verification_status', function ($jobAlert) {
                return $jobAlert->is_verified == 1 ? __('Verified') : __('Not verified yet');
            })
            ->addColumn('subscription_status', function ($jobAlert) {
                return $jobAlert->is_subscribed == 1 ? __('Subscribing') : __('De-subscribed');
            })
            ->addColumn('created_at', function ($jobAlert) {
                return Carbon::parse($jobAlert->created_at)->format('d-m-Y');
            })
            ->setRowId(function($jobAlert) {
                return 'emailAlertDtRow' . $jobAlert->id;
            })
            ->make(true);
        //$query = $dataTable->getQuery()->get();
        //return $query;
    }

    /**
     * Fetch contact data
     */
    public function fetchContactData(Request $request)
    {
        $contactData = ContactMessage::select('*')->orderBy('id', 'desc');
        return Datatables::of($contactData)
            ->addColumn('email', function ($contactData) {
                return $contactData->email;
            })
            ->addColumn('full_name', function ($contactData) {
                return $contactData->full_name;
            })
            ->addColumn('phone', function ($contactData) {
                return $contactData->phone;
            })
            ->addColumn('subject', function ($contactData) {
                return $contactData->subject;
            })
            ->addColumn('message', function ($contactData) {
                return $contactData->message_txt;
            })
            ->addColumn('created_at', function ($contactData) {
                return Carbon::parse($contactData->created_at)->format('d-m-Y');
            })
            ->setRowId(function($contactData) {
                return 'contactDtRow_' . $contactData->id;
            })
            ->make(true);
        //$query = $dataTable->getQuery()->get();
        //return $query;
    }

}
