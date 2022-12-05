<table class="table table-bordered">
  <tbody>
    <tr class="{{ (Request::path() == 'account') ? 'pf-active' : '' }} pf-link">
      <td class="px-3"><a href="{{ url('/account') }}">Dashboard</a></td>
    </tr>
    <tr class="{{ ((Request::path() == 'account/orders') || (Request::path() == 'account/view-order')) ? 'pf-active' : '' }} pf-link">
      <td class="px-3"><a href="{{ url('/account/orders') }}">Orders</a></td>
    </tr>
    <tr class="{{ (Request::path() == 'account/downloads') ? 'pf-active' : '' }} pf-link">
      <td class="px-3"><a href="{{ url('/account/downloads') }}">Downloads</a></td>
    </tr>
    <tr class="{{ str_contains(Request::path(), 'account/edit-address') ? 'pf-active' : '' }} pf-link">
      <td class="px-3"><a href="{{ url('/account/edit-address') }}">Addresses</a></td>
    </tr>
    <tr class="{{ (Request::path() == 'account/edit-account') ? 'pf-active' : '' }} pf-link">
      <td class="px-3"><a href="{{ route('user.edit') }}">Account Details</a></td>
    </tr>
    <tr class="pf-link">
      <td class="px-3"><a href="{{ route('user.logout')}}">Logout</a></td>
    </tr>
  </tbody>
</table>