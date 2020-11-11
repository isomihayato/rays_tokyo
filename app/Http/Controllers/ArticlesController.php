<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Category;

class ArticlesController extends Controller
{
    public function index()
    {
        if (Auth::user()->role > 7)
        {
          $articles = Article::where([['title','!=','recruit'],['title','!=','sdcp']])->orderBy('id', 'desc')->paginate(25);
        }else
        {
          $articles = Article::where([['title','!=','recruit'],['title','!=','sdcp'],['user_id','=',Auth::id()]])->orderBy('id', 'desc')->paginate(25);
        }

        return view('articles.index',[
          'articles' => $articles,
        ]);
    }

    public function edit($id)
    {
      $article = Article::findOrFail($id);
      $categories = ['0'=>'選択して下さい。'];
      $cates = Category::where([['title','!=','recruit'],['title','!=','sdcp']])->get();
      foreach ($cates as $category) {
        $categories[$category->id] =  $category->title;
      }

      return view('articles.edit',[
        'article' => $article,
        'categories' => $categories,
      ]);
    }

    public function create()
    {
        $article = new Article;
        $categories = ['0'=>'選択して下さい。'];
        $cates = Category::where([['title','!=','recruit']])->get();
        foreach ($cates as $category) {
          $categories[$category->id] =  $category->title;
        }

        return view('articles.create',[
          'article' => $article,
          'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
      $path = str_replace('public/','',$request->thumbnail->store('public'));
      $article = User::findOrFail(Auth::id())->articles()->create([
        'title' => $request->title,
        'category' => $request->category,
        'thumbnail' => $path,
        'body' => $request->editor,
        'release_at' => $request->release_at,
      ]);
      $article->save();
      return redirect('articles');
    }

    public function update(Request $request,$id)
    {
      $article = Article::findOrFail($id);
      if (is_null($request->thumbnail)) {
        $path = $article->thumbnail;
      }else {
        $path = str_replace('public/','',$request->thumbnail->store('public'));
      }

      $article->title      = $request->title;
      $article->category   = $request->category;
      $article->thumbnail  = $path;
      $article->body       = $request->editor;
      $article->release_at = $request->release_at;
      $article->save();
      return redirect('articles');
    }

    public function destroy($id)
    {
      $article = Article::findOrFail($id);
      $article->delete();
      return redirect('articles');
    }

    public function recruit()
    {
      $article =  Article::where('category','=',Category::where('title','=','recruit')->get()[0]->id)->get()[0];

      return view('articles.recruit',[
        'article' => $article,
      ]);
    }

    public function sdcp()
    {
      $article =  Article::where('category','=',Category::where('title','=','sdcp')->get()[0]->id)->get()[0];

      return view('articles.sdcp',[
        'article' => $article,
      ]);
    }

    public function postAccess(Request $request)
    {
      $imgpath = $request->file('file')->store('mce_upload', 'public');
      return json_encode(['location' => '/storage/'.$imgpath]);
    }
}
