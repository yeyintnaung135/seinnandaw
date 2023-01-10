<div class="container-fluid p-0 mx-3">
    <h2 class="text-uppercase mb-3 text-left">MY ACCOUNT</h2>
    <div class="row pf-container">
        <div class="col-12 col-md-4">
            @include('layouts.frontend.profile_menu')
        </div>
        <div class="col-12 col-md-8">
            <p class="m-0">Hello <strong>{{ Auth::guard('web')->user()->name }}</strong> (not <strong>{{ Auth::guard('web')->user()->name }}</strong>? <a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:#269fb7;">Log out</a>)</p>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <br>
            <p>From your account dashboard you can view your <a href="{{ url('/account/orders') }}">recent orders</a>, manage your <a href="{{ url('/account/edit-address') }}">shipping and billing addresses</a>, and <a href="{{ url('/account/edit-account') }}">edit your password and account details</a>.</p>
        </div>
    </div>
</div>
