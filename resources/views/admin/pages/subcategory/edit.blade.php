@extends('admin.layouts.main')
@section('container')
    <div style="margin : 2rem 0;" class="text-center">
        <h3>Editar Subcategoria </h3>
    </div>
    @if ($errors->any())
        <div class="text-center">
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div style="margin-top: 3rem ;margin-bottom: 4rem ; max-width: 400px!important" class="container">
        <form  action="{{ route('subcategories.update', $subcategory[0]->id_subcategory) }}" method="POST"
            style="text-align: center">
            @csrf
            @method('put')
            <div class="form-outline mb-4">
                <label for="inputEmail4">Nome</label>
                <input value="{{ $subcategory[0]->name_subcategory }}" maxlength="50" name="name_subcategory" type="text"
                    class="form-control" placeholder="Nome">
            </div>
            <div class="form-outline mb-4">
                <label for="inputEmail4">Categoria Principal</label>
                <select class="form-control" name="parent_subcategory">
                    <option value="{{$subcategory[0]->id_category}}">{{$subcategory[0]->name_category}} </option>
                @foreach($categories2 as $category2)
                     <option value="{{$category2->id_category}}">{{$category2->name_category}} </option>
                @endforeach
                </select>
            </div>
            <button style="background-color: black; border:none;" type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
