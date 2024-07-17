@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h5 class="d-flex justify-content-center my-3">
        Scopri di seguito i nostri abbonamenti e scegli quello più giusto per te in base alla durata della sponsorizzazione ed al suo prezzo. 
    </h5>
</div>


<section class="d-flex justify-content-around">

    <!-- dico di prendere dalla tabella sponsorships ogni sponsor come dato -->
    @foreach($sponsorships as $sponsorship)

        <div class="card bg-light mb-3 mt-5" style="max-width: 18rem;">
            <div class="card-header text-center">
                <h5>
                    {{$sponsorship->name}}
                </h5>
            </div>
            <div class="card-body">
                <p class="card-title">Prezzo: {{$sponsorship->price}}€</p>
                <p class="card-text">Scopri i benefici di questo servizio per le prossime {{$sponsorship->duration}}H</p>

                <button class="btn">
                    <a class="btn btn-dark" href="{{route('admin.sponsorships.show', $sponsorship)}}">Visualizza i Dettagli</a>
                </button>
            </div>
        </div>

    @endforeach

</section>

@endsection