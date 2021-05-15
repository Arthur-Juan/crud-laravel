@extends('user.base')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">Editar informações</div>

        <div class="panel-body">

            <form action="" method="post">
                @method('PUT')
                @csrf


                <div class="form-group">

                    <label for="name">Nome:</label>
                    <input type="text" class='form-control' value="{{Auth::user()->name}}" name='name'>
                </div>

            
                <div class="form-group">

                    <label for="Email">Email:</label>
                    <input type="text" class='form-control' value="{{Auth::user()->email}}" name='email'>
                </div>

                <div class="form-group">

                    <label for="Email">Endereço:</label>
                    <input type="text" class='form-control' value="{{Auth::user()->address}}" name='address'>
                </div>
                

                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="{{url()->previous() }}" class="btn btn-primary d-flex">Voltar</a>
            </form>



        </div>




</div>



@endsection