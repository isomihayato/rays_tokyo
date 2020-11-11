<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class ToppagesController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('id','desc')->paginate(25);

        return view('home',[
          'notices' => $notices,
        ]);
    }
}
