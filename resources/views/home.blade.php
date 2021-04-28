<x-app>
    <div id="bookingBtn" class="text-center btn btn-book pr-0" style="border:transparent;">
        <!-- Button trigger modal -->
        <button type="button" class=" btn btn-book pr-0 btn-outline-none" data-toggle="modal" data-target="#exampleModalCenter">
            <img src="https://www.borgoegnazia.it/assets/img/default/book-now.svg?v=1617113456" class="img-fluid">
        </button>
    </div>

    <div class="container-fluid" id="main-video-container">
        <div class="row">
            <div class="col-12 p-0 m-0 vh-100">
                <div class="video-container">
                    <video muted class="video-max-dim" autoplay id="main-video">
                        <source type="video/mp4" src="./media/Overview.mp4">
                    </video>
                </div>
                <div class="absolute-bottom-right">
                    <button class="btn floral-white btn-outline-none" id="main-video-pause"><h5><i class="fas fa-pause" id="main-video-pause-icon"></i></h5></button>
                    <button class="btn mr-2 ml-1 floral-white btn-outline-none" id="main-video-skip"><h5><i class="fas fa-forward"></i></h5></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid d-none" id="view-home">
        <div class="row">
            <div class="col-12 col-md-6 p-0 m-0 vh50 filter" id="col-vid-tl">
                <a href="{{ Route('rooms.index') }}">
                <div class="video-container">
                    <h2 class="position-center floral-white font-weight-bold">{{ __('Esplora') }}</h2>
                    <video muted class="video-min-dim" loop id="vid-tl">
                        <source type="video/mp4" src="./media/Lookinside.mp4">
                    </video>
                </div>
                </a>
            </div>
            <div class="col-12 col-md-6 p-0 m-0 vh50 filter">
                <div class="video-container">
                    <h2 class="position-center floral-white font-weight-bold">{{ __('Il tuo Borgo') }}</h2>
                    <video muted class="video-min-dim" loop id="vid-tr">
                        <source type="video/mp4" src="./media/Borgo.mp4">
                    </video>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0 m-0 vh50 bottega filter">
                <h2 class="position-center floral-white font-weight-bold">{{ __('La Bottega ') }}</h2>
            </div>
            <div class="col-12 col-md-6 p-0 m-0 vh50 filter">
                <div class="video-container">
                    <h2 class="position-center floral-white font-weight-bold">{{ __('Vivere il Borgo') }}</h2>
                    <video muted class="video-min-dim" loop id="vid-br">
                        <source type="video/mp4" src="./media/Puglia.mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
        aria-labelledby="exampleModalLabelCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bg-modal rounded p-3">
                <div class="modal-header" style="border:transparent">
                    <h5 class="modal-title text-center" id="exampleModalLabelCenter">Verifica disponibilità</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('booking.index')}}" method="GET">
                        <div class="form-row">
                            <div class="form-group col-md-6 text-center ">
                                <label for="date">Arrivo</label>
                                <input class="form-control it-date-datepicker bg-input floral-white" name='date_end'
                                    id="date_end" type="date" value="{{ now()->format('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-6 text-center">
                                <label for="date">Partenza</label>
                                <input class="form-control it-date-datepicker bg-input floral-white " name='date_start'
                                    id="date_start" type="date" value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 text-center">
                                <label for="quantity">Adulti</label>
                                <input type="number" class="form-control bg-input floral-white" id="n_adults" min="1"
                                    name="n_adults[]" max=10 value="0">
                            </div>
                            <div class="form-group col-md-6 text-center">
                                <label for="quantity">Bambini</label>
                                <input type="number" class="form-control bg-input floral-white" id="n_children" min="0"
                                   name="n_children[]" max=10 value="0">
                            </div>
                        </div>
                        <input type="hidden" name="n_rooms" value="1">
                        <button type="submit" class="btn btn-block mt-3 bg-input text-white">Verifica
                            disponibilità</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



</x-app>
