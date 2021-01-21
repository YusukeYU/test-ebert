@extends('admin.layouts.main')
@section('container')
    <div style="margin : 1rem 0;" class="text-center">
        <h3>Produtos </h3>
    </div>

    <div class="text-center">
        <div class="btn-group" role="group" aria-label="Exemplo básico">
            <a href="{{ route('products.create') }}" style="color: white" class="btn btn-secondary"><i class="fa fa-user-plus"
                    aria-hidden="true"></i>
            </a>
        </div>

        <form action="{{ route('find-user') }}" method="POST">
            @csrf
            <div class="text-center">
                <input placeholder="Procure pelo nome..." maxlength="50" style="margin: 1rem" name="name_product"
                    type="text">
                <button class="btn btn-secondary" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
            </div>
        </form>


        <div class="text-center">

            <div class="table-responsive">
                <table style="margin: 1rem 0 1rem 0; text-align:center;" class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Descrição</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id_product }}</th>
                                <td>{{ $product->name_product }}</td>
                                <td>{{ $product->val_product }}</td>
                                <td>{{ $product->des_product }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $product->id_product) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('products.edit', $product->id_product) }}" method="GET">
                                        @csrf
                                        <div class="text-center">
                                            <button class="btn btn-secondary" type="submit"> <i class="fa fa-info"
                                                    aria-hidden="true"></i> </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($products instanceof \Illuminate\Pagination\AbstractPaginator)
                <div class="text-center" style="text-align: center; justify-content: center; margin-bottom : 1rem">
                    <div class="col-md-auto">{{ $products->links() }}</div>
                </div>
            @endif

        @endsection
