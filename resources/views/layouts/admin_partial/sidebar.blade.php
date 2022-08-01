@php
$setting = DB::table('settings')->first();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url($setting->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BD Purchase</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="data:image/jpeg;base64,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" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subcategory.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('childcategory.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Child Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('brand.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('warehouse.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Warehouse</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Product<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Product</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Offer<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('coupon.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('campaign.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E Campaign</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('page.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Orders<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.order.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Order</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Pickup Point<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('pickuppoint.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pickup Point</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Settings<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('seo.setting')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SEO Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('website.setting')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('page.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('smtp.setting')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMTP Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('brand.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Gateway</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">PROFILE</li>
                <li class="nav-item">
                    <a href="{{route('admin.password.change')}}" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p class="text">Password Change</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.logout')}}" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Log out</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
