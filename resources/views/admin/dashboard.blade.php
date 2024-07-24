@extends('layouts.app')

@section('content')
<div class="container text-center">
    {{-- <h1>Programmo Casa</h1> --}}
    
    <div class="container mb-5">
        <div class="slider">
            {{-- qui ci va lo slider --}}
        </div>
    </div>
</div>
<div class="container">

    @if (request('trash'))
        <h2 class="text-start my-4">Appartamenti eliminati</h2>
        <a class="btn btn-outline-secondary mb-3" href="{{ route('admin.apartments.index') }}">Torna agli appartamenti</a>
        

    @else
        <h2 class="text-start my-4">Appartamenti creati</h2>
        <div class="my-route row justify-content-between">
            <div class="col-auto">
                <a class="btn btn-dark mb-3" href="{{route('admin.apartments.create')}}"> Crea un nuovo appartamento</a>
            </div>
            <div class="col-auto">
                <a class="btn btn-danger" href="{{ route('admin.apartments.index', ['trash' => 1]) }}">Cestino</a>
            </div>
        </div>
    @endif

    <div class="row gy-2 gx-2 flex-wrap row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($apartments as $apartment)
        @if ($apartment->user_id === Auth::id())
        <div class="col">
            <div class="card h-100 text-center">
                <!-- mostriamo gli appartamenti in evidenza -->
            
                <div class="card-body my_card-body">

                    <div class="my-card-title-img">

                        <img src="{{asset('storage/'.$apartment->img_apartment)}}" class="card-img-top img_card" alt="">
                        <div class="my_card-title">
                            <div class="my_title">
                                <h3 class="my-3">
                                    {{$apartment->title_apartment}}
                                </h3>
                            </div>
                            <div class="my-shadow"></div>
                        </div>
                    </div>

                    <div class="my-card-text">
                        @if($apartment->visible == 0)
                            <div class="p-2 text-end">
                                <i class="fa-solid fa-eye-slash"></i>   
                            </div>
                        @else
                            <div class="p-2 text-end">
                                <i class="fa-solid fa-eye"></i>   
                            </div>
                        @endif
                        <div class="row justify-content-between">
                            <div class="col-auto">

                                @if(!$apartment->trashed())
                                    <div class="mt-3">
                                        <a class="btn btn-primary" href="{{route('admin.apartments.show',$apartment)}}">Info Appartamento</a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-auto">

                                <div>
                                    {{-- it allows the creation of a button if the apartment is been soft deleted --}}
                                    @if ($apartment->user_id === Auth::id())
                                    @if($apartment->trashed())
        
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
                                    <div class="d-none modal-delete position-absolute top-50 start-50 translate-middle rounded p-3 ms_bg-light" >
                                        <h5>Sei sicuro di voler eliminare?</h5>
                                        <button class="ms_font-size ms_border ms_hover-si btn-yes btn btn-outline-dark">si</button>
                                        <button class="ms_font-size ms_border ms_hover-no btn-no btn btn-outline-dark">no</button>
                                    </div>
                                    @endif
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif
            
        @endforeach
    </div>


</div>
@endsection