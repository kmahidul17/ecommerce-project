@extends('layouts.admin')

@section('admin_content')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{route('product.create')}}" class="btn btn-primary" > + Add New </a>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Product List Here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="row p-2">
                                <div class="form-group col-3">
                                    <label for="">Filter by Category</label>
                                    <select class="form-control submittable" name="category_id" id="category_id">
                                        <option value="">All Categories</option>
                                        @foreach($category as $row)
                                            <option value="{{ $row->id }}">{{$row->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Filter by Brand</label>
                                    <select class="form-control submittable" name="brand_id" id="brand_id">
                                        <option value="">All Brands</option>
                                        @foreach($brand as $row)
                                            <option value="{{ $row->id }}">{{$row->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Filter by Warehouse</label>
                                    <select class="form-control submittable" name="warehouse" id="warehouse">
                                        <option value="">All Warehouses</option>
                                        @foreach($warehouse as $row)
                                            <option value="{{ $row->id}}">{{$row->warehouse_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Filter by Status</label>
                                    <select class="form-control submittable" name="status" id="status">
                                        <option value="1">All Status</option>

                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>

                                    </select>
                                </div>

                            </div>
                            <div class="card-body">

                                <table id="" class="table table-bordered table-striped table-sm ytable">

                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Thumbnail</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Brand</th>
                                        <th>Featured</th>
                                        <th>Today Deal</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

        <script type="text/javascript" >
            $(function brand(){
                 table = $('.ytable').DataTable({
                    "processing":true,
                     "serverSide":true,
                     "responsive":true,
                     "searching":true,
                     "ajax":{
                         "url": "{{route('product.index') }}",
                         "data":function(e) {
                             e.category_id =$("#category_id").val();
                             e.brand_id =$("#brand_id").val();
                             e.status =$("#status").val();
                             e.warehouse =$("#warehouse").val();
                         }
                     },

                     columns:[
                        {data: 'DT_RowIndex',name:'DT_RowIndex'},
                        {data: 'thumbnail',name:'thumbnail'},
                        {data: 'name',name:'name'},
                        {data: 'code',name:'code'},
                        {data: 'category_name',name:'category_name'},
                        {data: 'subcategory_name',name:'subcategory_name'},
                        {data: 'brand_name',name:'brand_name'},
                        {data: 'featured',name:'featured'},
                        {data: 'today_deal',name:'today_deal'},
                        {data: 'status',name:'status'},
                        {data: 'action',name:'action', orderable:true,searchable:true},
                    ],
                    dom: 'Bfrtip',
                    buttons: [
                        'colvis',
                        'excel',
                        'print',
                        'csv',
                        'copy',
                        'pdf'
                    ]
                });
            });

            //deactive featured

            $('body').on('click','.deactive_featured', function(){
                var id=$(this).data('id');
                var url = "{{ url('product/not-featured') }}/"+id;
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        toastr.success(data);
                        table.ajax.reload();
                    }
                });
            });

            //active featured

            $('body').on('click','.active_featured', function(){
                var id=$(this).data('id');
                var url = "{{ url('product/featured') }}/"+id;
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        toastr.success(data);
                        table.ajax.reload();
                    }
                });
            });

            //deactive Deal

            $('body').on('click','.deactive_deal', function(){
                var id=$(this).data('id');
                var url = "{{ url('product/not-deal') }}/"+id;
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        toastr.success(data);
                        table.ajax.reload();
                    }
                });
            });

            //active featured

            $('body').on('click','.active_deal', function(){
                var id=$(this).data('id');
                var url = "{{ url('product/active-deal') }}/"+id;
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        toastr.success(data);
                        table.ajax.reload();
                    }
                });
            });

            //deactive Deal

            $('body').on('click','.deactive_status', function(){
                var id=$(this).data('id');
                var url = "{{ url('product/deactive-status') }}/"+id;
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        toastr.success(data);
                        table.ajax.reload();
                    }
                });
            });

            //active featured

            $('body').on('click','.active_status', function(){
                var id=$(this).data('id');
                var url = "{{ url('product/active-status') }}/"+id;
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        toastr.success(data);
                        table.ajax.reload();
                    }
                });
            });

            //submittable class call for every change
            $(document).on('change','.submittable',function(){
                $('.ytable').DataTable().ajax.reload();
            });

        </script>

@endsection
