<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UploadController extends Controller
{
    public function crop(Request $request){
        $path = 'user_image/';
        $file = $request->file('avatar1');
        $new_image_name = 'UIMG'.date('YmdHis').uniqid().'.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        if(!$upload){
            return response()->json(['status'=>0, 'msg'=>'Terjadi kesalahan, silakan coba lagi nanti.']);
        }
        else{
            $UserInfo = User::find(auth()->user()->id);
            $userPhoto = $UserInfo->avatar;
            if($userPhoto != ''){
                unlink($path.$userPhoto);
            }
            $UserInfo->update(['avatar'=>$new_image_name]);
            return response()->json(['status'=>1, 'msg'=>'Berhasil mengunggah foto profil.', 'name'=>$new_image_name]);
        }
    }
}
