@extends('layouts.app')

@section('content')
<div class="container my-3">
  <h1 class="my-3">Seleziona la tua Sponsorizzazione!</h1>
  <p class="fw-lighter fs-4 mb-5">L'appartamento selezionato verrà messo in risalto rispetto agli appartamenti senza sponsorizzazione, aumentando le visite ed i contatti da parte degli utenti.</p>
  <div class="selected-apartment_wrap">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="card">
          {{-- style="width: 18rem;" --}}
          <img src="{{asset('storage/'.$apartment->img_apartment)}}" class="card-img-top" alt="Immagine Appartamento {{$apartment->title_apartment}}">
          <div class="card-body">
            <h5 class="card-title">{{$apartment->title_apartment}}</h5>
            <p class="card-text">{{$apartment->description}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <h4>Scegli la giusta sponsorizzazione per il tuo appartamento.</h4>
        <form action="{{ route('admin.payment.info')}}" method="POST">
          @csrf
          @foreach ($sponsorships as $sponsorship)
            <div class="form-check">
              <label class="form-check-label" for="sponsor-{{$sponsorship->id}}">
                Piano di Sponsorizzazione <strong>{{$sponsorship->name}}</strong><a href=""
                class="link-offset-2 link-underline link-underline-opacity-0">
                  <svg style="width: 20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                </a>
              </label>
              {{-- <div class="description">{{$sponsorship->description}}</div> --}}
              {{-- set the "checked" attribute to the first choice --}}
              @if ($sponsorship->id === 1)
                <input class="form-check-input" type="radio" name="Sponsor" value="{{$sponsorship->id}}" id="sponsor- {{$sponsorship->id}}" checked>
              @else
                <input class="form-check-input" type="radio" name="Sponsor" value="{{$sponsorship->id}}" id="sponsor- {{$sponsorship->id}}">
              @endif
              <div class="sponsorship-description_wrap">
                <p class="sponsorship-description mb-3 fst-italic">Mantiene in evidenza il tuo appartamento per <strong>{{$sponsorship->duration}} ore</strong> a soli <strong> &euro; {{$sponsorship->price}}</strong>.</p>
              </div>
            </div>
          @endforeach
          <button class="btn btn-success"> Vai al pagamento</button>
        </form>
      </div>

    </div>
  </div>
</section>

@endsection