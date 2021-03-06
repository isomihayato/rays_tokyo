<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use App\Ecimage;
use App\User;
use Storage;

class EcimagesController extends Controller
{
  public function index()
  {
    $ecimages = Ecimage::orderBy('id','desc')->paginate(25);

    return view('ecimages.index',[
      'ecimages' => $ecimages,
    ]);
  }

  public function edit($id)
  {
    $ecimage = Ecimage::findOrFail($id);
    $artists = ['0'=>'選択してください'];
    foreach(User::where([['existence',true],['role','!=',1]])->get() as $user){
      $artists += array($user->id=>$user->name);
    }

    return view('ecimages.edit',[
      'ecimage' => $ecimage,
      'artists' => $artists,
    ]);
  }

  public function create()
  {
    $ecimage = new Ecimage;
    $artists = ['0'=>'選択してください'];
    foreach(User::where([['existence',true],['role','!=',1]])->get() as $user){
      $artists += array($user->id=>$user->name);
    }
    return view('ecimages.create',[
      'ecimage' => $ecimage,
      'artists' => $artists,
    ]);
  }

  public function show($id)
  {
    $ecimage = Ecimage::findOrFail($id);

    return view('ecimages.show',[
      'ecimage' => $ecimage,
    ]);
  }

  public function store(Request $request)
  {
    foreach ($request->images as $image) {
      $image_path = Storage::disk('s3')->putFile('upload', $image, 'public');
      $path = Storage::disk('s3')->url($image_path);

      $ecimage = User::findOrFail($request->artist)->ecimages()->create([
        'place' => $request->place,
        'path'  => $path,
      ]);
      $ecimage->save();
    }
    return redirect('ecimages');
  }

  public function update(Request $request, $id)
  {
    if (is_null($request->image)) {
      $ecimage = Ecimage::findOrFail($id);
      $ecimage->place = $request->place;
      $ecimage->user_id = $request->artist;
      $ecimage->save();
    }else {
      $image_path = Storage::disk('s3')->putFile('upload', $request->image, 'public');
      $path = Storage::disk('s3')->url($path);
      $ecimage = Ecimage::findOrFail($id);
      $ecimage->place = $request->place;
      $ecimage->path  = $path;
      $ecimage->user_id = $request->artist;
      $ecimage->save();
    }
    return redirect('ecimages');
  }

  public function destroy($id)
  {
    $ecimage = Ecimage::findOrFail($id);
    $ecimage->delete();
    return redirect('ecimages');
  }

  public function postAccess(Request $request)
  {
    $imgpath = $request->file('file')->store('ecimage_upload', 'public');
    return json_encode(['location' => '/storage/'.$imgpath]);
  }
}
