<!DOCTYPE html>
<html lang="en">
   @include('admin_asset.head')
   <body>
   @include('admin_asset.menu')
   <div class="main-content">
   @include('admin_asset.navbar')
   @yield('top-header')
    <div class="container-fluid mt--7">
   @yield('content')


    @include('admin_asset.footer')
    </div>
   </div>
      @include('admin_asset.script')

      @yield('script')
   </body>
</html>
