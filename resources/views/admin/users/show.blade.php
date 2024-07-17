@extends('layouts.app')

@section('content')

  <section class="py-3">
    <div class="container">
      <h2>Utente {{ $user->id }}</h2>
    </div>

    <div class="container">
      <div class="mb-3">
        <h4>Id:</h4>
        <p>{{ $user->id }}</p>
      </div>
      <div class="mb-3">
        <h4>Nome e Cognome:</h4>
        <p>{{ $user->name }}</p>
      </div>
      {{-- @if ($user->date_of_birth) --}}
      <div class="mb-3">
        <h4>Data di Nascita:</h4>
        <p>{{ $user->date_of_birth }}</p>
      </div>
      {{-- @endif --}}
    </div>
    <div class="container">
      <h4>Modifica</h4>
      <div class="mb-3 d-flex">
        <a class="btn btn-secondary me-2" href="{{route('admin.users.edit', $user)}}">Modifica</a>

        <form class="delete-form destroy-form" action="{{ route('admin.users.destroy',$user) }}" method="POST">
        
          @csrf
          @method('DELETE')

          <button class="btn btn-danger me-2">Elimina</button>
        
        </form>
      </div>
    </div>
  </section>

@endsection