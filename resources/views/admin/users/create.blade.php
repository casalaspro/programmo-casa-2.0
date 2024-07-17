@extends('layouts.app')


@section('content')

<section>
  <div class="container">
    <h1>Crea Utente</h1>
  </div>
  <div class="container">
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nome e Cognome</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="inserisci il tuo Nome e Cognome" value="{{ old('name') }}">
      </div>

      <div class="mb-2">
        <label for="name">Data di Nascita</label>

        <input class="form-control" type="date" name="date_of_birth" id="date_of_birth" autocomplete="on" value="{{old('date_of_birth')}}" required autofocus>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="inserisci la tua Email" value="{{ old('email') }}">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="inserisci la tua Password" value="{{ old('password') }}">
      </div>

      <button class="btn btn-primary">Crea</button>



    </form>

    @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
  </div>
</section>

@endsection