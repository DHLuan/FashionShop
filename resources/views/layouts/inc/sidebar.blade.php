<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            V-Shop
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}  ">
                <a class="nav-link" href="#">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? 'active':'' }} ">
                <a class="nav-link" href="{{url('categories')}}">
                    <i class="material-icons">person</i>
                    <p> categories</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-category') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('add-category')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Add Category</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('products')}}">
                    <i class="material-icons">library_books</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-products') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('add-products')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Add Products</p>
                </a>
            </li>
            <li class="nav-item  {{ Request::is('orders') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('orders')}}">
                    <i class="material-icons">location_ons</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item  {{ Request::is('users') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('users')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./rtl.html">
                    <i class="material-icons">language</i>
                    <p>RTL Support</p>
                </a>
            </li>
            <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>
