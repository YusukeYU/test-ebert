@extends('admin.layouts.main')
@section('container')
    <div style="margin : 2rem 0;" class="text-center">
        <h3>Nova Categoria </h3>
    </div>
    @if ($errors->any())
        <div class="text-center">
                @foreach ($errors->all() as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
        </div>
    @endif

    <div style="margin-top: 3rem ;margin-bottom: 4rem ; max-width: 400px!important" class="container">
        <form enctype="multipart/form-data" action="{{ route('categories.store') }}" method="POST" style="text-align: center">
            @csrf
            <div class="form-outline mb-4">
                <label for="inputEmail4">Nome</label>
                <input maxlength="50" name="name_category" type="text" class="form-control" value="{{ old('name_category') }}">
            </div>
            <button style="background-color: black; border:none; margin-bottom:6rem;" type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection
