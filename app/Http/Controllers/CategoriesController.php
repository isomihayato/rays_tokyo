<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
  public function index()
  {
    $categories = Category::all();

    return view('categories.index',[
      'categories' => $categories,
    ]);
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);

    return view('categories.edit',[
      'category' => $category,
    ]);
  }

  public function create()
  {
    $category = new Category;

    return view('categories.create',[
      'category' => $category,
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required'
    ]);
    $category = new Category;
    $category->title = $request->title;
    $category->save();
    return redirect('categories');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|unique'
    ]);
    $category = Category::findOrFail($id);
    $category->title = $request->title;
    $category->save();
    return redirect('categories');
  }

  public function destroy($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect('categories');
  }
}
