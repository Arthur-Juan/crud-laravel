@extends('shared.base')

@section('content')
<main>

    <div class="panel panel-default">

        <div class="panel-heading">Cadastrar</div>
        @if ($errors->any())

        <h4><div class="alert alert-danger" role="alert">
            <h4>{{$errors->first()}}</h4>
        </div></h4>

        @endif
        <div class="panel-body">


            <form action="{{route('register.store')}}" method="post">
                    @csrf

                    
                    <div class="form-group">

                        <label for="name">Nome:</label>
                        <input type="text" class='form-control' placeholder="Nome" name='name' required>
                    </div>

                
                    <div class="form-group">

                        <label for="Email">Email:</label>
                        <input type="text" class='form-control' placeholder="Email" name='email' required>
                    </div>

                    <div class="form-group">

                        <label for="Email">Endereço:</label>
                        <input type="text" class='form-control' placeholder="Endereço" name='address' required>
                    </div>

                    <div class="form-group">

                        <label for="password">Senha:</label>
                        <input type="password" class='form-control' placeholder="Senha" name='password' required>
                    </div>


                <div class="form-group">
                    <a href="{{url()->previous()}}">Voltar</a>
                </div>
                <div class="form-group">
                    <button type="submit" class='btn btn-primary'>Cadastrar</button>
                </div>

                </div>
            
            </form>
        </div>


    </div>
    


</main>
@endsection