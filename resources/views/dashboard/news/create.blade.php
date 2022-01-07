@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.news.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="text-center rounded color">
            <h1 class="display-4">Aktualności</h1>
        </div>
        <div class="container" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="title" class="col-form-label">Tytuł: </label>
            <div class="color ml-auto">
                <input id="title" type="text" class="form-control" name="title" value="" required>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="content" class="col-form-label">Zawartość: </label>
            <div class="color ml-auto">
                <input name="image" type="file" id="upload" style="display: none;" onchange="">
                <textarea id="mytextarea" class="form-control" name="content" style="max-width: 100%;" rows="15"></textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
            </div>
        </div>
    </div>
    </div>
</form>
<script type="text/javascript">
    tinymce.init({
        selector: '#mytextarea',
        language: 'pl',
        style_formats: [
            {
            title: 'Tabindex',
            selector: 'p,li',
            attributes: {
                'tabindex': '0'
            }
            },
        ],
        style_formats_merge: true,
        plugins: [
            "image wordcount code"
        ],
        image_title: true,
        automatic_uploads: true,
        file_picker_callback: function(cb, value, meta) {
        var token = document.querySelector('meta[name="csrf-token"]').content;
        if (meta.filetype == 'image') {
            $('#upload').trigger('click');
            $('#upload').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                var fd = new FormData();
                var files = file;
                fd.append('filetype', meta.filetype);
                fd.append("file", files);

                // AJAX
                $.ajax({
                    url: '/file/upload/news',
                    data: fd,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        filename = data;
                        reader.onload = function(e) {
                            cb(filename);
                        };
                        reader.readAsDataURL(file);
                    }
                });

            });
        }
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        content_css: "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    });
</script>
@endsection
