@extends('layouts.app')

@section('content')
<div class="container p-3">

    <div>
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
            {{-- <img src="{{asset('storage/uploads/'.$apartment->img_apartment)}}" alt=""> --}}

        </div>
        <div class="description_container mb-3">
            <div class="mb-2">
                <h5>
                    Descrizione:
                </h5>
                {{$apartment->description}}
            </div>
            <div class="mb-2">
                <h5>
                    N° Stanze:

                </h5>
                <p>

                    {{$apartment->rooms}}
                </p>

            </div>
            <div class="mb-2">
                <h5>

                    N° Letti:
                </h5>
                <p>

                    {{$apartment->beds}}
                </p>
            </div>
            <div class="mb-2">
                <h5>
                    N° bagni:

                </h5>
                <p>

                    {{$apartment->bathrooms}}
                </p>

            </div>

            <div class="mb-2">
                <h5>
                    M²:
</h5>
                <p>

                    {{$apartment->sqr_meters}}
                </p>

            </div>

            <div class="mb-2">
                <h5>
                    Indirizzo:

                </h5>
                <p>

                    {{$apartment->complete_address}}
                </p>

            </div>

            <div class="mb-2">
                @foreach ($apartment->sponsorships as $sponosorship)
                @if ($apartment->sponsorships != '0')
                <h5>
                    Sponsorizzazione Attiva:

                </h5>
                
                <p>
                    
                    
                        
                        
                        {{$sponosorship->name}}
                        
                    
                        
                   

                </p>
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

        <div class="mb-3">
            <h3>
                Dove Soggiornerai
            </h3>
            <img src="{{asset('storage/'. $apartment->img_apartment)}}" alt="">
            
            
        </div>

        {{-- <div class="container reviews mb-3">
            <div class="row">
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
            </div>
        </div> --}}

        {{-- <div class="other_apartments">
            qui ci sarà il carosello con le case correlate alla ricerca
        </div> --}}
    </div>
    <div>
        {{-- it allows the creation of a button if the apartment is been soft deleted --}}
        @if ($apartment->user_id === Auth::id())
        @if($apartment->trashed())
        {{-- it sent the apartment id to the Apartment Controller through the route --}}
        {{-- <form class="delete-form destroy-form" action="{{ route ('admin.apartments.forceDestroy',$apartment->id) }}"  method="POST">
        
            @csrf
            @method('DELETE')
        
            <button class="btn btn-danger my-3">Elimina definitivamente</button>
        
        </form> --}}

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
        <div class="d-none modal-delete position-fixed top-50 start-50 translate-middle rounded p-3 ms_bg-light">
            <h5 class=" ms_font-size-title">Sei sicuro di voler eliminare?</h5>
            <button class="ms_font-size ms_border ms_hover-si btn-yes btn btn-outline-dark">si</button>
            <button class=" ms_font-size ms_border ms_hover-no btn-no btn btn-outline-dark">no</button>
        </div>
        @endif
        @endif
       
    </div>
</div>
@endsection