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
                            <li class="breadcrumb-item active">Website Settings</li>
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
                                <h3 class="card-title">Website Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('website.setting.update',$settings->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Currency</label>
                                        <select class="form-control" name="currency">
                                            <option value="৳" {{($settings->currency == '৳') ? 'selected': ''}}>Taka</option>
                                            <option value="$" {{($settings->currency == '$') ? 'selected': ''}}>USD</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone one</label>
                                        <input type="text" class="form-control" name="phone_one"
                                               value="{{$settings->phone_one}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone one</label>
                                        <input type="text" class="form-control" name="phone_two"
                                               value="{{$settings->phone_two}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Email</label>
                                        <input type="email" class="form-control" name="main_email"
                                               value="{{$settings->main_email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Support Email</label>
                                        <input type="email" class="form-control" name="support_email"
                                               value="{{$settings->support_email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" class="form-control" name="address"
                                               value="{{$settings->address}}" required>
                                    </div>


                                    <strong class="text-info"> --Social Links-- </strong>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input type="text" class="form-control" name="facebook"
                                               value="{{$settings->facebook}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input type="text" class="form-control" name="twitter"
                                               value="{{$settings->twitter}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Instagram</label>
                                        <input type="text" class="form-control" name="instagram"
                                               value="{{$settings->instagram}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">LinkedIn</label>
                                        <input type="text" class="form-control" name="linkedin"
                                               value="{{$settings->linkedin}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Youtube</label>
                                        <input type="text" class="form-control" name="youtube"
                                               value="{{$settings->youtube}}">
                                    </div>

                                    <strong class="text-info"> --Logo & Favicon-- </strong>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                        <input type="hidden" name="old_logo" value="{{$settings->logo}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Favicon</label>
                                        <input type="file" class="form-control" name="favicon">
                                        <input type="hidden" name="old_favicon" value="{{$settings->favicon}}">
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
