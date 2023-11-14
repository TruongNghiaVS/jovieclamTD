<?php

namespace App\Traits;
use Illuminate\Support\Str;
use DB;
use Storage;
use App\File;
use Pusher;

trait Helper
{
    public static function checkSlug_exists($table, $title, $id = 0) {
        $slug =	Str::slug(trim($title));
        $index = 2;
        $new_slug = $slug;
        $check = DB::table($table)->where('slug', $new_slug);
        if($id > 0) {
            $check = $check->where('id', '<>', $id);
        }
        $check = $check->exists();
        while($check){
            $new_slug = $slug . '-' . $index;
            $index++;
            $check = DB::table($table)->where('slug', $new_slug);
            if($id > 0) {
                $check = $check->where('id', '<>', $id);
            }
            $check = $check->exists();
        }
        return $new_slug;
	}

    public static function changevalidation($validator) {
        $obj = $validator;
        $result = [];
        foreach($obj as $input => $rules){
            reset($rules); //Ensure that we're at the first element
            $rule = key($rules);
            $result[$input] = $rule;
        }

        return $result;
    }

    public static function get_settings($args) {
        $data = [];
        if(!is_null($args)){
            foreach($args as $value){
                $data[$value] = '';
            }
            $settings = DB::table('settings')->whereIn('setting_name', $args)->select('setting_name', 'setting_value')->get();
            if(!is_null($settings)){
                foreach($settings as $setting){
                    $data[$setting->setting_name] = $setting->setting_value;
                }
            }
        }
        return $data;
    }

    public static function upload_file($file, $path) {
        $file_size = $file->getSize();
        $date_folder = date('Y-m-d');
        $path = $path.$date_folder;
        $extension = $file->getClientOriginalExtension();
        $mime_type = $file->getClientMimeType();
        $slug_name = str_replace('.' . $extension, '', trim($file->getClientOriginalName()));
        $file_name = Str::slug($slug_name);
        $filename_origin = $file_name;
        
        $media_name = $file_name;
        // $get_file_name = DB::table('files')->where('name', $file_name)->count();
        // $file_index = 2;
        // while($get_file_name > 0){
        //     $file_name = $file_name . '-' . $file_index;
        //     $get_file_name = DB::table('files')->where('name', $file_name)->count();
        //     $file_index++;
        // }
        $cdn_upload = Storage::disk('local')->putFileAs($path, $file, $file_name . '.' . $extension);
        $file_path = Storage::disk('local')->url($cdn_upload);
		return [
            'file_name' => $file_name,
            'extension' => $extension,
            'file_path' => $file_path
        ];
	}

    public static function Pusher() {
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        return $pusher;
    }

    public static function _substr($str, $length, $minword = 3){
		$sub = '';
		$len = 0;
		foreach (explode(' ', $str) as $word){
			$part = (($sub != '') ? ' ' : '') . $word;
			$sub .= $part;
			$len += strlen($part);
			if (strlen($word) > $minword && strlen($sub) >= $length){
				break;
			}
		}
		return $sub . (($len < strlen($str)) ? ' ...' : '');
	}
}
