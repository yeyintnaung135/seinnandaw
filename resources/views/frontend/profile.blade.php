<div class="container-fluid p-0 mx-3">
  <h2 class="text-uppercase mb-3 text-left">MY ACCOUNT</h2>
  <div class="row pf-container">
    <div class="col-12 col-md-4">
      <table class="table table-bordered">
        <tbody>
          <tr class="{{ (Request::path() == 'account') ? 'pf-active' : '' }} pf-link">
            <td class="px-3"><a href="#">Dashboard</a></td>
          </tr>
          <tr class="{{ (Request::path() == '/account/orders') ? 'pf-active' : '' }} pf-link">
            <td class="px-3"><a href="#">Orders</a></td>
          </tr>
          <tr class="{{ (Request::path() == '/account/downloads') ? 'pf-active' : '' }} pf-link">
            <td class="px-3"><a href="#">Downloads</a></td>
          </tr>
          <tr class="{{ (Request::path() == '/account/edit-address') ? 'pf-active' : '' }} pf-link">
            <td class="px-3"><a href="#">Addresses</a></td>
          </tr>
          <tr class="{{ (Request::path() == '/account/edit-account') ? 'pf-active' : '' }} pf-link">
            <td class="px-3"><a href="#">Account Details</a></td>
          </tr>
          <tr class="{{ (Request::path() == '/account') ? 'pf-active' : '' }} pf-link">
            <td class="px-3"><a href="#">Logout</a></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-12 col-md-8">
      <p class="m-0">Hello <strong>Swe Swe</strong> (not <strong>Swe Swe</strong>? <a href="#">Log out</a>)</p>
      <br>
      <p>From your account dashboard you can view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a>, and <a href="#">edit your password and account details</a>.</p>
    </div>
  </div>
</div>