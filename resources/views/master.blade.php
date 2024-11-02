@use('Illuminate\Support\Facades\Route')
@include('includes.header')
@include('includes.topbar')
@include('includes.sidebar')
    @include('includes.breadcrumb')
            <div class="page-content">
                @yield('body')
            </div><!-- /.page-content -->
@include('includes.footer')
