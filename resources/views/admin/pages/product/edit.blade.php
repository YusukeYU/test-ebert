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
                <input type="text" maxlength="6" id="field" name="real" class="form-control currency"
                    value="R$ {{ number_format($product->val_product,2,",",".")}}">
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
            <div class="form-outline mb-4" style="text-align: center">
                <label for="inputEstado">Categoria</label>
                <select style="margin-bottom: 1.5rem" class="form-control" name="category_product">
                    <option value=""></option>
                    @foreach ($categories as $currentCategory)
                        <option value="{{ $currentCategory->id_category }}">
                            {{ $currentCategory->name_category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-outline mb-4" style="text-align: center">
                <label for="inputEstado">Subcategoria</label>
                <select style="margin-bottom: 1.5rem" class="form-control" name="subcategory_product">
                    <option value=""></option>
                    @foreach ($subcategories as $currentCategory2)
                        <option value="{{ $currentCategory2->id_subcategory }}">
                            {{ $currentCategory2->name_subcategory }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button style="background-color: black; border:none;" type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
@section('format')
    <script type="text/javascript">
        // Sample 1
        // {
        //     $('#currencyButton').click(function()
        //     {
        //         $('#currencyField').formatCurrency();
        //         $('#currencyField').formatCurrency('.currencyLabel');
        //     });

        // });

        // Sample 2
        // $(document).keypress(function(e) {
        //     console.log(e)
        //     if (e.which == 188) {
        //         alert('You pressed a virgula!');
        //     }
        // });

        $(document).ready(function() {
            $('.currency').blur(function() {

                let value = $('.currency').val()

                value = value.replace(",", ".")

                value = parseFloat(value)

                value = value.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                })
                console.log(value)

                $('.currency').val(value)
            });
        });

    </script>
@endsection
