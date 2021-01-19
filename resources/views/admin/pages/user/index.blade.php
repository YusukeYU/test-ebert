@extends('admin.layouts.main')
@section('container')
    <div style="margin : 1rem 0;" class="text-center">
        <h3>Usuários </h3>
    </div>

    @if (auth()->user()->admin_user == 1)
        <div class="text-center">
            <div class="btn-group" role="group" aria-label="Exemplo básico">
                <a href="{{ route('users.create') }}" style="color: white" class="btn btn-secondary"><i
                        class="fa fa-user-plus" aria-hidden="true"></i>
                </a>
            </div>
    @endif

        <form action="{{ route('find-user') }}" method="POST">
            @csrf
            <div class="text-center">
                <input placeholder="Procure pelo nome..." maxlength="50" style="margin: 1rem" name="name_user" type="text">
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
                        <th scope="col">Email</th>
                        <th scope="col">Admin</th>

                        @if (auth()->user()->admin_user == 1)
                            <th> </th>
                            <th> </th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                        <tr>
                            <th scope="row">{{ $user->id_user }}</th>
                            <td>{{ $user->name_user }}</td>
                            <td>{{ $user->email_user }}</td>
                            @if ($user->admin_user == 1)
                                <td>Sim</td>
                            @else
                                <td>Não</td>
                            @endif

                            @if (auth()->user()->admin_user == 1)
                                <td>
                                    <form action="{{ route('users.destroy', $user->id_user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                <form action="{{ route('users.edit' ,$user->id_user) }}" method="GET">
                                    @csrf
                                    <div class="text-center">
                                        <button class="btn btn-secondary" type="submit"> <i class="fa fa-info" aria-hidden="true"></i> </button>
                                    </div>  
                                </form>
                            </td>
                            @endif
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($users instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="text-center" style="text-align: center; justify-content: center; margin-bottom : 1rem">
                <div class="col-md-auto">{{ $users->links() }}</div>
            </div>
        @endif

    @endsection
