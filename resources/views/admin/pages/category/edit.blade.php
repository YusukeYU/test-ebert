@extends('admin.layouts.main')
@section('container')
    <div style="margin : 2rem 0;" class="text-center">
        <h3>Editar Categoria </h3>
    </div>
    @if ($errors->any())
        <div class="text-center">
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div style="margin-top: 3rem ;margin-bottom: 4rem ; max-width: 400px!important" class="container">
        <form  action="{{ route('categories.update', $category->id_category) }}" method="POST"
            style="text-align: center">
            @csrf
            @method('put')
            <div class="form-outline mb-4">
                <label for="inputEmail4">Nome</label>
                <input value="{{ $category->name_category }}" maxlength="50" name="name_category" type="text"
                    class="form-control" placeholder="Nome">
            </div>
            <button style="background-color: black; border:none; margin-bottom:6rem;" type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
