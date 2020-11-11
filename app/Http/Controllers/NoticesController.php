<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticesController extends Controller
{
      public function index()
      {
        $notices = Notice::orderBy('id','desc')->paginate(25);

        return view('notices.index',[
          'notices' => $notices,
        ]);
      }

      public function edit($id)
      {
        $notice = Notice::findOrFail($id);

        return view('notices.edit',[
          'notice' => $notice,
        ]);
      }

      public function create()
      {
        $notice = new Notice;

        return view('notices.create',[
          'notice' => $notice,
        ]);
      }

      public function show($id)
      {
        $notice = Notice::findOrFail($id);

        return view('notices.show',[
          'notice' => $notice,
        ]);
      }

      public function store(Request $request)
      {
        $request->validate([
          'title' => 'required',
        ]);
        $notice = new Notice;
        $notice->title = $request->title;
        $notice->body  = $request->editor;
        $notice->save();
        return redirect('notices');
      }

      public function update(Request $request, $id)
      {
        $request->validate([
          'title' => 'required'
        ]);
        $notice = Notice::findOrFail($id);
        $notice->title = $request->title;
        $notice->body  = $request->editor;
        $notice->save();
        return redirect('notices');
      }

      public function destroy($id)
      {
        $notice = Notice::findOrFail($id);
        $notice->delete();
        return redirect('notices');
      }

      public function postAccess(Request $request)
      {
        $imgpath = $request->file('file')->store('notice_upload', 'public');
        return json_encode(['location' => '/storage/'.$imgpath]);
      }
}
