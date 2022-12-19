<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a href="{{url('/')}}" class="navbar-brand sn-brand-logo" href="#"><img src="{{url('images/logo.png')}}" alt="SeinNanDaw"></a>
        {{-- @if(Auth::guard('web')->check() and Auth::guard('web')->user()->role='user')
            <span class="color:red;">{{Auth::guard('web')->user()->name}}</span>
        @endif --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse sn-nav" id="navbarNav">
            <div class="">
                <ul class="navbar-nav">
                    <li class="{{ (request()->is('/')) ? 'active' : '' }} nav-item pr-0 pr-lg-4">
                        <a class="nav-link pl-3 pl-lg-0" href="{{url('/')}}">HOME</a>
                    </li>
                    @foreach($catlist as $c)
                        <li class="{{ (request()->is('category/'.strtolower($c->name).'/'.$c->id)) ? 'active' : '' }} nav-item pr-0 pr-lg-4 position-relative">
                            <div class="d-flex justify-content-between">
                              @if ($c->def != 1)
                                 <a class="sn-nav-down nav-link text-dark pl-3 pl-lg-0" href="{{url('/category/'.strtolower($c->name).'/'.$c->id)}}">{{strtoupper($c->name)}}</a>
                                 <button class="sn-chevron-down pr-4 pr-lg-2 d-block d-lg-none" onclick="toggleSubMenu('{{ $c->name }}')"></button>
                                 <button class="sn-chevron-down pr-4 pr-lg-2 d-none d-lg-block" onmouseover="hoverToShowSubMenu('{{ $c->name }}')"></button>
                              @endif

                            </div>

                            <div class="sn-sub-menu d-none" id="{{$c->name }}">
                              <a href="{{url('/category/'.strtolower($c->name).'/'.$c->id.'/'.'GOLD')}}"><span class="sn-chevron-right"></span> GOLD</a>
                              <a href="{{url('/category/'.strtolower($c->name).'/'.$c->id.'/'.'DIAMOND')}}"><span class="sn-chevron-right"></span> DIAMOND</a>
                                <a href="{{url('/category/'.strtolower($c->name).'/'.$c->id.'/'.'WHITE GOLD')}}"><span class="sn-chevron-right"></span> WHITE GOLD</a>
                            </div>
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

                    <li class="nav-item active" >
                        <a class="nav-link" href="{{url('/cart')}}"><i
                                class="fa fa-shopping-bag position-relative"><span v-if="addtocartcount > 0"
                                    class="shopping-bag-badge">@{{ addtocartcount }}</span>
                                <span v-else
                                      class="shopping-bag-badge">0</span></i></a>
                    </li>
                </ul>
            </div> --}}

            <div class="sn-menu-icon d-flex">
              <div class="px-2">
                  <a class="text-dark" href="{{url('account')}}"><i class="fa fa-user"></i></a>
              </div>
{{--              <div class="px-2">--}}
{{--                  <a class="text-dark" href="#"><i class="fa fa-search"></i></a>--}}
{{--              </div>--}}
              <div class="px-2">
                  <a class="text-dark" href="{{url('/cart')}}"><i
                          class="fa fa-shopping-bag position-relative"><span v-if="addtocartcount > 0"
                                                                             class="shopping-bag-badge">@{{ addtocartcount }}</span>
                          <span v-else
                                class="shopping-bag-badge">0</span></i></a>
              </div>
          </div>

        </div>
    </nav>
</header>
