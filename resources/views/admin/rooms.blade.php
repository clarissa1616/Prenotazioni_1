<x-admin_layout>

    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-12 text-center">
                <table id="admin-rooms-table" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Codice</th>
                            <th>Modello</th>
                            <th>Prezzo</th>
                            <th>Piano</th>
                            <th>Adulti</th>
                            <th>Bambini</th>
                            <th>Bagni</th>
                            <th>Vasca</th>
                            <th>Doccia</th>
                            <th>Balcone</th>
                            <th>Attiva</th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>ID_{{ $room->id }}</td>
                                <td class="font-weight-bold">{{ $room->code }}</td>
                                <td>{{ $room->model }}</td>
                                <td>€ {{ $room->price }}</td>
                                <td>
                                    @if ($room->floor != 0)
                                        {{ $room->floor }}
                                    @else
                                        T
                                    @endif
                                </td>
                                <td>{{ $room->n_adults }}</td>
                                <td>{{ $room->n_children }}</td>
                                <td>{{ $room->n_baths }}</td>
                                <td>
                                    @if ($room->jacuzzi)
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($room->shower)
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($room->balcony)
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($room->active)
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td style="width: 150px;">
                                    <div class="row mx-0 px-0">
                                        <div class="col-4 mx-0 px-1">
                                            <button id="btn-edit" room-id="{{ $room->id }}" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-edit-room">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-4 mx-0 px-1">
                                            <button id="btn-clone" room-id="{{ $room->id }}" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-new-room">
                                                <i class="far fa-clone"></i>
                                            </button>
                                        </div>
                                        <div class="col-4 mx-0 px-1">
                                            <button id="btn-delete" room-id="{{ $room->id }}" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete-room">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- new room modal --}}
    <div class="modal fade" id="modal-new-room" tabindex="-1" aria-labelledby="modal-new-room-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-new-room-label">Aggiungi una nuova camera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('room.store') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-new-room-label-code">Codice</span>
                                </div>
                                <input type="text" name="code" class="form-control" placeholder="Codice" aria-label="Codice"
                                    aria-describedby="modal-new-room-label-code" id="modal-new-room-code">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-new-room-label-model">Modello</span>
                                </div>
                                <input type="text" name="model" class="form-control" placeholder="Modello"
                                    aria-label="Modello" aria-describedby="modal-new-room-label-model" id="modal-new-room-model">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">€</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" name="price" class="form-control"
                                    aria-label="Prezzo in Euro (in caso di decimali, utilizzare '.' come separatore)" id="modal-new-room-price">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-new-room-label-floor">Piano</span>
                                </div>
                                <input type="text" name="floor" class="form-control" placeholder="Piano"
                                    aria-label="Piano (valore numerico)" aria-describedby="modal-new-room-label-floor" id="modal-new-room-floor">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-new-room-label-adults">Adulti</span>
                                </div>
                                <input type="text" name="n_adults" class="form-control" placeholder="Numero max di adulti"
                                    aria-label="Numero max di adulti (valore numerico)"
                                    aria-describedby="modal-new-room-label-adults" id="modal-new-room-adults">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-new-room-label-children">Bambini</span>
                                </div>
                                <input type="text" name="n_children" class="form-control"
                                    placeholder="Numero max di bambini" aria-label="Numero max di bambini (valore numerico)"
                                    aria-describedby="modal-new-room-label-children" id="modal-new-room-children">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-new-room-label-baths">Bagni</span>
                                </div>
                                <input type="text" name="n_baths" class="form-control" placeholder="Numero di bagni"
                                    aria-label="Numero di bagni (valore numerico)" aria-describedby="modal-new-room-label-baths" id="modal-new-room-baths">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descrizione</span>
                                </div>
                                <textarea class="form-control" name="description" aria-label="With textarea" id="modal-new-room-description">Descrizione di default</textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="jacuzzi" class="custom-control-input"
                                    id="modal-new-room-jacuzzi">
                                <label class="custom-control-label" for="modal-new-room-jacuzzi">Vasca da bagno /
                                    Jacuzzi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="shower" class="custom-control-input"
                                    id="modal-new-room-shower">
                                <label class="custom-control-label" for="modal-new-room-shower">Doccia</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="balcony" class="custom-control-input"
                                    id="modal-new-room-balcony">
                                <label class="custom-control-label" for="modal-new-room-balcony">Balcone</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="active" class="custom-control-input"
                                    id="modal-new-room-active">
                                <label class="custom-control-label" for="modal-new-room-active">Attiva</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-success">Aggiungi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    {{-- edit room modal --}}
    <div class="modal fade" id="modal-edit-room" tabindex="-1" aria-labelledby="modal-edit-room-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-room-label">Modifica camera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-edit-room-form" route="{{ route('room.update', ['room' => 'roomid']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-edit-room-label-code">Codice</span>
                                </div>
                                <input type="text" name="code" class="form-control" placeholder="Codice" aria-label="Codice"
                                    aria-describedby="modal-edit-room-label-code" id="modal-edit-room-code">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-edit-room-label-model">Modello</span>
                                </div>
                                <input type="text" name="model" class="form-control" placeholder="Modello"
                                    aria-label="Modello" aria-describedby="modal-edit-room-label-model" id="modal-edit-room-model">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">€</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input type="text" name="price" class="form-control"
                                    aria-label="Prezzo in Euro (in caso di decimali, utilizzare '.' come separatore)" id="modal-edit-room-price">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-edit-room-label-floor">Piano</span>
                                </div>
                                <input type="text" name="floor" class="form-control" placeholder="Piano"
                                    aria-label="Piano (valore numerico)" aria-describedby="modal-edit-room-label-floor" id="modal-edit-room-floor">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-edit-room-label-adults">Adulti</span>
                                </div>
                                <input type="text" name="n_adults" class="form-control" placeholder="Numero max di adulti"
                                    aria-label="Numero max di adulti (valore numerico)"
                                    aria-describedby="modal-edit-room-label-adults" id="modal-edit-room-adults">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-edit-room-label-children">Bambini</span>
                                </div>
                                <input type="text" name="n_children" class="form-control"
                                    placeholder="Numero max di bambini" aria-label="Numero max di bambini (valore numerico)"
                                    aria-describedby="modal-edit-room-label-children" id="modal-edit-room-children">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="modal-edit-room-label-baths">Bagni</span>
                                </div>
                                <input type="text" name="n_baths" class="form-control" placeholder="Numero di bagni"
                                    aria-label="Numero di bagni (valore numerico)" aria-describedby="modal-edit-room-label-baths" id="modal-edit-room-baths">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descrizione</span>
                                </div>
                                <textarea class="form-control" name="description" aria-label="With textarea" id="modal-edit-room-description">Descrizione di default</textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="jacuzzi" class="custom-control-input"
                                    id="modal-edit-room-jacuzzi">
                                <label class="custom-control-label" for="modal-edit-room-jacuzzi">Vasca da bagno /
                                    Jacuzzi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="shower" class="custom-control-input"
                                    id="modal-edit-room-shower">
                                <label class="custom-control-label" for="modal-edit-room-shower">Doccia</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="balcony" class="custom-control-input"
                                    id="modal-edit-room-balcony">
                                <label class="custom-control-label" for="modal-edit-room-balcony">Balcone</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="active" class="custom-control-input"
                                    id="modal-edit-room-active">
                                <label class="custom-control-label" for="modal-edit-room-active">Attiva</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-info">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- delete room modal --}}
    <div class="modal fade" id="modal-delete-room" tabindex="-1" aria-labelledby="modal-delete-room-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete-room-label">Elimina camera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-delete-room-form" route="{{ route('room.destroy', ['room' => 'roomid']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-danger">
                                Sei sicuro di volere eliminare definitivamente la seguente camera?
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Codice</div>
                            <div class="col-6 text-right" id="modal-delete-room-code"></div>
                        </div>
                        <div class="row justify-content-between py-1 bg-dark-white">
                            <div class="col-6">Modello</div>
                            <div class="col-6 text-right" id="modal-delete-room-model"></div>
                        </div>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Descrizione</div>
                            <div class="col-6 text-right" id="modal-delete-room-description"></div>
                        </div>
                        <div class="row justify-content-between py-1 bg-dark-white">
                            <div class="col-6">Prezzo</div>
                            <div class="col-6 text-right" id="modal-delete-room-price"></div>
                        </div>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Piano</div>
                            <div class="col-6 text-right" id="modal-delete-room-floor"></div>
                        </div>
                        <div class="row justify-content-between py-1 bg-dark-white">
                            <div class="col-6">Adulti</div>
                            <div class="col-6 text-right" id="modal-delete-room-adults"></div>
                        </div>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Bambini</div>
                            <div class="col-6 text-right" id="modal-delete-room-children"></div>
                        </div>
                        <div class="row justify-content-between py-1 bg-dark-white">
                            <div class="col-6">Bagni</div>
                            <div class="col-6 text-right" id="modal-delete-room-baths"></div>
                        </div>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Vasca</div>
                            <div class="col-6 text-right" id="modal-delete-room-jacuzzi"></div>
                        </div>
                        <div class="row justify-content-between py-1 bg-dark-white">
                            <div class="col-6">Doccia</div>
                            <div class="col-6 text-right" id="modal-delete-room-shower"></div>
                        </div>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Balcone</div>
                            <div class="col-6 text-right" id="modal-delete-room-balcony"></div>
                        </div>
                        <div class="row justify-content-between py-1 bg-dark-white">
                            <div class="col-6">Attiva</div>
                            <div class="col-6 text-right" id="modal-delete-room-active"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            let rooms = [];
            @foreach ($rooms as $room)
                rooms[{{$room->id}}] = @json($room);
            @endforeach
        </script>
    @endpush

</x-admin_layout>
