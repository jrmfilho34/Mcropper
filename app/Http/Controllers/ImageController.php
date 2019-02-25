<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class ImageController extends Controller
{
    public function upload(ImageRequest $request)
    {
     
      $user = Auth::id();
      $imageName = $request->url;
      $imageName = time().$imageName;
      $path = $request->image->storeAs('images',$imageName);
      User::where('id',$user)->update(['avatar' => $path]);
     
      return response()->json(['success'=>'You have successfully upload image.']);
    }
}
