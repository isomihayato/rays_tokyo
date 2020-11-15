<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tattoo;
use App\User;
use DateTime;


class TattoosController extends Controller
{
    public function index(Request $request)
    {
      // eval(\Psy\sh());
      $current = is_null($request->current) ? now() : new DateTime($request->current);

      if (Auth::user()->role > 7)
      {// >manager?
        $tattoos = Tattoo::whereBetween('created_at',[
          $current->modify("first day of this month")->format('Y-m-d'),
          $current->modify("last day of this month")->format('Y-m-d'),
        ])->orderBy('order', 'asc')->get();
      }else
      {// staff
        $tattoos = Tattoo::whereBetween('created_at',[
          $current->modify("first day of this month")->format('Y-m-d'),
          $current->modify("last day of this month")->format('Y-m-d'),
        ])->where('user_id','=',Auth::id())->orderBy('order', 'asc')->get();
      }

      $tattoos = Tattoo::whereBetween('created_at',[
        $current->modify("first day of this month")->format('Y-m-d'),
        $current->modify("last day of this month")->format('Y-m-d'),
      ])->orderBy('order', 'asc')->get();

      return view('tattoos.index',[
        'tattoos' => $tattoos,
        'current' => $current,
      ]);
    }

    public function create()
    {
        $tattoo = new Tattoo;
        $artists = ['0'=>'選択してください'];
        foreach(User::where([['existence',true],['role','!=',1],['role','!=',3]])->get() as $user){
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

        $order = is_null($tattoos->max('order')) ? 1 : $tattoos->max('order')+1;

        foreach($request->images as $image)
        {
          $path = str_replace('public/', '', $image->store('public'));

          $tattoo = User::findOrFail($request->artist)->tattoos()->create([
              'order' => $order,
              'path'  => $path,
          ]);
          $tattoo->created_at = new DateTime($request->insert_at);
          $tattoo->save();

          $order +=1;
        }
        return redirect('tattoos');
    }

    public function arrange(Request $request)
    {
        $errors = [];
        $request->validate([
            'tattoo_id'=> 'required',
            'arrange'  => 'required',
        ]);
        $vertical = $request->arrange;
        $tattoo  = Tattoo::findOrFail($request->tattoo_id);
        switch ($vertical) {
          case 'up':
            $upper_tattoo = Tattoo::where('order',intval($tattoo->order)-1);
            if ($upper_tattoo->exists()) {
              $upper_tattoo = $upper_tattoo->get()[0];
            }else{
              break;
            }
            $upper_tattoo->order = $tattoo->order;
            $tattoo->order -= 1;
            $upper_tattoo->save();
            $tattoo->save();
            break;
          case 'down':
            $lower_tattoo = Tattoo::where('order',intval($tattoo->order)+1);
            if ($lower_tattoo->exists()) {
              $lower_tattoo = $lower_tattoo->get()[0];
            }else{
              break;
            }
            $lower_tattoo->order = $tattoo->order;
            $tattoo->order +=1;
            $lower_tattoo->save();
            $tattoo->save();
            break;
          default:
            // code...
            break;
        }
        return redirect('tattoos');
    }

    public function destroy($id)
    {
        $tattoo = Tattoo::findOrFail($id);
        $tattoo->delete();
        return redirect('tattoos');
    }
}
