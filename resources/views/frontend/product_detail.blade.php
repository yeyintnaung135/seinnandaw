@extends('layouts.frontend.frontend')
@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="p-1 p-md-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="position-relative">
                          @if (isset($data->discount->discount_price))
                            <div class="sn-sale-badge-detail">Sale!</div>
                          @endif
                            <div class="swiper productDetailSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-src="{{ url($data->photo) }}"
                                         data-fancybox="product_detail">
                                        <img src="{{ url($data->photo) }}"/>
                                    </div>

                                    @if(!empty($data->photo_one))
                                        <div class="swiper-slide" data-src="{{ url($data->photo_one) }}"
                                             data-fancybox="product_detail">
                                            <img src="{{ url($data->photo_one) }}"/>
                                        </div>
                                    @endif
                                    @if(!empty($data->photo_two))

                                        <div class="swiper-slide" data-src="{{ url($data->photo_two) }}"
                                             data-fancybox="product_detail">
                                            <img src="{{ url($data->photo_two) }}"/>
                                        </div>
                                    @endif
                                    @if(!empty($data->photo_three))

                                        <div class="swiper-slide" data-src="{{ url($data->photo_three) }}"
                                             data-fancybox="product_detail">
                                            <img src="{{ url($data->photo_three) }}"/>
                                        </div>
                                    @endif
                                    @if(!empty($data->photo_four))

                                        <div class="swiper-slide" data-src="{{ url($data->photo_four) }}"
                                             data-fancybox="product_detail">
                                            <img src="{{ url($data->photo_four) }}"/>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper productDetailSwiperthumb">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <img src="{{ url($data->photo) }}"/>
                                    </div>
                                    @if(!empty($data->photo_one))

                                        <div class="swiper-slide">
                                            <img src="{{ url($data->photo_one) }}"/>
                                        </div>
                                    @endif
                                    @if(!empty($data->photo_two))

                                        <div class="swiper-slide">
                                            <img src="{{ url($data->photo_two) }}"/>
                                        </div>
                                    @endif
                                    @if(!empty($data->photo_three))

                                        <div class="swiper-slide">
                                            <img src="{{ url($data->photo_three) }}"/>
                                        </div>
                                    @endif
                                    @if(!empty($data->photo_four))

                                        <div class="swiper-slide">
                                            <img src="{{ url($data->photo_four) }}"/>
                                        </div>
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            @if (!empty($cat))
                            <a href="#" class="sn-pd-cat d-block mb-3">{{strtoupper($cat->name)}}</a>
                            @else
                            <a href="#" class="sn-pd-cat d-block mb-3">Uncategorized</a>   
                            @endif
                           
                            <h4 class="font-weight-bold">{{$data->name}}</h4>
                            @if (isset($data->discount->discount_price))
                              <div class="d-flex">
                                <p class="sn-pd-price mt-3 mr-3 text-muted"><del>{{$data->price}} <span>Ks</span></del></p>
                                <p class="sn-pd-price font-weight-bold mt-3">{{$data->discount->discount_price}} <span>Ks</span></p>
                              </div>
                            @else
                              <p class="sn-pd-price font-weight-bold mt-3">{{$data->price}} <span>Ks</span></p>
                            @endif
                            <p class="sn-pd-desc pb-2">
                                {!! $data->short_desc !!}
                            </p>
                            @if(\Illuminate\Support\Facades\Auth::guard('web')->check() and Auth::guard('web')->user()->role != 'user')

                                <atc-component :pid="'{{$data->id}}'" :logined="'yes'"></atc-component>
                            @else
                                <atc-component :product="{{$data}}" :logined="'no'"></atc-component>

                            @endif
                            @if (!empty($cat))
                            <p class="border-top mt-4 pt-2">Category: <a href="#" class="sn-pd-cat"
                                                                         style="font-size: 16px;">{{strtoupper($cat->name)}}</a>
                            </p>
                            @else
                            <p class="border-top mt-4 pt-2">Category: <a href="#" class="sn-pd-cat"
                                                                         style="font-size: 16px;">Uncategorized</a>
                            </p>
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::guard('admins')->check())
                                <div class="d-inline-flex">
                                    <div class="mr-2">
                                        <a href="{{url('backend/products/edit/'.$data->id)}}"
                                           type="button" style=" width: 81px;"
                                           class=" btn btn-info btn-sm btn-block">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                    </div>
                                    <div class="mr-2">

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
                                    <div>
                                      <div class="mr-2">
                                        <a href="{{url('backend/products/discount/'.$data->id)}}"
                                           type="button" style=" width: 120px; background: darkcyan; color:#fff;"
                                           class=" btn btn-info btn-sm btn-block">
                                            <i class="fa fa-percent"></i>
                                            Set Discount
                                        </a>
                                      </div>
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
                                                @if (!empty($simcat))
                                                {{strtoupper($simcat->name)}}
                                                @else
                                                Uncategorized
                                                @endif
                                                
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

