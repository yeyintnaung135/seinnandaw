@extends('layouts.frontend.frontend')
<style>
    option{
        font-weight: normal;
        display: block;
        white-space: nowrap;
        min-height: 1.2em;
        padding: 0px 2px 1px;
    }
    .orderby{
        background-color: transparent;
        border: transparent;
        border-radius: 0;
        padding: 0.8em;
        /* padding-right: 2em; */
        box-shadow: none;
        font-size: 1.1em;
        font-weight: 400;
    }
    .pagination{
        margin-left: 81vw;
    }
    .page-item.active .page-link{
        background-color: #212529 !important;
    }
</style>
@section('content')
  <section>
    <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
      <div class="sn-products p-3 p-md-5 bg-white">
        <h4>JEWELRY FOR EVERY OCCASION</h4>
        <h2 class="text-uppercase mb-2">Shop</h2>
        <div class="text-right">
            <select name="" class="orderby" aria-label="Shop Order" id="sort_id">
                <option hidden selected>Default Sorting</option>
                <option value="1">Sort by Popularity</option>
                <option value="2">Sort by Latest</option>
                <option value="3">Sort by price:low to high</option>
                <option value="4">Sort by price:high to low</option>
            </select>
        </div>

            @include('frontend/shop_product')
          {{-- <a href="{{url('/product/1')}}" class="mb-4">
            <img src="{{ url('images/products/14.jpg') }}" alt="">
            <span class="sn-category my-2">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a>
          <a href="{{url('/product/1')}}" class="mb-4">
            <img src="{{ url('images/products/15.jpg') }}" alt="">
            <span class="sn-category my-2">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a>
          <a href="{{url('/product/1')}}" class="mb-4">
            <img src="{{ url('images/products/16.jpg') }}" alt="">
            <span class="sn-category my-2">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a>
          <a href="{{url('/product/1')}}" class="mb-4">
            <img src="{{ url('images/products/17.jpg') }}" alt="">
            <span class="sn-category my-2">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a> --}}
        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
      function fetch_data(page, sort_type)
       {
        // alert("Sort Type = "+sort_type);
        $.ajax({
         url:"/shoppagination/fetch_data?page="+page+"&sorttype="+sort_type,
         success:function(data)
         {
          console.log(data);
          $('#product_space').html('');
          $('#product_space').html(data);
        //   $('.pagination').hide();
         }
        })
       }
       $(document).on('change', '#sort_id', function(){
        // alert("hello");
        var page = $('#hidden_page').val();
        var sort_type = $('#sort_id').val();
        // alert(page);
        fetch_data(page, sort_type);
       });
       $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        // alert(page);
        $('#hidden_page').val(page);
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#sort_id').val();


        $('li').removeClass('active');
              $(this).parent().addClass('active');
              fetch_data(page, sort_type);
       });

    })
    // function get_sort()
    // {
    //     var sortid = $('#sort_id').val();
    //     // alert(sortid);
    //     $.ajax({
    //         type: 'POST',
    //         url: '/get_product_sortall_ajax',
    //         data: {
    //           "_token": "{{csrf_token()}}",
    //           "sort_id": sortid,
    //         },
    //         success: function (data) {
    //             console.log(data);
    //             var html = "";
    //             var htmllink="";
    //             var i=0;

    //             for(i=0;i<data.products.data.length;i++)
    //             {
    //                html+= `
    //                 <a href="{{url('/product/1')}}" class="mb-4">
    //                     <img src="${data.products.data[i].photo}" alt="">
    //                     <span class="sn-category my-2">${data.products.data[i].category.name}</span>
    //                     <h3 class="sn-product-title">${data.products.data[i].name}</h3>
    //                     <span class="sn-price">${data.products.data[i].price} Ks</span>
    //                 </a>
    //                 `
    //             }

    //             $('#product_space').html(html);

    //       }
    //     });
    // }
</script>
@endpush
