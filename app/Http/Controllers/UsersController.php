<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    const AUTH_TYPES = ['2'=>'OWNER','3'=>'OWNER MANAGER','5'=>'MANAGER','7'=>'STAFF'];
    public function index()
    {
      $users =User::where([['existence',true],['role','!=',1]])->get();
      return view('users.index',[
          'users' => $users
      ]);
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);

      $user->belongs_to = array_pad(explode(',',$user->belongs_to),3,'');

      return view('users.edit',[
        'user' => $user,
        'authes' => self::AUTH_TYPES,
      ]);
    }

    public function create()
    {
      $user = new User;

      return view('users.create',[
        'user' => $user,
        'authes' => self::AUTH_TYPES,
      ]);
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:255',
        'role' => 'required|max:16',
        'login_id' => 'required',
        'belongs_to' => 'required',
        'password' => 'required',
      ]);
      $user = new User;
      $user->name = $request->name;
      $user->role = $request->role;
      $user->login_id = $request->login_id;
      $user->insta_id = '';
      $user->belongs_to = implode(',',$request->belongs_to);
      $user->password = Hash::make($request->password);
      $user->save();
      return redirect('users');
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:255',
        'role' => 'required|max:16',
        'login_id' => 'required',
        'belongs_to' => 'required',
        'password' => 'required',
      ]);
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->role = $request->role;
      $user->login_id = $request->login_id;
      $user->insta_id = $request->insta_id;
      $user->belongs_to = implode(',',$request->belongs_to);
      $user->password = Hash::make($request->password);
      $user->save();
      return redirect('users');
    }


    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->existence = false;
      $user->save();
      return redirect('users');
    }

}
