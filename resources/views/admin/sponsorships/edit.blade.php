@extends('layouts.app')

@section('content')

<section>
    <!-- dico di puntare alla rotta per salvare i dati (update) e il metodo -->
    <form action="{{route('admin.sponsorships.update', $sponsorship)}}" method="POST">

        <!-- aggiungo un tooken di sicurezza per l'invio dei dati -->
        @csrf
        <!-- dico che in realtà il metodo deve essere put -->
        @method('PUT')

        <input name="name" type="text" value="{{$sponsorship->name}}"> modifica nome del servizio
        <input name="price" type="number" step="0.01" value="{{$sponsorship->price}}"> modifica costo abbonamento
        <input name="duration" type="number" value="{{$sponsorship->duration}}"> modifica durata abbonamento

        <button>
            modifica
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