<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use App\Tattoo;
use App\User;
use Storage;
use DateTime;


class TattoosController extends Controller
{
  const BRANCHES = ['all'=>'All branch','kyoto'=>'Kyoto','tokyo'=>'Tokyo'];
    public function index(Request $request)
    {
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

    public function edit($id)
    {
      $tattoo = Tattoo::findOrFail($id);
      $artists = ['0'=>'選択してください'];
      foreach(User::where([['existence',true],['role','!=',1],['role','!=',3]])->get() as $user){
        $artists += array($user->id=>$user->name);
      }
      $tattoo->displayed_in = explode(',',$tattoo->displayed_in);
      return view('tattoos.edit',[
        'tattoo' => $tattoo,
        'artists' => $artists,
        'branches' => self::BRANCHES,
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
          'branches' => self::BRANCHES,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
          'images' => 'required',
          'displayed_in' => 'required'
        ]);

        $tattoos = Tattoo::whereBetween('created_at',[
            new DateTime($request->insert_at),
            (new DateTime($request->insert_at))->modify('last day of this month')->format('Y-m-d'),
        ]);

        $order = is_null($tattoos->max('order')) ? 1 : $tattoos->max('order')+1;

        foreach($request->images as $image)
        {
          // ローカルで保存する場合
          // $path = str_replace('public/', '', $image->store('public'));
          $path = $this->store_to_s3($image);

          $tattoo = User::findOrFail($request->artist)->tattoos()->create([
              'order' => $order,
              'path'  => $path,
              'displayed_in' => implode(',',$request->displayed_in),
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

    public function update(Request $request,$id)
    {
      $request->validate([
        'displayed_in' =>'required'
      ]);
      $tattoo = Tattoo::findOrFail($id);
      if (is_null($request->image)) {
        $path = $tattoo->path;
      }else {
        $path = Storage::disk('s3')->putFile('upload', $request->image, 'public');
        $image_path = Storage::disk('s3')->url($path);
      }
      $tattoo->user_id      = $request->artist;
      $tattoo->path         = $path;
      $tattoo->displayed_in = implode(',',$request->displayed_in);
      $tattoo->created_at   = new DateTime($request->insert_at);
      $tattoo->save();
      return redirect('tattoos');
    }

    public function destroy($id)
    {
        $tattoo = Tattoo::findOrFail($id);
        $tattoo->delete();
        return redirect('tattoos');
    }

    public function store_to_s3($base64){
      try {
            list(, $fileData) = explode(';', $base64);
            list(, $fileData) = explode(',', $fileData);
            $file = base64_decode($fileData);
            $fileName = Str::random(150).'.png';
            $path = 'upload/'.$fileName;
            Storage::disk('s3')->put($path, $file, 'public');

            return Storage::disk('s3')->url($path);

        } catch (Exception $e) {
            Log::error($e);
            return null;
        }
      }
}
