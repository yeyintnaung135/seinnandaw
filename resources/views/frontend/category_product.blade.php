<div class="sn-home-products d-flex flex-wrap mt-5" id="product_space">
@foreach($data as $d)
  <a href="{{url('/product/detail/'.$d->id)}}" class="mb-4">
    <img src="{{ url($d->photo) }}" alt="">
    <span class="sn-category my-2"></span>
    <h3 class="sn-product-title">{{$d->name}}</h3>
    <span class="sn-price">{{$d->price}} Ks</span>
  </a>
@endforeach
{!! $data->links() !!}
</div>
