@extends('admin.layouts.main')
@section('container')
    <div style="margin : 2rem 0;" class="text-center">
        <h3>Editar Usuário </h3>
    </div>

    <div style="margin-top: 3rem ;margin-bottom: 4rem ;" class="container">
        <form action="{{ route('users.update', $user->id_user) }}" method="POST" style="margin-bottom: 2rem;">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input disabled value="{{ $user->email_user }}" maxlength="50" name="email_user" type="email"
                        class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Nome Completo</label>
                    <input value="{{ $user->name_user }}" maxlength="50" name="name_user" type="text" class="form-control"
                        id="inputCity">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEstado">Administrador</label>
                    <select name="admin_user" id="inputEstado" class="form-control">
                        @if ($user->admin_user == 0)
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        @else
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        @endif
                    </select>
                </div>
            </div>
            <button style="background-color: black; border:none;" type="submit" class="btn btn-primary">Salvar</button>
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
