<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    const AUTH_TYPES = ['owner'=>'OWNER','manager'=>'MANAGER','staff'=>'STAFF'];
    public function index()
    {
      $users =User::where('existence',true)->get();
      return view('users.index',[
          'users' => $users
      ]);
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);

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
      ]);
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:255',
        'role' => 'required|max:16',
        'password' => 'required'
      ]);
      $user = new User;
      $user->name = $request->name;
      $user->role = $request->role;
      $user->password = $request->password;
      $user->save();
      return redirect('users');
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:255',
        'role' => 'required|max:16',
        'password' => 'required'
      ]);
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->role = $request->role;
      $user->password = $request->password;
      $user->save();
      return redirect('users');
    }


    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return redirect('users');
    }

}
