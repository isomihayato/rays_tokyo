<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tattoo;
use App\User;
use DateTime;


class TattoosController extends Controller
{
    public function index()
    {
      $tattoos = Tattoo::whereBetween('created_at',[
        (new DateTime('first day of this month'))->format('Y-m-d'),
        (new Datetime('last day of this month'))->format('Y-m-d'),
      ]);

      if($tattoos->exists()) $tattoos = json_decode(($tattoos->get())[0]['images']);

      return view('tattoos.index',[
        'tattoos' => $tattoos,
      ]);
    }

    public function create()
    {
        $tattoo = new Tattoo;
        $artists = ['0'=>'選択してください'];
        foreach(User::where('existence',true)->get() as $user){
          $artists += array($user->id=>$user->name);
        }
        return view('tattoos.create',[
          'tattoo' => $tattoo,
          'artists' => $artists,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
          'images' => 'required',
        ]);

        $tattoos = Tattoo::whereBetween('created_at',[
            new DateTime($request->insert_at),
            (new DateTime($request->insert_at))->modify('last day of this month')->format('Y-m-d'),
        ]);

        $order = ($tattoos->exists() ? $tattoos->get()[0]['order_max_number'] : 1);

        $rows = ($tattoos->exists()  ? json_decode($tattoos->get()[0]->images) : []);
        foreach($request->images as $image)
        {
          $path = str_replace('public/', '', $image->store('public'));

          $rows[] = ['order'=>$order,'path'=>$path,'artist'=>$request->artist];

          $order +=1;
        }
        $tattoos->exists() ? ($tattoo = $tattoos->get()[0]) : ($tattoo = new Tattoo);

        $tattoo->order_max_number = $order;
        $tattoo->images = json_encode($rows);
        $tattoo->save();
        
        return view('tattoos.index',[
          'tattoos' => json_decode($tattoo->images),
        ]);
    }

    public function destroy()
    {

    }
}
