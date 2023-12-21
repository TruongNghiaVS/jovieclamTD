<?php

namespace App\Http\Controllers;



use App\Models\AdvertisementBannerJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisementBannerCandiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create(Request $request)
        {
                $priorities = $request->input("priorities");
                $linkDesktop = $request->input("linkDesktop");
                $linkMobile = $request->input("linkMobile");
                $status = $request->input("status");
                $id =  $request->input("idRequest");
               
                $item = AdvertisementBannerJob::where("id", $id)->first();
              
                if($item)
                {
                    $item->linkDesktop = $linkDesktop;
                    $item->linkMobile = $linkMobile;
                    $item->priorities = $priorities;
                    $item->status = $status;
                    $item->save();
                }
                else 
                {
                    $itemInsert = new AdvertisementBannerJob();
                    $itemInsert->linkDesktop = $linkDesktop;
                    $itemInsert->linkMobile = $linkMobile;
                    $itemInsert->priorities = $priorities;
                    $itemInsert->status = "1";
                    $itemInsert->save();

                }
                return true;
        }

     public function getAll(Request $request)
         {
            $possition = $request->input("postion");
            $query = AdvertisementBannerJob::where("status","1");
            if($possition != "")
            {
                $query = AdvertisementBannerJob::where("possition",$possition);
            }
            return $query->get();
        }

        public function delete(Request $request)
        {
           $id = $request->input("id");
           $query = AdvertisementBannerJob::where("id",$id);
           $query->delete();
           return true;
       }

    
}
