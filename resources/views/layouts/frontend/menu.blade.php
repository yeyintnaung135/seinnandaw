<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand sn-brand-logo" href="#"><img src="{{url('images/logo.png')}}" alt="SeinNanDaw"></a>
        @if(Auth::check())
            <span class="color:red;">{{Auth::user()->name}}</span>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse sn-nav" id="navbarNav">
            <div class="">
                <ul class="navbar-nav">
                    <li class="{{ (request()->is('/')) ? 'active' : '' }} nav-item">
                        <a class="nav-link" href="{{url('/')}}">HOME</a>
                    </li>
                    @foreach($catlist as $c)
                        <li class="{{ (request()->is('category/'.strtolower($c->name).'/'.$c->id)) ? 'active' : '' }} nav-item">
                            <a class="nav-link"
                               href="{{url('/category/'.strtolower($c->name).'/'.$c->id)}}">{{strtoupper($c->name)}}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            {{-- <div class="sn-menu-icon d-none">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('account')}}"><i class="fa fa-user"></i></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/cart')}}"><i
                                class="fa fa-shopping-bag position-relative"><span
                                    class="shopping-bag-badge">1</span></i></a>
                    </li>
                </ul>
            </div> --}}

            <div class="sn-menu-icon d-flex">
              <div class="px-2">
                  <a class="text-dark" href="{{url('account')}}"><i class="fa fa-user"></i></a>
              </div>
              <div class="px-2">
                  <a class="text-dark" href="#"><i class="fa fa-search"></i></a>
              </div>
              <div class="px-2">
                  <a class="text-dark" href="{{url('/cart')}}"><i
                          class="fa fa-shopping-bag position-relative"><span
                              class="shopping-bag-badge">1</span></i></a>
              </div>
          </div>

        </div>
    </nav>
</header>
