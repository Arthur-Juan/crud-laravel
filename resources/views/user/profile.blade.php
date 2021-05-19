@extends('user.base')

@section('content')
<div class="main-body">
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
      </ol>
      <ul class="nav navbar-nav navbar-right">
        {{-- <li><a href="{{route('user.edit'), Auth::user()->id}}" class="btn btn-primary">Editar Perfil</a></li> --}}
       
      </ul>

    </nav>
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://static.wikia.nocookie.net/serieben10/images/6/67/Massa_Cinzenta.png/revision/latest/scale-to-width-down/200?cb=20101009000532&path-prefix=pt-br" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{Auth::user()->name}}</h4>
                <p class="text-secondary mb-1">Cargo(Locator/Cliente)</p>
                <p class="text-muted font-size-sm">{{Auth::user()->address}}</p>
                <button class="btn btn-primary">Follow</button>
                <button class="btn btn-outline-primary">Message</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">                 
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a  class='btn btn-primary'href="{{route('user.edit')}}">Editar Perfil</a>                 
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              
              <form action="{{route('user.delete')}}" method="post" name='formdel'>
              @csrf
              @method('DELETE')
             <button type="submit" class="btn btn-danger js-del">Apagar conta</button>         
              </form>
            </li>
            
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{Auth::user()->name}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{Auth::user()->email}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Endereço</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{Auth::user()->address}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Número</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                (320) 380-4539
              </div>
            </div>
            <hr>
          </div>
        </div>
        <div class="row gutters-sm">
          
            @foreach ($imoveis as $imovel)
            <div class="col-sm-6 mb-3">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$imovel->descricao}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$imovel->cidadeEndereco}}</h6>
                <p class="card-text">{{$imovel->descricao}}</p>
                <a href="{{route('imoveis.show', $imovel->id)}}" class="btn btn-info">Ver detalhes</a>
                {{-- <a href="#" class="card-link">Another link</a> --}}
              </div>
            </div>
          </div>
            @endforeach
          
        </div>
      </div>
    </div>
  </div>  

  <script src="{{asset('/js/del.js')}}"></script>
  @endsection