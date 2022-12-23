@extends('layouts.frontend.frontend')

@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="row no-gutters" style="margin-top: 50px;margin-bottom:22px;">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9">
                    <div style="margin-left:42px;">
                        <div>
                            <h1 class="" style="font-size: 2.1176470588235rem;color:black;">LOCATIONS</h1>
                        </div>

                        @foreach ($locs as $loc)
                          <div class="lostyle">
                            <div>
                                <h3 class="addresstitle">{{ Str::upper($loc->branch_name) }}</h3>
                            </div>
                            <div class="mt-4 address">
                                <i aria-hidden="true" class="fas fa-map-marker-alt mr-3"></i>{{ $loc->address }}<br>
                            </div>
                            <div class="mt-1 address">
                                <i aria-hidden="true" class="fas fa-mobile-alt mr-3"></i>{{ $loc->phone_number }}
                            </div>
                          </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

@endpush
@push('styles')
    <style>
        .lostyle {
            margin-top: 60px;
            margin-bottom: 0px;
        }
        .addresstitle{
            font-size: 19px;
            color:black;

        }
        .address{
            font-size: 18px;
            color:#565656;

        }
    </style>
@endpush
