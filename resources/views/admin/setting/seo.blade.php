@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admin Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">OnPage SEO</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Your SEO Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('seo.setting.update',$data->id)}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" value="{{$data->meta_title}}" placeholder="Meta Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Author</label>
                                        <input type="text" class="form-control" name="meta_author" value="{{$data->meta_author}}" placeholder="Meta Author">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Tag</label>
                                        <input type="text" class="form-control" name="meta_tag" value="{{$data->meta_tag}}"  placeholder="Meta Tag">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" value="{{$data->meta_keyword}}" placeholder="Meta Keyword">
                                        <small>Example:ecommerce,online shop,online market</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" >{{$data->meta_description}}</textarea>
                                    </div>

                                    <strong class="text-center"> --Others-- </strong>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Google Varification</label>
                                        <input type="text" class="form-control" name="google_varification" value="{{$data->google_varification}}" placeholder="Google Varification">
                                        <small>Put Here Only Varification Code</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Google Analytics</label>
                                        <textarea class="form-control" name="google_analytics}}" >{{$data->google_analytics}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Google Adsense</label>
                                        <textarea class="form-control" name="google_adsense" >{{$data->google_adsense}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alexa Varification</label>
                                        <input type="text" class="form-control" name="alexa_varification" value="{{$data->alexa_varification}}" placeholder="Alexa Varification">
                                        <small>Put Here Only Varification Code</small>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
