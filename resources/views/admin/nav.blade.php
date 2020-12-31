<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Directory</a>
    </div>
    <!-- /.navbar-header -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-laptop nav_icon"></i>Category<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('admin/categories')}}">Categories</a>
                        </li>
                        <li>
                            <a href="{{url('admin/category/add')}}">Add Category</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-laptop nav_icon"></i>Sub-Category<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('admin/subcategory')}}">Sub-Categories</a>
                        </li>
                        <li>
                            <a href="{{url('admin/subcategory/add')}}">Add Sub-Category</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-laptop nav_icon"></i>Company<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('admin/company')}}">Companies</a>
                        </li>
                        <li>
                            <a href="{{url('admin/company/add')}}">Add Company</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-laptop nav_icon"></i>Package<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('admin/package')}}">Packages</a>
                        </li>
                        <li>
                            <a href="{{url('admin/package/add')}}">Add Package</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Log out</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
