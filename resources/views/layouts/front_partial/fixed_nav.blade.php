@php
    $category = DB::table('categories')->orderBy('category_name','ASC')->get();
@endphp

<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>

                        <ul class="cat_menu">
                            @foreach($category as $row)
                                @php
                                    $subcategory = DB::table('subcategories')->where('category_id',$row->id)->get();
                                @endphp
                                <li class="hassubs">
                                    <a href="{{route('categoryWise.product',$row->category_slug)}}"> <img src="{{asset($row->icon)}}" alt="" height="20" width="20" class="mr-2"> {{$row->category_name}}<i class="fas fa-chevron-right"></i></a>
                                    <ul>
                                        @foreach($subcategory as $row)
                                            @php
                                                $childcategory = DB::table('childcategories')->where('subcategory_id',$row->id)->get();
                                            @endphp
                                            <li class="hassubs">
                                                <a href="#">{{$row->subcategory_name}}<i class="fas fa-chevron-right"></i></a>
                                                <ul>
                                                    @foreach($childcategory as $row)
                                                        <li><a href="#">{{$row->childcategory_name}}<i class="fas fa-chevron-right"></i></a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Main Nav Menu -->

{{--                    <div class="main_nav_menu ml-auto">--}}
{{--                        <ul class="standard_dropdown main_nav_dropdown">--}}
{{--                            <li><a href="index.html">Home<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                            <li class="hassubs">--}}
{{--                                <a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="hassubs">--}}
{{--                                <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="hassubs">--}}
{{--                                <a href="#">Pages<i class="fas fa-chevron-down"></i></a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                    <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                            <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
