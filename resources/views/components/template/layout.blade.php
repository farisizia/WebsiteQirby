<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('judul')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

  @include('components.organism.nav')
 
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #021622">
    
    @include('components.organism.sidebar')
  
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('judul')</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

      <div class="card">
        <div class="card-header">
        <div class="card-body">
        @yield('content')
        </div>
      </div>
    </section>
</div>


  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('template/dist/js/demo.js')}}"></script>

@stack('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
</body>
</html>

