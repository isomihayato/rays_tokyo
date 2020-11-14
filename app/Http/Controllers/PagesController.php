<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Article;
use App\Category;
use App\Tattoo;
use App\User;

class PagesController extends Controller
{
  public function index()
  {
    $articles = Article::where(
      [
        ['category_id','!=',Category::where('title','recruit')->get()[0]->id],
        ['category_id','!=',Category::where('title','sdcp')->get()[0]->id]
      ])->orderBy('created_at','desc')->take(10)->get();
    $tattoos  = Tattoo::orderBy('created_at','desc')->take(10)->get();

    return view('pages.index',[
      'articles' => $articles,
      'tattoos' => $tattoos,
    ]);
  }
  public function gallery()
  {
    $users = User::where([['existence',true],['role','!=','1']])->get();
    foreach ($users as $user) {
      $user->setRelation('tattoos', $user->tattoos()->paginate(10,['*'],strtolower($user->name)) );
    }
    return view('pages.gallery',[
      'users' => $users,
    ]);
  }
  public function artists()
  {
    $artists = User::where([['existence',true],['role','!=','1']])->get();

    return view('pages.artists',[
      'artists' => $artists,
    ]);
  }
  public function show_artist(Request $request)
  {
    $artist = User::findOrFail($request->artist);
    $artist->setRelation('tattoos',$artist->tattoos()->paginate(10)->appends(["artist" => $artist->id])->appends("#gallery"));
    return view('pages.show_artist',[
      'artist' => $artist,
    ]);
  }
  public function blogs()
  {
    $categories = Category::where([['title','!=','sdcp'],['title','!=','recruit']])->get();
    foreach ($categories as $category) {
      $category->setRelation('articles', $category->articles()->paginate(10,['*'],$category->id));
    }
    $logs = Article::whereYear('created_at', 2020)->orderBy('created_at')->get()->groupBy(function ($row) {
        return $row->created_at->format('Y-m');
    })->map(function ($day) {
        return count($day);
    });
    return view('pages.blogs',[
      'categories' => $categories,
      'logs'  =>  $logs,
    ]);
  }
  public function blogs_month(Request $request)
  {
    $current = new DateTime($request->current);
    $articles = Article::whereYear('created_at', $current->format('Y'))->whereMonth('created_at', $current->format('m'))
    ->where(
      [
        ['category_id','!=',Category::where('title','recruit')->get()[0]->id],
        ['category_id','!=',Category::where('title','sdcp')->get()[0]->id]
      ])->orderBy('created_at')->get();

    return view('pages.blogs_month',[
      'current' => $current,
      'articles' => $articles,
    ]);
  }
  public function blog(Request $request)
  {
    $article = Article::findOrFail($request->article);

    return view('pages.blog',[
      'article' => $article,
    ]);
  }
}
