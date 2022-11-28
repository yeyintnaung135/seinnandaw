@extends('layouts.frontend.frontend')

@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="p-1 p-md-4 row">
              <div class="container-fluid p-0 mx-3">
                <h2 class="text-uppercase mb-3 text-left">MY ACCOUNT</h2>
                <div class="row pf-container">
                  <div class="col-12 col-md-4">
                    @include('layouts.frontend.profile_menu')
                  </div>
                  <div class="col-12 col-md-8 order-container">
                    <table class="table mb-0 table-responsive">
                      <tbody class="border">
                        <tr>
                          <td class="px-3 bg-white">Order</td>
                          <td class="px-3 bg-white">Date</td>
                          <td class="px-3 bg-white">Status</td>
                          <td class="px-3 bg-white">Total</td>
                          <td class="px-3 bg-white">Actions</td>
                        </tr>
                        <tr class="">
                          <td class="border py-4"><a href="{{ url('/account/view-order') }}">#1598</a></td>
                          <td class="border py-4">November 25, 2022	</td>
                          <td class="border py-4">On hold	</td>
                          <td class="border py-4">507,800Ks for 1 item</td>
                          <td class="border py-4"><a href="{{ url('/account/view-order') }}" class="sn-view-order">VIEW</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection