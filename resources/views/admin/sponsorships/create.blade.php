@extends('layouts.app')

@section('content')

<section>
    <!-- dico di puntare alla rotta per salvare i dati (store) e il metodo -->
    <form action="{{route('admin.sponsorships.store')}}" method="POST">

        <!-- aggiungo un tooken di sicurezza per l'invio dei dati -->
        @csrf
        <input name="name" type="text"> inserisci nome del servizio
        <input name="price" type="number" step="0.01"> inserisci costo abbonamento
        <input name="duration" type="number"> inserisci durata abbonamento

        <button>
            invia dati
        </button>
    </form>


    @if ($errors->any())
    <p class="">
    <ul>
      @foreach ($errors->all() as $error )
      <li class="alert alert-danger">{{ $error }}</li>
      @endforeach
    </ul>
    </p>
    @endif
</section>

@endsection