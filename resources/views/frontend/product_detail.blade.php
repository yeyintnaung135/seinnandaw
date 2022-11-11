@extends('layouts.frontend.frontend')

@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="p-1 p-md-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div>
                            <div
                                class="swiper productDetailSwiper"
                            >
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-src="{{ url($data->photo) }}"
                                         data-fancybox="product_detail">
                                        <img src="{{ url($data->photo) }}"/>
                                    </div>
                                    {{--                  <div class="swiper-slide" data-src="{{ url('images/products/15.jpg') }}" data-fancybox="product_detail">--}}
                                    {{--                    <img src="{{ url('images/products/15.jpg') }}" />--}}
                                    {{--                  </div>--}}
                                    {{--                  <div class="swiper-slide" data-src="{{ url('images/products/16.jpg') }}" data-fancybox="product_detail">--}}
                                    {{--                    <img src="{{ url('images/products/16.jpg') }}" />--}}
                                    {{--                  </div>--}}
                                    {{--                  <div class="swiper-slide" data-src="{{ url('images/products/17.jpg') }}" data-fancybox="product_detail">--}}
                                    {{--                    <img src="{{ url('images/products/17.jpg') }}" />--}}
                                    {{--                  </div>--}}
                                </div>
                            </div>
                            {{--              <div thumbsSlider="" class="swiper productDetailSwiperthumb">--}}
                            {{--                <div class="swiper-wrapper">--}}
                            {{--                  <div class="swiper-slide">--}}
                            {{--                    <img src="{{ url('images/products/14.jpg') }}" />--}}
                            {{--                  </div>--}}
                            {{--                  <div class="swiper-slide">--}}
                            {{--                    <img src="{{ url('images/products/15.jpg') }}" />--}}
                            {{--                  </div>--}}
                            {{--                  <div class="swiper-slide">--}}
                            {{--                    <img src="{{ url('images/products/16.jpg') }}" />--}}
                            {{--                  </div>--}}
                            {{--                  <div class="swiper-slide">--}}
                            {{--                    <img src="{{ url('images/products/17.jpg') }}" />--}}
                            {{--                  </div>--}}
                            {{--                </div>--}}
                            {{--              </div>--}}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <a href="#" class="sn-pd-cat d-block mb-3">{{strtoupper($cat->name)}}</a>
                            <h4 class="font-weight-bold">{{$data->name}}</h4>
                            <p class="sn-pd-price font-weight-bold mt-3">{{$data->price}} <span>Ks</span></p>
                            <p class="sn-pd-desc pb-2">
                                {!! $data->description !!}
                            </p>
                            <div class="sn-pd-input d-flex">
                                <input type="number" name="" id="" value="1">
                                <button>ADD TO CART</button>
                            </div>
                            <p class="border-top mt-4 pt-2">Category: <a href="#" class="sn-pd-cat"
                                                                         style="font-size: 16px;">{{strtoupper($cat->name)}}</a></p>
                            @if(\Illuminate\Support\Facades\Auth::check() and Auth::user()->role != 'user')
                                <div class="d-inline-flex">
                                    <div class="mr-2">
                                        <a href="{{url('backend/products/edit/'.$data->id)}}"
                                           type="button" style=" width: 81px;"
                                           class=" btn btn-info btn-sm btn-block">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                    </div>
                                    <div>

                                        <button onclick="Delete()" type="button" style=" width: 81px;"
                                                class=" btn btn-danger btn-sm btn-block">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </button>
                                        <form id="delete_form"
                                              action="{{ url('backend/products/delete') }}"
                                              method="POST"
                                              style="display: none;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}"/>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($data->description != '')
                    <div>
                        <h5 class="font-weight-bold mt-3 pt-3 mb-4 mt-md-5 border-top">Description</h5>
                        <p class="sn-pd-desc">
                            {!! $data->description !!}
                        </p>
                    </div>
                @endif
            </div>


            {{-- Related Products --}}
            @if(count($sim) > 0)
                <div class="sn-products p-1 p-md-4">
                    <h2 class="text-uppercase mb-3 text-left">RELATED PRODUCTS</h2>
                    <div class="sn-home-products">
                        <div thumbsSlider="" class="swiper relatedProductsSwiper">
                            <div class="swiper-wrapper">

                                @foreach($sim as $s)
                                    <div class="swiper-slide sn-swiper-wrapper">
                                        <a href="{{url('/product/detail/'.$s->id)}}" class="mb-4">
                                            <img src="{{ url($s->photo) }}" alt="">
                                            <span class="sn-category my-2">
                                                <?php
                                                $simcat = \App\Categories::where('id', $s->category_id)->first();
                                                ?>
                                                {{strtoupper($simcat->name)}}
                                    </span>
                                            <h3 class="sn-product-title">{{$s->name}}</h3>
                                            <span class="sn-price">{{$s->price}} Ks</span>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{url('backend/plugins/sweetalert2/sweetalert2.all.js')}}"></script>

    <script>
        function Delete() {
            console.log('fefe')
            $(function () {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-danger ml-2',
                        cancelButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete_form').submit();
                    }
                })
            });
        };
    </script>
@endpush

