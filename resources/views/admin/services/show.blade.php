@extends('layouts.app')

@section('content')
  <section>
    <div class="container py-5">
      <div class="row">
        <div class="col-6">
          <div class="card p-2">
            <div class="card-name p-2 bg-secondary bg-gradient bg-opacity-25 rounded">
              <strong>Nome:</strong>
              {{ $service->name }}
            </div>
            @if ($service->description !== null)
            <div class="card-description p-2">
              <strong>Descrizione:</strong>
              <p>{{ $service->description }}</p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection