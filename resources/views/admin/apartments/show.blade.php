@extends('layouts.app')

@section('content')
<div class="container p-3">
    <div class="card my-card-show">
        <img src="{{asset('storage/'.$apartment->img_apartment)}}" alt="">
        <div class="card-body">
            <h3 class="card-title">
                {{$apartment->title_apartment}}
            </h3>
            <div class="card-text">
                <p>
                {{$apartment->description}}
                </p>
                <p>
                {{$apartment->complete_address}}
                </p>
            </div>
            <section class="pt-2 my-info">
                <div class="container">
                    <div class="row align-items-center">
                        @foreach($details as $detail)
                        <div class="col-6 col-sm-2 col-md-auto">
                            <div class="flex-column flex-nowrap align-items-center">
                                <div class="col-auto my-col-auto">
                                    <div class="text-center">
                                        <img class="icon-service" src='/img/info/{{ $detail['pathImg'] }}' alt="">
                                    </div>
                                </div>
                                <div class="col-auto  my-name-icon text-center">{{ $detail['name'] }}</div>
                            </div>
                        </div>
                        <div class="col-auto">
                            {{ $detail['value'] }}
                        </div>
                        @endforeach
                    </div> 
                </div>
            </section>
            <section class="my-services pt-3">
                <div class="container">
                    <div class="row align-items-center ">
                    @foreach ($apartment->services as $service)
                        <div class="col-6 col-sm-2 my-col-auto">
                            <div class="flex-column">
                                <div class="col-auto my-col-auto text-center ">
                                    <img class="icon-service" src='/img/servizi/Risorsa {{ $service->id }}.svg' alt="">
                                </div>
                                <div class="col-auto my-col-auto my-name-icon text-center">{{ $service->name }}</div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</div> 

    <!-- <div>
        @if ($apartment->user_id === Auth::id())
            <a class="btn btn-primary" href="{{route('admin.apartments.edit',$apartment)}}"> Modifica Appartamento</a>
        @endif
    </div>

    <div class="row mt-3 mb-3">
        <div class="col 6">
            <h1>
                {{$apartment->title_apartment}}
            </h1>
        </div>
        <div class="col 6"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <img src="{{asset('storage/'.$apartment->img_apartment)}}" alt="">
        </div>
        <div class="description_container mb-3">
            <div class="mb-2">
                <h5>Descrizione:</h5>
                <p>{{$apartment->description}}</p>
            </div>
            <div class="mb-2">
                <h5>N° Stanze:</h5>
                <p>{{$apartment->rooms}}</p>
            </div>
            <div class="mb-2">
                <h5>N° Letti:</h5>
                <p>{{$apartment->beds}}</p>
            </div>
            <div class="mb-2">
                <h5>N° bagni:</h5>
                <p>{{$apartment->bathrooms}}</p>
            </div>
            <div class="mb-2">
                <h5>M²:</h5>
                <p>{{$apartment->sqr_meters}}</p>
            </div>
            <div class="mb-2">
                <h5>Indirizzo:</h5>
                <p>{{$apartment->complete_address}}</p>
            </div>
            <div class="mb-2">
                @foreach ($apartment->sponsorships as $sponosorship)
                @if ($apartment->sponsorships != '0')
                <h5>Sponsorizzazione Attiva:</h5>
                <p>{{$sponosorship->name}}</p>
                @endif
                @endforeach
            </div>
        </div>

        <div class="services_container mb-3">
            <h5>Servizi Disponibili:</h5>
            <div class="row">
            @foreach ($apartment->services as $service)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    {{$service->name}}
                </div>
            @endforeach
            </div>
        </div>

        <div class="sponsorship_container mb-3">
            <a class="btn btn-success" href="{{ route('admin.sponsorship.selection', ['id' => $apartment->id]) }}">Sponsorizza</a>
        </div>

        {{-- <div class="mb-3">
            <h3>
                Dove Soggiornerai
            </h3>
            <img src="{{asset('storage/'. $apartment->img_apartment)}}" alt="">
        </div> --}}

       
    </div>
    <div class="delete-tools_container">
        {{-- it allows the creation of a button if the apartment is been soft deleted --}}
        @if ($apartment->user_id === Auth::id())
        @if($apartment->trashed())
        {{-- it sent the apartment id to the Apartment Controller through the route --}}
        <form class="delete-form" action="{{ route ('admin.apartments.restore',$apartment->id) }}"  method="POST">
        
            @csrf
        
            <button class="btn btn-warning my-3">Ripristina</button>
        
        </form>


        {{-- it creates a button for the soft deleting method --}}
        @else
        <form class="delete-form destroy-form" action="{{ route ('admin.apartments.destroy',$apartment) }}"  method="POST">
        
            @csrf
            @method('DELETE')
        
            <button class="btn btn-danger my-3">Elimina</button>
        
        </form>
        {{-- MODAL FOR SOFT DELETE --}}
        <div class="d-none modal-delete position-fixed top-50 start-50 translate-middle rounded p-3 ms_bg-light">
            <h5 class=" ms_font-size-title">Sei sicuro di voler eliminare?</h5>
            <button class="ms_font-size ms_border ms_hover-si btn-yes btn btn-outline-dark">si</button>
            <button class=" ms_font-size ms_border ms_hover-no btn-no btn btn-outline-dark">no</button>
        </div>
        @endif
        @endif
       
    </div>-->

@endsection