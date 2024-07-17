@extends('layouts.app')

@section('content')
<div class="container">
  <div class="heading my-4">
    <h5>Id</h5>
    <p>{{ $message->id }}</p>
    <h5>Nome</h5>
    <p>{{ $message->name }}</p>
    <h5>Cognome</h5>
    <p>{{ $message->surname }}</p>
    <h5>Email Mittente</h5>
    <p>{{ $message->email_sender }}</p>
    <h5>Numero di telefono</h5>
    <p>{{ $message->phone_number }}</p>
    <h5>Appartamento d'Interesse</h5>
    {{-- se la variabile $apartment esiste allora mostra il link  --}}
    @isset($apartment[0] )
    <a href="{{ route('admin.apartments.show', $apartment[0]) }}">{{ $apartment[0]->title_apartment }}</a>
        
    @endisset
    {{-- @dump($apartment[0]) --}}
  </div>
  <hr>
  <div class="message_body">
    <h2>Messaggio di {{ $message->name }} {{ $message->surname }}</h2>
    <p>{{ $message->text }}</p>
  </div>
</div>
@endsection