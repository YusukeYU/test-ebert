@extends('admin.layouts.main')
@section('container')
    <div style="margin : 1rem 0;" class="text-center">
        <h3> Subcategorias</h3>
    </div>

    <div class="text-center">
        <div class="btn-group" role="group" aria-label="Exemplo básico">
            <a href="{{ route('subcategories.create') }}" style="color: white" class="btn btn-secondary"><i
                    class="fa fa-user-plus" aria-hidden="true"></i>
            </a>
        </div>

        <form action="{{ route('find-subcategory') }}" method="POST">
            @csrf
            <div class="text-center">
                <input placeholder="Procure pelo nome..." maxlength="50" style="margin: 1rem" name="name_subcategory"
                    type="text">
                <button class="btn btn-secondary" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
            </div>
        </form>

        <div class="text-center">
             <select  onchange="window.location = this.options[this.selectedIndex].value;" style="max-width: 261px; width:261px;" name="" id="">
                <option value="#" > Filtrar...</option>
             <option value="{{ route('categories.index') }}" > Categorias</option>
             <option value="{{ route('subcategories.index') }}"> Subcategorias</option>
             </select>
            </div>

        <div class="text-center">

            <div class="table-responsive">
                <table style="margin: 1rem 0 1rem 0; text-align:center;" class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Categoria Principal</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <th scope="row">{{ $subcategory->id_subcategory }}</th>
                                <td>{{ $subcategory->name_subcategory }}</td>
                                @if($subcategory->parent_subcategory == 0)
                                <td> Principal </td>
                                @else
                                <td> Subcategoria </td>
                                @endif
                                <td>{{ $subcategory->name_category }}</td>
                                <td>
                                    <form action="{{ route('subcategories.destroy', $subcategory->id_subcategory) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('subcategories.edit', $subcategory->id_subcategory) }}" method="GET">
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
            @if ($subcategories instanceof \Illuminate\Pagination\AbstractPaginator)
                <div class="text-center" style="text-align: center; justify-content: center; margin-bottom : 1rem; color:black">
                    <div class="col-md-auto pagination justify-content-center">{{ $subcategories->links() }}</div>
                </div>
            @endif
        </div>

    </div>
@endsection
