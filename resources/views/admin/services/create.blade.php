@extends('layouts.app')

@section('content')
  <section>
    <div class="container py-5">
      <h1>Aggiungi un nuovo servizio</h1>
    </div>
    <div class="container">
      <form action="{{ route('admin.services.store') }}" method="POST">
        {{-- Cross Site Request Forgering --}}
        @csrf
        
        <div class="mb-3">
          <label for="name" class="form-label">Nome servizio</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome del servizio" value="{{old('name')}}">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descrizione</label>
          <textarea class="form-control" id="description" placeholder="Descrivi il nuovo servizio" name='description'>{{old('description')}}</textarea>
        </div>

        <button class="btn btn-dark">Aggiungi il servizio</button>
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
    </div>
  </section>
@endsection