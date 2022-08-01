{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/cart_styles.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/cart_responsive.css">--}}
{{--    @include('layouts.front_partial.fixed_nav')--}}

{{--    <div class="cart_section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 ">--}}
{{--                    <div class="cart_container">--}}
{{--                        <div class="cart_title">Shopping Cart</div>--}}
{{--                        <div class="cart_items">--}}
{{--                            <ul class="cart_list">--}}

{{--                                @foreach($content as $row)--}}
{{--                                    @php--}}
{{--                                        $product=DB::table('products')->where('id',$row->id)->first();--}}
{{--                                        $colors=explode(',',$product->color);--}}
{{--                                         $sizes=explode(',',$product->size);--}}
{{--                                    @endphp--}}
{{--                                    <li class="cart_item clearfix">--}}

{{--                                        <div class="cart_item_image">--}}
{{--                                            <img src="{{ asset('files/product/'.$row->options->thumbnail) }}" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">--}}
{{--                                            <div class="cart_item_name cart_info_col">--}}
{{--                                                <div class="cart_item_text">{{ substr($row->name,0,15) }}..</div>--}}
{{--                                            </div>--}}
{{--                                            @if($row->options->size !=NULL)--}}
{{--                                                <div class="cart_item_color cart_info_col">--}}

{{--                                                    <div class="cart_item_text">--}}
{{--                                                        <select class="custom-select form-control-sm size" name="size" style="min-width: 100px;" data-id="{{ $row->rowId }}">--}}
{{--                                                            @foreach($sizes as $size)--}}
{{--                                                                <option value="{{ $size }}" @if($size==$row->options->size) selected="" @endif >{{ $size }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endisset--}}


{{--                                            @if($row->options->color !=NULL)--}}
{{--                                                <div class="cart_item_color cart_info_col">--}}
{{--                                                    <div class="cart_item_text">--}}
{{--                                                        <select class="custom-select form-control-sm color" data-id="{{ $row->rowId }}" name="color" style="min-width: 100px;">--}}
{{--                                                            @foreach($colors as $color)--}}
{{--                                                                <option value="{{ $color }}" @if($color==$row->options->color) selected="" @endif >{{ $color }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}

{{--                                            <div class="cart_item_quantity cart_info_col">--}}
{{--                                                <div class="cart_item_text">--}}
{{--                                                    <input type="number" class="form-control-sm qty" name="qty" style="min-width: 70px;" data-id="{{ $row->rowId }}"  value="{{ $row->qty }}" min="1" required="">--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="cart_item_price cart_info_col">--}}

{{--                                                <div class="cart_item_text">{{ $setting->currency }}{{ $row->price }} x {{$row->qty }}</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cart_item_total cart_info_col">--}}
{{--                                                <div class="cart_item_text">{{ $setting->currency }} {{ $row->qty*$row->price }}</div>--}}

{{--                                            </div>--}}
{{--                                            <div class="cart_item_total cart_info_col">--}}

{{--                                                <div class="cart_item_text text-danger">--}}
{{--                                                    <a href="#" data-id="{{ $row->rowId }}" id="removeProduct"> X</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}


{{--                            </ul>--}}
{{--                        </div>--}}


{{--                        <!-- Order Total -->--}}
{{--                        <div class="order_total">--}}
{{--                            <div class="order_total_content text-md-right">--}}
{{--                                <div class="order_total_title">Order Total:</div>--}}
{{--                                <div class="order_total_amount">{{ $setting->currency }}{{ Cart::total() }}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="cart_buttons">--}}
{{--                            <a href="{{ route('cart.empty') }}" class="button cart_button_clear btn-danger">Empty Cart</a>--}}
{{--                            <a href="{{ route('checkout') }}" class="button cart_button_checkout">Checkout</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Newsletter -->--}}

{{--    <div class="newsletter">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">--}}
{{--                        <div class="newsletter_title_container">--}}
{{--                            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>--}}
{{--                            <div class="newsletter_title">Sign up for Newsletter</div>--}}
{{--                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>--}}
{{--                        </div>--}}
{{--                        <div class="newsletter_content clearfix">--}}
{{--                            <form action="#" class="newsletter_form">--}}
{{--                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">--}}
{{--                                <button class="newsletter_button">Subscribe</button>--}}
{{--                            </form>--}}
{{--                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--    <script type="text/javascript">--}}

{{--        $('body').on('click','#removeProduct', function(){--}}
{{--            let id=$(this).data('id');--}}
{{--            $.ajax({--}}
{{--                url:'{{ url('cartproduct/remove/') }}/'+id,--}}
{{--                type:'get',--}}
{{--                async:false,--}}
{{--                success:function(data){--}}
{{--                    toastr.success(data);--}}
{{--                    location.reload();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        //qty update with ajax--}}
{{--        $('body').on('blur','.qty', function(){--}}
{{--            let qty=$(this).val();--}}
{{--            let rowId=$(this).data('id');--}}
{{--            $.ajax({--}}
{{--                url:'{{ url('cartproduct/updateqty/') }}/'+rowId+'/'+qty,--}}
{{--                type:'get',--}}
{{--                async:false,--}}
{{--                success:function(data){--}}
{{--                    toastr.success(data);--}}
{{--                    location.reload();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        //color update--}}
{{--        $('body').on('change','.color', function(){--}}
{{--            let color=$(this).val();--}}
{{--            let rowId=$(this).data('id');--}}
{{--            $.ajax({--}}
{{--                url:'{{ url('cartproduct/updatecolor/') }}/'+rowId+'/'+color,--}}
{{--                type:'get',--}}
{{--                async:false,--}}
{{--                success:function(data){--}}
{{--                    toastr.success(data);--}}
{{--                    location.reload();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        //size update--}}
{{--        $('body').on('change','.size', function(){--}}
{{--            let size=$(this).val();--}}
{{--            let rowId=$(this).data('id');--}}
{{--            $.ajax({--}}
{{--                url:'{{ url('cartproduct/updatesize/') }}/'+rowId+'/'+size,--}}
{{--                type:'get',--}}
{{--                async:false,--}}
{{--                success:function(data){--}}
{{--                    toastr.success(data);--}}
{{--                    location.reload();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}

{{--@endsection--}}

@extends('layouts.app')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/cart_responsive.css">
    @include('layouts.front_partial.fixed_nav')


    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart_container card p-1">
                        <div class="cart_title text-center">Billing Address</div>

                        <form action="{{route('order.place')}}" method="post" id="order-place">
                            @csrf
                            <div class="row p-4">
                                <div class="form-group col-lg-6">
                                    <label>Customer Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="c_name" required="" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Customer Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="c_phone" required="" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label> Country <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="c_country" required="" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Shipping Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="c_address" required="" >
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" name="c_email" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" name="c_zipcode" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>City Name</label>
                                    <input type="text" class="form-control" name="c_city" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Extra Phone</label>
                                    <input type="text" class="form-control" name="c_extra_phone" required="" >
                                </div>
                                <br>
                                <div class="form-group col-lg-4">
                                    <label>Paypal</label>
                                    <input type="radio"  name="payment_type" value="Paypal">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Bkash/Rocket/Nagad </label>
                                    <input type="radio"  name="payment_type" checked="" value="Aamarpay" >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Hand Cash</label>
                                    <input type="radio"  name="payment_type" value="Hand Cash" >
                                </div>

                            </div>
                            <div class="form-group pl-2">
                                <button type="submit" class="btn btn-info p-2">Order Place</button>
                            </div>

                            <span class="visually-hidden pl-2 d-none progress">Progressing.....</span>

                        </form>


                        <!-- Order Total -->

                    </div>
                </div>
                <div class="col-lg-4" >
                    <div class="card">
                        <div class="pl-4 pt-2">
                            <p style="color: black;">Subtotal: <span style="float: right; padding-right: 5px;">{{ Cart::subtotal() }} {{ $setting->currency }}</span> </p>
                            {{-- coupon apply --}}
                            @if(Session::has('coupon'))
                                <p style="color: black;">coupon:({{ Session::get('coupon')['name'] }}) <a href="{{ route('coupon.remove') }}" class="text-danger">X</a> <span style="float: right; padding-right: 5px;">{{ Session::get('coupon')['discount'] }} {{ $setting->currency }}</span>  </p>
                            @else
                            @endif

                            <p style="color: black;">Tax: <span style="float: right; padding-right: 5px;">0.00 %</span></p>
                            <p style="color: black;">shipping: <span style="float: right; padding-right: 5px;">0.00 {{ $setting->currency }}</span></p>

                            @if(Session::has('coupon'))
                                <p style="color: black;"><b> Total: <span style="float: right; padding-right: 5px;"> {{ Session::get('coupon')['after_discount'] }} {{ $setting->currency }} </span></b></p>
                            @else
                                <p style="color: black;"><b> Total: <span style="float: right; padding-right: 5px;"> {{ Cart::total() }} {{ $setting->currency }} </span></b></p>
                            @endif
                        </div><hr>

                        @if(!Session::has('coupon'))
                            <form action="{{ route('apply.coupon') }}
                                " method="post">
                                @csrf
                                <div class="p-4">
                                    <div class="form-group">
                                        <label>Coupon Apply</label>
                                        <input type="text" class="form-control" name="coupon" required="" placeholder="Coupon Code" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Apply Coupon</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $('body').on('click','#removeProduct', function(){
            let id=$(this).data('id');
            $.ajax({
                url:'{{ url('cartproduct/remove/') }}/'+id,
                type:'get',
                async:false,
                success:function(data){
                    toastr.success(data);
                    location.reload();
                }
            });
        });
        //qty update with ajax
        $('body').on('blur','.qty', function(){
            let qty=$(this).val();
            let rowId=$(this).data('id');
            $.ajax({
                url:'{{ url('cartproduct/updateqty/') }}/'+rowId+'/'+qty,
                type:'get',
                async:false,
                success:function(data){
                    toastr.success(data);
                    location.reload();
                }
            });
        });
        //color update
        $('body').on('change','.color', function(){
            let color=$(this).val();
            let rowId=$(this).data('id');
            $.ajax({
                url:'{{ url('cartproduct/updatecolor/') }}/'+rowId+'/'+color,
                type:'get',
                async:false,
                success:function(data){
                    toastr.success(data);
                    location.reload();
                }
            });
        });
        //size update
        $('body').on('change','.size', function(){
            let size=$(this).val();
            let rowId=$(this).data('id');
            $.ajax({
                url:'{{ url('cartproduct/updatesize/') }}/'+rowId+'/'+size,
                type:'get',
                async:false,
                success:function(data){
                    toastr.success(data);
                    location.reload();
                }
            });
        });
        $('#order-place').submit(function(e) {
            $('.progress').removeClass('d-none');
        });
    </script>

@endsection
