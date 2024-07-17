@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center mt-3">
    <h5>
        Il nostro abbonamento comprende una sponsorizzazione di {{$sponsorship->duration}} ore ad un costo di {{$sponsorship->price}}€
    </h5>
</div>

<section class="d-flex justify-content-around mt-5">

    <div class="card bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">
            <h5>
                {{$sponsorship->name}}
            </h5>
        </div>
        <div class="card-body">
            <p class="card-title">prezzo: {{$sponsorship->price}}€</p>
            <p class="card-text">Scopri i benefici di questo servizio per le prossime {{$sponsorship->duration}}H</p>

            <button class="btn">
                <a class="btn btn-dark " href="{{route('admin.sponsorships.index', $sponsorship)}}"> Vai a Sponsorizzazioni </a>
            </button>
        </div>
    </div>


</section>

@endsection