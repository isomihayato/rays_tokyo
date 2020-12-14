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
  public function index(Request $request)
  {
    $articles = Article::where(
      [
        ['category_id','!=',Category::where('title','recruit')->get()[0]->id],
        ['category_id','!=',Category::where('title','sdcp')->get()[0]->id]
      ])->orderBy('created_at','desc')->take(10)->get();
    $tattoos  = Tattoo::orderBy('created_at','desc')->take(10)->get();

    if ((strpos($request->header('User-Agent'), 'iPhone') !== false)
            || (strpos($request->header('User-Agent'), 'iPod') !== false)
            || (strpos($request->header('User-Agent'), 'Android') !== false)) {
              return view('pages.index',[
                'articles' => $articles,
                'tattoos' => $tattoos,
                'title' => '',
              ]);
         } else {
           return view('pages.index',[
             'articles' => $articles,
             'tattoos' => $tattoos,
             'title' => '',
           ]);
        }
  }
  public function guide()
  {
    return view('pages.guide',[
      'title' => 'スタジオ案内',
    ]);
  }
  public function terms()
  {
    return view('pages.terms',[
      'title' => '注意喚起'
    ]);
  }
  public function gallery(Request $request)
  {
    $users = User::where([['existence',true],['belongs_to','like',"%tokyo%"],['role','!=','1'],['role','!=','3']])->get();
    foreach ($users as $user) {
      $user->setRelation('tattoos', $user->tattoos()->where([['displayed_in','like',"%tokyo%"]])->orderBy('id','desc')->paginate(8,['*'],strtolower($user->login_id)) );
    }
    $url = url()->full();
    if (strpos($url,'=') != 0) {
      $now_artist = substr($url,strpos($url,'?')+1,strpos($url,'=')-strpos($url,'?')-1);
      $now_page = substr($url, strpos($url,'=')+1,strpos($url,'='));
    }else {
      $now_artist = '';
      $now_page = '';
    }

      return view('pages.gallery',[
        'users' => $users,
        'now_artist' => $now_artist,
        'now_page' => $now_page
      ]);
  }
  public function artists(Request $request)
  {
    $artists = User::where([['existence',true],['belongs_to','like',"%tokyo%"],['role','!=','1'],['role','!=','3'],['login_id','!=','white'],['login_id','!=','other']])->get();

    return view('pages.artists',[
      'artists' => $artists,
    ]);
  }

  public function show_artist($id)
  {
    $artist = User::findOrFail($id);
    $artist->setRelation('tattoos',$artist->tattoos()->where([['displayed_in','like',"%tokyo%"]])->orderBy('id','desc')->paginate(8)->appends(["artist" => $artist->id]));

    return view('pages.show_artist',[
      'artist' => $artist,
    ]);
  }
  public function blogs(Request $request)
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

    if ((strpos($request->header('User-Agent'), 'iPhone') !== false)
            || (strpos($request->header('User-Agent'), 'iPod') !== false)
            || (strpos($request->header('User-Agent'), 'Android') !== false)) {
              return view('pages.blogs',[
                'categories' => $categories,
                'logs'  =>  $logs,
              ]);
        } else {
            return 'pc';
        }
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

      if ((strpos($request->header('User-Agent'), 'iPhone') !== false)
              || (strpos($request->header('User-Agent'), 'Android') !== false)) {
                return view('pages.blogs_month',[
                  'current' => $current,
                  'articles' => $articles,
                ]);
          } else {
              return 'pc';
          }
  }
  public function blog(Request $request)
  {
    $article = Article::findOrFail($request->article);

    if ((strpos($request->header('User-Agent'), 'iPhone') !== false)
            || (strpos($request->header('User-Agent'), 'iPod') !== false)
            || (strpos($request->header('User-Agent'), 'Android') !== false)) {
              return view('pages.blog',[
                'article' => $article,
              ]);
        } else {
            return 'pc';
        }
  }
}
