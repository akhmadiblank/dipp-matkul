<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.metadata')
    @include('admin.partials.styles')
</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
            @include('admin.partials.sidebar')
            @include('admin.partials.topbar')
            
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('admin.partials.footer')
        </div>
    </div>
    
    @include('admin.partials.scripts')
</body>
</html>
