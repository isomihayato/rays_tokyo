@extends('layouts.app')

@section('content')
<script type='text/javascript'>
        tinymce.init({
            selector : 'textarea',
            height: 700,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins  : [
                'advlist anchor autolink autoresize autosave charmap code',
                'directionality emoticons hr image imagetools importcss insertdatetime image legacyoutput link lists',
                'media nonbreaking noneditable pagebreak paste preview save searchreplace',
                'tabfocus table textpattern toc visualblocks visualchars wordcount'
            ],
            toolbar  : 'formatselect bold italic underline forecolor backcolor| alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            menubar  : true,
            element_format : 'html',
            relative_urls : false,
            branding: false,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: 'postAccess?_token={{csrf_token()}}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
            });
    </script>

{!! Form::model($notice,['route' => 'notices.store']) !!}
<div class="container">
  <div class="row mt-3 mb-3">
      <div class="col-6">
          {!! Form::label('title', 'Titile') !!}
          {!! Form::text('title',null,['style'=>'width:30vw;']) !!}
      </div>
  </div>
  {!! Form::label('body','Body') !!}
  {!! Form::textarea('body',null,['name'=>'editor','height'=>'700']) !!}

  <div class="row mt-3 mb-3">
      <div class="col-6">
        {!! Form::submit('Save!') !!}
      </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
