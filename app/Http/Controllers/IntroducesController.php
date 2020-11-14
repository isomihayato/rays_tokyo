<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Introduce;
use App\User;

class IntroducesController extends Controller
{
  public function index()
  {
    $introduces = Introduce::orderBy('id','desc')->paginate(25);

    return view('introduces.index',[
      'introduces' => $introduces,
    ]);
  }

  public function edit($id)
  {
    $introduce = Introduce::findOrFail($id);
    $artists = ['0'=>'選択してください'];
    foreach(User::where([['existence',true],['role','!=',1]])->get() as $user){
      $artists += array($user->id=>$user->name);
    }

    return view('introduces.edit',[
      'introduce' => $introduce,
      'artists'   => $artists,
    ]);
  }

  public function create()
  {
    $introduce = new Introduce;
    $artists = ['0'=>'選択してください'];
    foreach(User::where([['existence',true],['role','!=',1]])->get() as $user){
      $artists += array($user->id=>$user->name);
    }

    return view('introduces.create',[
      'introduce' => $introduce,
      'artists' => $artists,
    ]);
  }

  public function show($id)
  {
    $introduce = Introduce::findOrFail($id);

    return view('introduces.show',[
      'introduce' => $introduce,
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
    ]);
    $introduce = User::findOrFail($request->artist)->introduces()->create([
      'title' => $request->title,
      'body'  => $request->editor,
    ]);
    $introduce->save();
    return redirect('introduces');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required'
    ]);
    $introduce = Introduce::findOrFail($id);
    $introduce->title = $request->title;
    $introduce->body  = $request->editor;
    $introduce->save();
    return redirect('introduces');
  }

  public function destroy($id)
  {
    $introduce = Introduce::findOrFail($id);
    $introduce->delete();
    return redirect('introduces');
  }

  public function postAccess(Request $request)
  {
    $imgpath = $request->file('file')->store('introduce_upload', 'public');
    return json_encode(['location' => '/storage/'.$imgpath]);
  }
}
