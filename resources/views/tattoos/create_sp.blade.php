@extends('layouts.app')
<link rel="stylesheet" href="/css/dropzone.css">
@section('content')
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Create Tattoos</h3>
  </div>
</div>

{!! Form::model($tattoo,['route' => 'tattoos.store','drop-zone'=>'','id'=>'file-dropzone','files'=>true]) !!}
<div class="container">
  <div class="row mt-3 mb-3">
      <div class="col-6">
          {!! Form::label('images', 'Upload Files') !!}
          {!! Form::file('images',['name'=>'images[]','multiple'=>true]) !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::label('insert_at', 'Append month') !!}
      {!! Form::month('insert_at',now()) !!}
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::label('displayed_in', 'KYOTO') !!}
      {!! Form::checkbox('displayed_in[]', 'kyoto', true) !!}
      {!! Form::label('displayed_in', 'TOKYO') !!}
      {!! Form::checkbox('displayed_in[]', 'tokyo',true) !!}
      {!! Form::label('displayed_in', 'TAIPEI') !!}
      {!! Form::checkbox('displayed_in[]', 'taipei',true) !!}
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::label('artist', 'Artist') !!}
      {!! Form::select('artist',$artists,Auth::id()) !!}
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::submit('Upload',['id'=>'submit_btn']) !!}
    </div>
  </div>
</div>
{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.sortable').sortable();
});
$(document).ready(function() {
  $(document).on('click','#submit_btn',function () {
    var img_files = $('.dz-preview img');
    // 取得したimgの最後がよくわからないimgがついてくるため、最後省いている
    for (var i = 0; i < (img_files.length-1); i++) {
      $('#file-dropzone').append(`<input type="hidden" name="images[]" value="${img_files[i].getAttribute('src')}">`);
    }
  });
});
</script>
<script src="/js/mydropzone.js" charset="utf-8"></script>
@endsection
