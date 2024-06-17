@include('components.header')
<div class="d-flex flex-column align-items-center w-100">
    <div class="position-relative overflow-hidden p-3 w-100 p-md-5 m-md-3 text-center bg-body-tertiary">
        <div class="col-md-6 p-lg-5 mx-auto my-5 ">
            <h1 class="display-3 fw-bold">Designed for engineers</h1>
            <h3 class="fw-normal text-muted mb-3">Build anything you want with Aperture</h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
            <a class="icon-link" href="#">
                Learn more
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
            <a class="icon-link" href="#">
                Buy
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
            </div>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    <div class="w-75 align-self-center mt-5">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Free</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>10 users included</li>
                    <li>2 GB of storage</li>
                    <li>Email support</li>
                    <li>Help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Pro</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$15<small class="text-body-secondary fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>20 users included</li>
                    <li>10 GB of storage</li>
                    <li>Priority email support</li>
                    <li>Help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                  <h4 class="my-0 fw-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$29<small class="text-body-secondary fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                </div>
              </div>
            </div>
          </div>
      
          <h2 class="display-6 text-center mb-4">Compare plans</h2>
      
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th style="width: 34%;"></th>
                  <th style="width: 22%;">Free</th>
                  <th style="width: 22%;">Pro</th>
                  <th style="width: 22%;">Enterprise</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="text-start">Public</th>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Private</th>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                </tr>
              </tbody>
      
              <tbody>
                <tr>
                  <th scope="row" class="text-start">Permissions</th>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Sharing</th>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Unlimited members</th>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Extra security</th>
                  <td></td>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
</div>

@include('components.footer')