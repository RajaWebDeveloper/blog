@extends('layouts.backend')

@section('css_cdn')
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .form-actions{
            display: flex;
            justify-content: flex-end;
        }
        .error{
            color: red;
        }
    </style>
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Blog</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Blog Create
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-4 col-12">
                    <div class="btn-group float-md-right">
                        <a href="{{route('blog.create')}}" class="btn btn-info" type="button"aria-haspopup="true" aria-expanded="false"><i class="icon-plus mr-1"></i>Add Blog</a>
                    </div>
                </div>
            </div>
            <div class="content-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif

                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-clipboard"></i> Blog Details</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="blog_name">Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="blog_name" class="form-control" placeholder="Blog Name" name="blog_name" value="{{old('blog_name')}}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="blog_image">Category</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="category_model_id">
                                                            @foreach($category as $cat)
                                                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('category_model_id'))
                                                            <div class="error">{{ $errors->first('category_model_id') }}</div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="blog_image">Image</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="blog_image" class="form-control" name="blog_image" accept="image/*" required>
                                                        @if($errors->has('blog_image'))
                                                            <div class="error">{{ $errors->first('blog_image') }}</div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="blog_content">Description</label>
                                                    <div class="col-md-9">
                                                        <textarea id="blog_content" rows="10" class="form-control" name="blog_content" placeholder="Blog Content">{{old('blog_name')}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="blog_content">Short Description</label>
                                                    <div class="col-md-9">
                                                        <textarea rows="10" class="form-control" name="short_blog_content" placeholder="Blog Content" required>{{old('blog_name')}}</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection

@section('datatable')

@endsection

@section('script_cdn')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#blog_content',
            plugins: ['image code','media'],
            branding: false,

            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,

            file_picker_types: 'image',

            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.setAttribute('multiple', 'multiple');

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
        });
    </script>
@endsection
