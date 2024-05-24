


  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas col-lg-12 col-12 p-0" id="sidebar">
    <ul class="nav">
      <li class="nav-item navbar-brand-mini-wrapper">
        <a class="nav-link navbar-brand brand-logo-mini" href="{{url('index.html')}}"><img src="{{url('assets/images/logo-mini.svg')}}" alt="logo" /></a>
      </li>
      <li class="nav-item nav-profile">

      </li>
      @if(Auth::user()->role==2)
      <li class="nav-item">
        <a href="{{url('/admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
          <span class="menu-title"><p>Dashboard</p></span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>
      @endif
      @if(Auth::user()->role==1)
      <li class="nav-item">
        <a href="{{url('/moderator/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
          <span class="menu-title"><p>Dashboard</p></span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>
      @endif
      @if(Auth::user()->role==0)
      <li class="nav-item">
        <a href="{{url('/user/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
          <span class="menu-title"><p>Dashboard</p></span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>
      @endif


      <li class="nav-item">
        <a href="{{url('/cart')}}" class="nav-link @if(Request::segment(2) == 'pos') active @endif">
          <span class="menu-title"><p>Pos</p></span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>


    @if(Auth::user()->role=="admin")

    <li class="nav-item">
      <a href="{{url('/admin/category/list')}}" class="nav-link @if(Request::segment(2) == 'category') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Category</p></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('/admin/subcategory/list')}}" class="nav-link @if(Request::segment(2) == 'sub_category') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Sub Category</p></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('/admin/brand/list')}}" class="nav-link @if(Request::segment(2) == 'brand') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Brand</p></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('/admin/color/list')}}" class="nav-link @if(Request::segment(2) == 'color') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Color</p></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('/admin/product/list')}}" class="nav-link @if(Request::segment(2) == 'Product') active @endif">
        <i class="nav-icon fas fa-product-hunt"></i>
        <span class="menu-title"><p>Product</p></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('/admin/contact/list')}}" class="nav-link @if(Request::segment(2) == 'contact') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <p><span class="menu-title">Contact</span></p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('/admin/employee/list')}}" class="nav-link @if(Request::segment(2) == 'employee') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Employee</p></span>
      </a>
    </li>


    <li class="nav-item">
      <a href="{{url('/admin/customer/list')}}" class="nav-link @if(Request::segment(2) == 'customer') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Customer</p></span>
      </a>
    </li>


    <li class="nav-item">
      <a href="{{url('/admin/salary/list')}}" class="nav-link @if(Request::segment(2) == 'salary') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Salary</p></span>
      </a>
    </li>



    <li class="nav-item">
      <a href="{{url('/admin/expense/list')}}" class="nav-link @if(Request::segment(2) == 'expense') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Expense</p></span>
      </a>
    </li>


    <li class="nav-item">
      <a href="{{url('/admin/settings/list')}}" class="nav-link @if(Request::segment(2) == 'settings') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Settings</p></span>
      </a>
    </li>

    @endif


    @if(Auth::user()->role =="moderator")
    {{-- For Moderator --}}<li class="nav-item">
      <a href="{{url('/admin/employee/list')}}" class="nav-link @if(Request::segment(2) == 'employee') active @endif">
        <i class="nav-icon fas fa-list-alt"></i>
        <span class="menu-title"><p>Employee</p></span>
      </a>
    </li>


    @endif

    
    @if(Auth::user()->role=="user")

    {{-- For user --}}

    @endif


      <li class="nav-item nav-category">
        <form method="POST" action="{{ url('/logout') }}">
          @csrf
          <li class="nav-item">
            <button type="submit" class="nav-link" style="background: none; border: none; padding-left: 2; margin: 0; text-align:left">
              <i class="fas fa-sign-out-alt"></i>
              <span class="menu-title"><p>Logout</p></span>
            </button>
          </li>
        </form>
      </li>
    </ul>
  </nav>

