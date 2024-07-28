<div class="app-content-header">
  <div class="container-fluid">
      <div class="row">
          <div class="col-sm-6">
              <h3 class="mb-0">@yield('header')</h3>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="@yield('link-header')">@yield('header')</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                      @yield('subheader')
                  </li>
              </ol>
          </div>
      </div>
  </div>
</div>