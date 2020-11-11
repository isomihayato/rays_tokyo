<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tattoo;

class PagesController extends Controller
{
  public function index()
  {
    $articles = Article::orderBy('created_at','desc')->take(10)->get();
    $tattoos  = Tattoo::orderBy('created_at','desc')->take(10)->get();

    return view('pages.index',[
      'articles' => $articles,
      'tattoos' => $tattoos,
    ]);
  }
  public function gallery()
  {
    return view('pages.gallery',[
      
    ]);
  }
  public function artists()
  {
    // code...
  }
  public function blogs()
  {
    // code...
  }
}
