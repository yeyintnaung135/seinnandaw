<header>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand sn-brand-logo" href="#"><img src="{{url('images/logo.png')}}" alt="SeinNanDaw"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/')}}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="{{ (request()->is('product-category/necklace')) ? 'active' : '' }} nav-link" href="{{url('/product-category/necklace')}}">NECKLACE</a>
          </li>
          <li class="nav-item">
            <a class="{{ (request()->is('product-category/earrings')) ? 'active' : '' }} nav-link" href="{{url('/product-category/earrings')}}">EARRINGS</a>
          </li>
          <li class="nav-item">
            <a class="{{ (request()->is('product-category/ring')) ? 'active' : '' }} nav-link" href="{{url('/product-category/ring')}}">RING</a>
          </li>
          <li class="nav-item">
            <a class="{{ (request()->is('product-category/pendant')) ? 'active' : '' }} nav-link" href="{{url('/product-category/pendant')}}">PENDANT</a>
          </li>
          <li class="nav-item">
            <a class="{{ (request()->is('product-category/bracelet')) ? 'active' : '' }} nav-link" href="{{url('/product-category/bracelet')}}">BRACELET</a>
          </li>
          <li class="nav-item">
            <a class="{{ (request()->is('product-category/bangle')) ? 'active' : '' }} nav-link" href="{{url('/product-category/bangle')}}">BANGLE</a>
          </li>
        </ul>
      </div>
      <div class="sn-menu-icon">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fa fa-user"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/cart')}}"><i class="fa fa-shopping-bag position-relative"><span class="shopping-bag-badge">1</span></i></a>
          </li>
        </ul>
      </div>
      
    </div>
  </nav>
</header>
