@extends('admin.layouts.main')
@section('container')
    <div style="margin : 2rem 0;" class="text-center">
        <h3>Editar Produto </h3>
    </div>
    @if ($errors->any())
    <div class="text-center">
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
    </div>
@endif
    <div style="margin-top: 3rem ;margin-bottom: 4rem ; max-width: 400px!important" class="container">
        <form enctype="multipart/form-data" action="{{ route('products.update', $product->id_product) }}" method="POST"
            style="text-align: center">
            @csrf
            @method('put')
            <div class="form-outline mb-4">
                <label for="inputEmail4">Nome</label>
                <input value="{{ $product->name_product }}" maxlength="50" name="name_product" type="text"
                    class="form-control" placeholder="Nome">
            </div>
            <div class="form-outline mb-4" style="text-align: center">
                <label for="inputEmail4">Valor</label>
                <br><small>Reais </small>
                <input type="text" maxlength="6" id="field" name="real" class="form-control"
                    value="{{ substr((string) $product->val_product, 0, -3) }}">

                <br><small>Centavos </small> <br>
                <input type="text" maxlength="2" id="field2" name="cents" class="form-control"
                    value="{{ substr((string) $product->val_product, -2) }}">
            </div>
            <div class="form-outline mb-4" style="text-align: center">
                <label for="inputEstado">Descrição</label>
                <textarea cols="20" maxlength="200" name="des_product" class="form-control" id="exampleFormControlTextarea1"
                    rows="3">{{ $product->des_product }}</textarea>
            </div>
            <div class="form-outline mb-4" style="text-align: center">
                <label for="inputEstado">Foto</label>
                <input type="file" name="photo_product">
            </div>
            <button style="background-color: black; border:none;" type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
