<x-admin_layout>

    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-12 text-center">
                <table id="admin-users-table" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Data di registrazione</th>
                            <th>Abilitato</th>
                            <th>Azione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>ID_{{ $user->id }}</td>
                                <td class="font-weight-bold">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>
                                    @if ($user->role == 'admin')
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td style="min-width: 50px;">
                                    @if ($user->role == 'admin')
                                        <button id="btn-edit" user-id="{{ $user->id }}" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-edit-user">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @else
                                        <button id="btn-edit" user-id="{{ $user->id }}" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-edit-user">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- edit user modal --}}
    <div class="modal fade" id="modal-edit-user" tabindex="-1" aria-labelledby="modal-edit-user-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-user-label">Abilita utente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-danger" id="modal-edit-user-prompt">
                            Sei sicuro di volere abilitare il seguente utente?
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between py-1">
                        <div class="col-6">Nome</div>
                        <div class="col-6 text-right" id="modal-edit-user-name"></div>
                    </div>
                    <div class="row justify-content-between py-1 bg-dark-white">
                        <div class="col-6">E-Mail</div>
                        <div class="col-6 text-right" id="modal-edit-user-email"></div>
                    </div>
                    <div class="row justify-content-between py-1">
                        <div class="col-6">Data di registrazione</div>
                        <div class="col-6 text-right" id="modal-edit-user-createdat"></div>
                    </div>
                    <div class="row justify-content-between py-1 bg-dark-white">
                        <div class="col-6">Prezzo</div>
                        <div class="col-6 text-right" id="modal-edit-user-admin"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <a href="#" route="{{route('user.update', ['user' => 'userid'])}}" class="btn btn-info" id="modal-edit-user-submit">Abilita</a>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            let users = [];
            @foreach ($users as $user)
                users[{{$user->id}}] = @json($user);
            @endforeach
        </script>
    @endpush

</x-admin_layout>
