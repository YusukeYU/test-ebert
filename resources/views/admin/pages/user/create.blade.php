@extends('admin.layouts.main')
@section('container')
    <div style="margin : 2rem 0;" class="text-center">
        <h3>Novo Usuário </h3>
    </div>

    <div style="margin-top: 3rem ;margin-bottom: 4rem ;" class="container">
        <form action="{{route('users.store') }}" method="POST" style="margin-bottom: 2rem;" >
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input  value="{{old('email_user')  }}" maxlength="50" name="email_user" type="email" class="form-control" id="inputEmail4" placeholder="Email" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input maxlength="50" type="password" name="password_user" class="form-control" id="inputPassword4" placeholder="Senha">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Nome Completo</label>
                    <input value="{{old('name_user')  }}" maxlength="50" name="name_user" type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Administrador</label>
                    <select name="admin_user" id="inputEstado" class="form-control">
                        <option value="0" selected>Escolher...</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>

            </div>

            <button style="background-color: black; border:none;" type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        @if ($errors->any())
        <div class="text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
@endsection
