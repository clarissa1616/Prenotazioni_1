<x-app>
    <div class="container-fluid bg-footer py-3">
        <div class="container">
            <div class="row">
                <div class="col-2 text-white"> 
                    <img src="./img/Logowhite.png" alt="" width="150px">
                </div>
                <div class="col-10 text-white text-right"> 
                    <ul class="menu-booking">
                        <li><a href="#" class="text-white">La mia prenotazione</a></li>
                        <li><a href="#" class="text-white">Lingua</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 bg-fluid" style="background:url(./img/borgo-egnazia_roof.jpg);height:250px">
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{route('booking.index')}}" method="get">
        <div class="row my-3">
            <div class="col-5">
                <div class="d-flex">
                    <input type="date" class="form-control w-50" name="date_start" value="{{Request::get('date_start')}}">
                    <input type="date" class="form-control w-50" name="date_end" value="{{Request::get('date_end')}}">
                </div>
            </div>

            <div class="col-5">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dati">
                    <i class="fas fa-user-friends"></i> <span id="n_adults">{{Request::get('n_adults')[0]}}</span> <span class="mr-2">Adulti</span>
                    <i class="fas fa-child"></i> <span id="n_children">{{Request::get('n_children')[0]}}</span> <span class="mr-2">Bambini</span>
                    <i class="fas fa-door-open"></i> <span id="n_rooms">{{Request::get('n_rooms')}}</span> <span class="mr-2">Camere</span>
                </button>
            </div>

            <div class="col-2">
                <input type="hidden" name="n_adults[]" value="{{Request::get('n_adults')[0]}}">
                <input type="hidden" name="n_children[]" value="{{Request::get('n_children')[0]}}">
                <input type="hidden" name="n_rooms" value="{{Request::get('n_rooms')}}">
                <input type="submit" value="Ricerca" class="btn btn-success">
            </div>
        </div>
    </form>
    </div>


<!-- Modal -->
<div class="modal fade" id="dati" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Ospiti & Camere</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-danger">Chiudi</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="booking_data">
                <h6 class="mt-3 mb-3">Ospiti camera 1</h6>
                <div class="row">
                    <div class="col-6">
                        <p>Adulti</p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <button class="btn bg-primary mr-2 text-white opacity-5 btn_remove_adults"> - </button>
                            <span class="span_n_adults"> 3 </span>
                            <button class="btn bg-primary ml-2 text-white opacity-5 btn_add_adults"> + </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Bimbi</p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <button class="btn bg-primary mr-2 text-white opacity-5 btn_remove_children"> - </button>
                            <span class="span_n_children"> 3 </span>
                            <button class="btn bg-primary ml-2 text-white opacity-5 btn_add_children"> + </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer border-0">
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-around">
                        <button type="button" class="btn btn-primary" id="btn_add_room">Più camere</button>
                        <button type="button" class="btn btn-danger" id="btn_remove_room">Meno camere</button>
                    </div>

                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

</x-app>
