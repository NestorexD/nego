@include('cloudservice.negocios._header')

<body>
  <!--Header Section-->
  <div class="top-header">
    <div class="container"> 
      <div class="row">
        <div class="col-md-6 text-left">
          <img src="/images/logo.png" alt="Arequipacosas Arequipacosas.com">
        </div>
        <div class="col-md-6 text-right">         
          <button type="button" class="btn btn-primary">Registra tu negocio</button>
          <button type="button" class="btn btn-primary">Iniciar Sesión</button> 
        </div>  
      </div>
    </div>
  </div>
  <!--/end header-->
  <!--Section Slider and description-->
  
  <!--Section Description-->  
  <section id="buscador">
    <div class="container">

      @yield('content')
      
    </div>
  </section>


  <!----> 
  <section id="feature" >
        <div class="container">
             
         @include('cloudservice.negocios.icons')

        </div><!--/.container-->
    </section><!--/#feature-->


  
  <div id="information">
    <div class="container text-left">
      
          @include('cloudservice.negocios._footer')

    </div>
  </div>
  <!--footer-end-->

  <!--javascript Files-->
  <script src="{{asset('jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/codejava.js')}}"></script>
</body>
</html>