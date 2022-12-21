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
        <h2 class="text-uppercase mb-2">Promotions</h2>
        <div class="text-right">
            <select name="" class="orderby" aria-label="Shop Order" id="sort_id">
                <option hidden selected>Default Sorting</option>
                <option value="1">Sort by Popularity</option>
                <option value="2">Sort by Latest</option>
                <option value="3">Sort by price:low to high</option>
                <option value="4">Sort by price:high to low</option>
            </select>
        </div>
        <div class="sn-home-products d-flex flex-wrap mt-5" id="product_space">
           @include('frontend/promotion_product')
        </div>
                    
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
         url:"/shoppagination/fetch_promotion_data?page="+page+"&sorttype="+sort_type,
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
</script>
@endpush
