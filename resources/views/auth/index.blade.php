@extends('shared.base')

@section('content')
<main>

    <div class="panel panel-default">

        <div class="panel-heading">Login</div>

        <div class="panel-body">

            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h4>{{$errors->first()}}</h4>
            </div>
        @endif

            <form action="{{route('login')}}" method="post">
                    @csrf


                
                    <div class="form-group">

                        <label for="Email">Email:</label>
                        <input type="text" class='form-control' placeholder="Email" name='email' required>
                    </div>
                    
                    <div class="form-group">

                        <label for="password">Senha:</label>
                        <input type="password" class='form-control' placeholder="Senha" name='password' required>
                    </div>
                    

                <div class="form-group">
                    <a href="{{url()->previous()}}">Voltar</a>
                </div>
                <div class="form-group">
                    <button type="submit" class='btn btn-primary'>Logar</button>
                </div>

                </div>
            
            </form>
        </div>


    </div>
    


</main>
@endsection