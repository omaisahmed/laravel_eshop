<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('frontend/assets/img/sidebar-1.jpg')}}">
 
    <div class="logo">
      <a href="{{route('dashboard.index')}}" class="simple-text logo-normal">
        <img src="{{asset('frontend/img/logo-dashboard.png')}}" class="img-responsive w-50">
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Route::is('dashboard.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ Route::is('category.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('category.index')}}">
            <i class="material-icons">category</i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item {{ Route::is('category.create') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('category.create')}}">
            <i class="material-icons">shopping_bag</i>
            <p>Add Categories</p>
          </a>
        </li>
        <li class="nav-item {{ Route::is('products.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('products.index')}}">
            <i class="material-icons">store</i>
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item {{ Route::is('products.create') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('products.create')}}">
            <i class="material-icons">add_shopping_cart</i>
            <p>Add Products</p>
          </a>
        </li>
        <li class="nav-item {{ Route::is('users.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('users.index')}}">
            <i class="material-icons">person</i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item {{ Route::is('orders.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('orders.index')}}">
            <i class="material-icons">shopping_cart</i>
            <p>Orders</p>
          </a>
        </li>
        <li class="nav-item {{ Route::is('coupon.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('coupon.index')}}">
            <i class="material-icons">discount</i>
            <p>Coupons</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./icons.html">
            <i class="material-icons">payment</i>
            <p>Invoices</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./map.html">
            <i class="material-icons">location_ons</i>
            <p>Maps</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./notifications.html">
            <i class="material-icons">notifications</i>
            <p>Notifications</p>
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