<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" href="{{asset('img/logoicon.png')}}">
    
    <style>
      *{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      }
      .abu-link:hover {
    background-color:gray;
}
      .how1:hover{
        background-color:gray;
      }
      a {text-decoration: none;
      }

      .side::-webkit-scrollbar{
        width: 10px;
      }

      .side::-webkit-scrollbar-track{
        background: rgba(255,255,255,0.1);
      }

      .side::-webkit-scrollbar-thumb{
        background: whitesmoke;
        border-radius: 10px;
      }
      .side{
        box-shadow: 0px 0px 10px -2px black;
      }
      .select{
        padding: 8px;
        border: 1px solid lightgrey;
        border-radius: 5px;
      }
     
      @media(max-width: 767px){
        .navbar{
          background-color: yellow;
          width: 100vw;
        }
        .side{
          width: 100vw;
          
        }
      }

      .sidebaricon i{
        color: white;
      }
      .side,.navbar{
        transition: 0.5s;
      }

      .content{
        transition: .5s;
        overflow-x: none;
      }
      

      
    </style>
    <script>
	
        $(function () {
          $('[data-toggle="info"]').tooltip();
        });
      
</script>
<script>
  $(document).ready(function(){
    $(".side").css("left", "-20px");
    var hide = false;
    $(".sidebaricon").click(function(e){
      e.preventDefault();
      if(hide){
        $(".side").css("left", "-20px");
        $(".navbar").css("left", "15.5%");
        $(".navbar").css("width", "calc(85%)");
        $(".content").css("margin-left", "17vw");
        $(".content").css("width", "80%");
        $(".navbar i").attr("class", "bi bi-layout-sidebar");
        hide = false;
      }else{
        $(".side").css("left", "-300px");
        $(".navbar").css("left", "-5px");
        $(".navbar").css("width", "100%");
        $(".content").css("margin-left", "20px");
        $(".content").css("width", "95%");
        $(".navbar i").attr("class", "bi bi-layout-sidebar-inset");
        hide = true;
      }
      
    });
    
  });
</script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg  fixed-top " style="background-color: #13161c; box-shadow: 0px 0px 10px -3px black; z-index: 1; width: calc(85%); left: 15.5%">
  <div class="container-fluid " style="background-color: ">
    <a href="" class='sidebaricon'><i class="bi bi-layout-sidebar"></i></a>
    
    <a class="navbar-brand text-white" href="#"> SELAMAT DATANG {{strtoupper(Auth::user()->roles[0]['name'])}} | <b>FOFIMA</b></a>
    <a class="navbar-brand text-white">{{Auth::user()->name}}</a>
    </div>
  </div>
</nav>
<section id="dashboard">
<div class="row no-gutters mt-5"  >
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4 side" style="position:fixed; z-index:10; height:110vh ; overflow-y : auto; bottom: 0px; top:-10px">
<ul class="nav flex-column ml-3 mb-5" >
<li class="nav-item" style="padding: 10px">
      <i class="fas fa-tachometer-alt me-2 bg-white"></i>
      
     
      <img src="{{asset('img/fofimalogotext.svg')}}" alt="" width="100">
  </li>
  <li class="nav-item">
      <i class="fas fa-tachometer-alt me-2 bg-white"></i>
      
      <a class="nav-link active text-light abu-link" aria-current="page" href="{{Route('dashboard')}}" ><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <i class="bi bi-speedometer2 mr-2"></i>  DASHBOARD</a><hr class="bg-secondary">
  </li>
  @if(Auth::user()->roles[0]['name'] == 'yayasan')
  <li class="nav-item">
    <a class="nav-link text-light  abu-link" href="{{route('adminedit')}}"><i class="bi bi-person-circle"></i>  ADMIN</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-light  abu-link" href="{{route('saldodanpenyusutan')}}"><i class="bi bi-person-circle"></i>  SALDO DAN PENYUSUTAN</a><hr class="bg-secondary">
  </li>
  @endif
  <li class="nav-item">
    <a class="nav-link text-light  abu-link" href="{{url('trans')}}"><i class="bi bi-credit-card mr-2"></i>  TRANSAKSI</a><hr class="bg-secondary">
  </li>
  @if(Auth::user()->roles[0]['name'] == 'yayasan')
  <li class="nav-item">
    <a class="nav-link text-light  abu-link" href="{{Route('bukubesar')}}"><i class="bi bi-book mr-2"></i>  BUKU BESAR</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-light  abu-link" href="{{Route('neracalajur')}}"><i class="bi bi-file-earmark-bar-graph mr-2"></i>  NERACA LAJUR</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-light  disable" ><i class="bi bi-file-text mr-2"></i>  LAPORAN :</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class=" how1 nav-link   text-light  abu-link1" href="{{Route('suplus')}}" style="margin-left:30px; font-size: 13px;"><i class="bi bi-graph-down mr-2"></i>  SURPLUS DEFISIT BULANAN</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="how1 nav-link  text-light  abu-link1" href="{{Route('neraca.tahunan')}}"style="margin-left:30px; font-size: 13px; "><i class="bi bi-journal-check mr-2"></i>  NERACA TAHUNAN </a><hr class="bg-secondary">
  </li>
  
  @endif
  <li class="nav-item">
   <a class="how1 nav-link  text-light  abu-link1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left mr-2"></i>  LOGOUT</a>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
  </li>
</ul>
</div>

<div class="col-md-10 p-6 pt-3 content" style="margin-left:17vw; width: 80%" >
<h3><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <i class="bi @yield('icon')"></i>{{" "}}@yield('title')</h3><hr>
  @yield("konten")
</div>
</div>


    <script type="text/javascript" src="admin.js"></script>
  </body>
</html>