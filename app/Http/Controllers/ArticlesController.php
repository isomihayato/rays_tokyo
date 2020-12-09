<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Category;
use Storage;

class ArticlesController extends Controller
{
    public function index()
    {
        if (Auth::user()->role < 7)
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
      $article->displayed_in = array_pad(explode(',',$article->displayed_in),3,'');
      return view('articles.edit',[
        'article' => $article,
        'categories' => $categories,
      ]);
    }

    public function create()
    {
        $article = new Article;
        $categories = ['0'=>'選択して下さい。'];
        if (Auth::user()->role == 1) {
          $cates = Category::all();
        }else {
          $cates = Category::where([['title','!=','recruit'],['title','!=','sdcp']])->get();
        }
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
      if (!is_null($request->thumbnail)) {
        $path = Storage::disk('s3')->putFile('upload', $request->thumbnail, 'public');
        $image_path = Storage::disk('s3')->url($path);
      }else {
        $image_path = null;
      }
      $article = User::findOrFail(Auth::id())->articles()->create([
        'title' => $request->title,
        'thumbnail' => $image_path,
        'body' => $request->editor,
        'displayed_in' => implode(',',$request->displayed_in),
        'release_at' => $request->release_at,
        'category_id' => $request->category
      ]);
      $article->save();
      return redirect('articles');
    }

    public function update(Request $request,$id)
    {
      $article = Article::findOrFail($id);
      if (gettype($request->displayed_in) == "string") {
        $displayed_in = $request->displayed_in;
      }else {
        $displayed_in = implode(',',$request->displayed_in);
      }
      if (is_null($request->thumbnail)) {
        $path = $article->thumbnail;
      }else {
        $image_path = Storage::disk('s3')->putFile('upload', $request->thumbnail, 'public');
        $path = Storage::disk('s3')->url($path);
      }
      $article->title         = $request->title;
      $article->category_id   = $request->category;
      $article->thumbnail     = $path;
      $article->body          = $request->editor;
      $article->displayed_in  = $displayed_in;
      $article->release_at    = $request->release_at;
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
      if (Category::where('title','=','recruit')->exists() &&
      Category::where('title','=','recruit')->get()[0]->articles()->exists()) {
        $article =  Category::where('title','=','recruit')->get()[0]->articles[0];
      }else{
        return redirect('/home');
      }

      return view('articles.recruit',[
        'article' => $article,
      ]);
    }

    public function sdcp()
    {
      if (Category::where('title','=','sdcp')->exists() &&
      Category::where('title','=','sdcp')->get()[0]->articles()->exists()) {
        $article =  Category::where('title','=','sdcp')->get()[0]->articles[0];
      }else{
        return redirect('/home');
      }

      return view('articles.sdcp',[
        'article' => $article,
      ]);
    }

    public function postAccess(Request $request)
    {
      $path = Storage::disk('s3')->putFile('upload', $request->file('file'), 'public');
      $image_path = Storage::disk('s3')->url($path);
      return json_encode(['location' => $image_path]);
    }
}
