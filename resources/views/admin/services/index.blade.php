@extends('layouts.app')

@section('content')
  <section>
    <div class="container p-5">
      <div class="row justify-content-end">
        <div class="col-auto ">
          <a class="btn btn-outline-dark" href="{{ route('admin.services.create')}}">AGGIUNGI UN NUOVO SERVIZIO</a>
        </div>
      </div>
    </div>
    <div class="container p-2">
      <div class="row">
        @foreach ($services as $service)
        <div class="col-12 col-md-6 col-lg-2 p-2">
          <div class="card p-2 h-100">
            <div class="card-text p-2 bg-secondary bg-gradient bg-opacity-25 rounded">
              <a class="text-decoration-none text-dark" href="{{ route('admin.services.show', $service) }}">
                {{ $service->name }}
              </a>
            </div>
            <div class="my-card-btn py-2 h-100">
              <div class="row gap-1 align-items-end h-100">
                <div class="col-auto">
                  <a class="btn btn-secondary btn-sm text-white" href="{{ route('admin.services.edit', $service) }}">MODIFICA</a>
                </div>
                <div class="col-auto">
                  <form class="destroy-form" action="{{ route('admin.services.destroy', $service) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger link-danger btn-sm text-white">ELIMINA</button>

                    <!-- <div class="d-none modal-delete" >
                      <h5>Sei sicuro di voler eliminare?</h5>
                      <button class="btn-yes">si</button>
                      <button class="btn-no">no</button>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection