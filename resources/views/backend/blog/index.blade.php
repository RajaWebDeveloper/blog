@extends('layouts.backend')

@section('css_cdn')
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

    <style>
        .action{
            display: flex;
            justify-content: space-evenly;
        }
        .trash{
            border: none;
            background: none;
            color: red;
        }
        img{
            width: 150px;
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
                                <li class="breadcrumb-item active">Blog List
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
                <section id="language">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Blog List</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <table class="table table-striped table-bordered language-file">
                                            <thead>
                                            <tr>
                                                <th>Blog Name</th>
                                                <th>Blog Image</th>
                                                <th>Author</th>
                                                <th>Comments</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $datum)
                                                    <tr>
                                                        <td>{{$datum->blog_name}}</td>
                                                        <td><img src="{{asset('blog_images/'.$datum->blog_image)}}" ></td>
                                                        <td>{{ucfirst($datum->user->name)}}</td>
                                                        <td></td>
                                                        <td>{{$datum->created_at}}</td>
                                                        <td>{{$datum->updated_at}}</td>
                                                        <td>
                                                            <div class="action">
                                                                <a href="{{route('blog.edit',$datum->id)}}"><i class="fa fa-pencil"></i></a>
                                                                <form method="post" action="{{route('blog.destroy',$datum->id)}}">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    <button type="submit" class="trash"><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
@endsection

@section('script_cdn')
    <script src="{{asset('backend/app-assets/js/scripts/tables/datatables/datatable-advanced.min.js')}}"></script>
@endsection
