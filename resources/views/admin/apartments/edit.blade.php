@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">Modifica un appartamento</h1>
        
        <!-- @isset($checkAddress) -->
        <input type="hidden" id="checkAddress" value="{{$checkAddress}}"></input>
        <!-- @endisset -->
    </div>
    <div class="container">
        <form class="form-create-apartment" action="{{ route('admin.apartments.update',$apartment) }}" method="POST" enctype="multipart/form-data">

            {{-- Cross Site Request Forgering --}}
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 flex-grow-1">
                    <p><strong>I campi che presentano * sono obligatori</strong></p>
                    <div class="mb-3">
                        <div>
                            <label for="title_apartment">* Titolo dell'Appartamento:</label>
                        </div>
                        <input type="text" name="title_apartment" class="form-control my-error_check" id="title_apartment" placeholder="Inserisci il titolo del Appartamento" value="{{old('name',$apartment->title_apartment)}}">

                        @foreach ($errors->get('title_apartment') as $message)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="rooms">* N° di Stanze:</label>
                        </div>
                        <input type="number" name="rooms" class="form-control my-error_check" id="rooms" placeholder="Inserisci le Stanze Presenti" value="{{old('rooms',$apartment->rooms)}}">

                        @foreach ($errors->get('rooms') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="beds">* N° di Camere da Letto:</label>
                        </div>
                        <input type="number" name="beds" class="form-control my-error_check" id="beds" placeholder="Inserisci i Letti Presenti" value="{{old('beds',$apartment->beds)}}">

                        @foreach ($errors->get('beds') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="bathrooms">* N° di Bagni:</label>
                        </div>
                        <input type="number" name="bathrooms" class="form-control my-error_check" id="bathrooms" placeholder="Inserisci i Bagni Presenti" value="{{old('bathrooms',$apartment->bathrooms)}}">

                        @foreach ($errors->get('bathrooms') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="sqr_meters">* Metri Quadrati:</label>
                        </div>
                        <input type="number" name="sqr_meters" class="form-control my-error_check" id="sqr_meters" placeholder="Inserisci i Metri Quadrati" value="{{old('sqr_meters',$apartment->sqr_meters)}}">

                        @foreach ($errors->get('sqr_meters') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>

                    @if($apartment->img_apartment)
                        <img class="current-image" src="/storage/{{ $apartment->img_apartment }}" width="100">
                        <p class="click-on-image d-none" >✓ Immagine selezionata</p>
                    @endif
        
                    <div class="mb-3">
                        <div>
                            <label for="img_apartment">* Foto dell'Appartamento:</label>
                        </div>
                        <input type="file" name="img_apartment" class="form-control my-error_check" id="img_apartment" placeholder="Inserisci foto dell Appartamento" value="{{old('img_apartment', $apartment->img_apartment)}}" accept="image/*">

                        @foreach ($errors->get('img_apartment') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="description">Descrizione dell'Appartamento:</label>
                        </div>
                        <input type="text" name="description" class="form-control my-error_check" id="description" placeholder="Inserisci Info Generali" value="{{old('description',$apartment->description)}}">

                        @foreach ($errors->get('description') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <label for="complete_address">* Indirizzo Completo:</label>
                        <input type="text" name="complete_address" class="form-control my-error_check my-input-address" id="complete_address" pplaceholder="Inserisci la Via e scegli tra quelle suggerite" value="{{old('complete_address',$apartment->complete_address)}}">
                        <table>
                            <tbody class="my-table-suggestions">
                                
                            </tbody>
                        </table>

                        @foreach ($errors->get('complete_address') as $message)
                        <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                    @endforeach
                    </div>

                    <input class="latitude" type="hidden" value="0" name="latitude">
                    <input class="longitude" type="hidden" value="0" name="longitude">
                </div>

                <div class="">
                    <div class="service_container">
                        <h4>Servizi Disponibili</h4>
                        @foreach ($services as $service)
                            <div class="form-check col-lg-3 col-md-6 col-sm-12 mb-3">
                                <input class="form-check-input" @checked(in_array($service->id, old('services', $apartment->services->pluck('id')->all() ))) type="checkbox" name='service[]' id="service-{{ $service->id }}" value="{{ $service->id }}">
                                <label class="form-check-lable service-name" for="weapon-{{ $service->id }}">
                                {{ $service->name }}
                                </label>

                            </div>
                        @endforeach
                    </div>
    
                </div>

            </div>
           
           
            <button class="btn btn-primary mb-3">modifica appartamento</button>
        </form>
{{-- 
        @if ($errors->any())
        <p class="">
        <ul>
          @foreach ($errors->all() as $error )
          <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
        </ul>
        </p>
        @endif --}}

    </div>
@endsection


