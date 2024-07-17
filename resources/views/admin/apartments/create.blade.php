@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">Aggiungi un appartamento</h1>
    </div>
    <div class="container">
        <form class="form-create-apartment" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data" >

            {{-- Cross Site Request Forgering --}}
            @csrf

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 flex-grow-1">
                    <p><strong>I campi che presentano * sono obligatori</strong></p>
                    <div class="mb-3">
                        
                        <label for="title_apartment">* Titolo del Appartamento:</label>
                        <input type="text" name="title_apartment" class="form-control my-error_check" id="title_apartment" placeholder="Inserisci il titolo del Appartamento" value="{{ old('title_apartment') }}" required>
                        
                        @foreach ($errors->get('title_apartment') as $message)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </div>

                        
        
                    <div class="mb-3">
                        <label for="rooms">* N° di Stanze:</label>
                        <input type="number" name="rooms" class="form-control my-error_check" id="rooms" placeholder="Inserisci le Stanze Presenti" value="{{ old('rooms') }}">

                        @foreach ($errors->get('rooms') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
                    
                    <div class="mb-3">
                        <label for="beds">* N° di Camere da Letto:</label>
                        <input type="number" name="beds" class="form-control my-error_check" id="beds" placeholder="Inserisci i Letti Presenti" value="{{ old('beds') }}">

                        @foreach ($errors->get('beds') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <label for="bathrooms">* N° di Bagni:</label>
                        <input type="number" name="bathrooms" class="form-control my-error_check" id="bathrooms" placeholder="Inserisci i Bagni Presenti" value="{{ old('bathrooms') }}">

                        @foreach ($errors->get('bathrooms') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <label for="sqr_meters">* Metri Quadrati:</label>
                        <input type="number" name="sqr_meters" class="form-control my-error_check" id="sqr_meters" placeholder="Inserisci i Metri Quadrati" value="{{ old('sqr_meters') }}">

                        @foreach ($errors->get('sqr_meters') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
        
                    <div class="mb-3">
                        <label for="img_apartment" class="form-label"> * Foto dell'Appartamento:</label>
                        <input class="form-control my-error_check" type="file" id="img_apartment" name="img_apartment" accept="image/*">

                        @foreach ($errors->get('img_apartment') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>
                      
        
                    <div class="mb-3">
                        <label for="description">Descrizione dell appartamento:</label>
                        <input type="text" name="description" class="form-control my-error_check" id="description" placeholder="Inserisci Info Generali" value="{{ old('description') }}">

                        @foreach ($errors->get('description') as $message)
                            <li class="my-3 alert alert-danger py-1">{{ $message }}</li>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="complete_address" class="form-label">* Indirizzo Completo:</label>
                        <input type="text" class="form-control my-input-address my-error_check" id="complete_address" name="complete_address" value="{{ old('complete_address') }}" required placeholder="Inserisci la Via e scegli tra quelle suggerite">
                        <div class="invalid-feedback">
                            Per favore inserisci una città valida.
                        </div>
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

                    <div class="">
                        <div class="service_container">
                            <p>Servizi Disponibili:</p>
                            <div class="row">
                                @foreach ($services as $service)
                                    <div class="form-check col-lg-3 col-md-6 col-sm-12 mb-3">
                                        <input class="" @checked(in_array($service->id, old('services',  [])))        type="checkbox" name='services[]' id='service-{{    $service->id }}'   value='{{ $service->id }}'>
                                        <label class="service-name" for="weapon-{{ $service->id }}">
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

            </div>
           
           
            <button class="btn btn-primary mb-3">Crea appartamento</button>
        </form>
    </div>
@endsection