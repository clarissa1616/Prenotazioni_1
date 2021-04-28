<x-admin_layout>

    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-12 text-center">
                <table id="admin-plans-table" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrizione</th>
                            <th>Prezzo</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <td>ID_{{ $plan->id }}</td>
                                <td class="font-weight-bold">{{ $plan->name }}</td>
                                <td style="max-width: 40vw;">{{ $plan->description }}</td>
                                <td>€ {{ $plan->price }}</td>
                                <td style="width: 150px;">
                                    <div class="row mx-0 px-0">
                                        <div class="col-4 mx-0 px-1">
                                            <button id="btn-edit" plan-id="{{ $plan->id }}" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-edit-plan">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-4 mx-0 px-1">
                                            <button id="btn-clone" plan-id="{{ $plan->id }}" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-new-plan">
                                                <i class="far fa-clone"></i>
                                            </button>
                                        </div>
                                        <div class="col-4 mx-0 px-1">
                                            <button id="btn-delete" plan-id="{{ $plan->id }}" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete-plan">
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

    {{-- new plan modal --}}
    <div class="modal fade" id="modal-new-plan" tabindex="-1" aria-labelledby="modal-new-plan-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-new-plan-label">Aggiungi una nuova convenzione</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('plan.store') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="modal-new-plan-label-name">Nome</span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Nome" aria-label="Nome"
                                aria-describedby="modal-new-plan-label-name" id="modal-new-plan-name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">€</span>
                                <span class="input-group-text">0.00</span>
                            </div>
                            <input type="text" name="price" class="form-control"
                                aria-label="Prezzo in Euro (in caso di decimali, utilizzare '.' come separatore)" id="modal-new-plan-price">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descrizione</span>
                            </div>
                            <textarea class="form-control" name="description" aria-label="With textarea" id="modal-new-plan-description">Descrizione di default</textarea>
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
    

    {{-- edit plan modal --}}
    <div class="modal fade" id="modal-edit-plan" tabindex="-1" aria-labelledby="modal-edit-plan-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-plan-label">Modifica convenzione</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-edit-plan-form" route="{{ route('plan.update', ['plan' => 'planid']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="modal-edit-plan-label-name">Nome</span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Nome" aria-label="Nome"
                                aria-describedby="modal-edit-plan-label-name" id="modal-edit-plan-name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">€</span>
                                <span class="input-group-text">0.00</span>
                            </div>
                            <input type="text" name="price" class="form-control"
                                aria-label="Prezzo in Euro (in caso di decimali, utilizzare '.' come separatore)" id="modal-edit-plan-price">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descrizione</span>
                            </div>
                            <textarea class="form-control" name="description" aria-label="With textarea" id="modal-edit-plan-description">Descrizione di default</textarea>
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

    {{-- delete plan modal --}}
    <div class="modal fade" id="modal-delete-plan" tabindex="-1" aria-labelledby="modal-delete-plan-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete-plan-label">Elimina convenzione</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-delete-plan-form" route="{{ route('plan.destroy', ['plan' => 'planid']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-danger">
                                Sei sicuro di volere eliminare definitivamente la seguente convenzione?
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Codice</div>
                            <div class="col-6 text-right" id="modal-delete-plan-name"></div>
                        </div>
                        <div class="row justify-content-between py-1 bg-dark-white">
                            <div class="col-6">Descrizione</div>
                            <div class="col-6 text-right" id="modal-delete-plan-description"></div>
                        </div>
                        <div class="row justify-content-between py-1">
                            <div class="col-6">Prezzo</div>
                            <div class="col-6 text-right" id="modal-delete-plan-price"></div>
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
            let plans = [];
            @foreach ($plans as $plan)
                plans[{{$plan->id}}] = @json($plan);
            @endforeach
        </script>
    @endpush

</x-admin_layout>
