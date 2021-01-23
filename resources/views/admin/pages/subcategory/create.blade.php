@extends('admin.layouts.main')
@section('container')
    <div style="margin : 2rem 0;" class="text-center">
        <h3>Nova Subcategoria </h3>
    </div>
    @if ($errors->any())
        <div class="text-center">
                @foreach ($errors->all() as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
        </div>
    @endif

    <div style="margin-top: 3rem ;margin-bottom: 4rem ; max-width: 400px!important" class="container">
        <form  action="{{ route('subcategories.store') }}" method="POST" style="text-align: center">
            @csrf
            <div class="form-outline mb-4">
                <label for="inputEmail4">Nome</label>
                <input maxlength="50" name="name_subcategory" type="text" class="form-control" value="{{ old('name_subcategory') }}">
            </div>
            <label for="inputEmail4">Categoria Principal</label>
            <select style="margin-bottom: 1.5rem" class="form-control" name="parent_subcategory">
                    <option value=""></option>
                    @foreach ($categories as $currentCategory)
                        <option value="{{ $currentCategory->id_category }}">
                            {{$currentCategory->name_category }}
                        </option>
                    @endforeach
            </select>
            <button style="background-color: black; border:none;" type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection
