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
                    <table class="table mb-0 table-responsive-sm">
                      <tbody class="border">
                        <tr>
                          <td class="px-3 bg-white">Order</td>
                          <td class="px-3 bg-white">Date</td>
                          <td class="px-3 bg-white">Status</td>
                          <td class="px-3 bg-white">Bank</td>
                          <td class="px-3 bg-white">Total</td>
                          <td class="px-3 bg-white">Actions</td>
                        </tr>
                        @foreach ($orders as $order)
                          <tr class="">
                            <td class="border py-4"><a href="{{ url('/account/view-order/'.$order->id) }}">#{{ $order->id }}</a></td>
                            <td class="border py-4"> {{ \Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }} </td>
                            @if ($order->status == 'success')
                              <td class="border py-4 font-weight-bold status-success"> <span>{{ $order->status }}</span> </td>
                            @elseif ($order->status == 'pending')
                              <td class="border py-4 font-weight-bold status-pending"> <span>{{ $order->status }}</span> </td>
                            @else
                              <td class="border py-4 font-weight-bold status-error"> <span>{{ $order->status }}</span> </td>
                            @endif
                              <td class="border py-4 font-weight-bold"> <span>{{ strtoupper($order->bank_name) }}</span> </td>

                              <td class="border py-4">{{ number_format($order->amount) }} KS for {{ $order->counts }} item</td>
                            <td class="border py-4"><a href="{{ url('/account/view-order/'.$order->id) }}" class="sn-view-order">VIEW</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection
