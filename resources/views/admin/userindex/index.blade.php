@extends('layouts.app')

@section('content')
<div class="container text-center mb-3">
    <h1>I tuoi appartamenti</h1>

</div>
    <div class="container">
        <div class="row gx-2 gy-2 text-center">
            @foreach ($apartments as $apartment)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100">
                    <div class="card_body p-3">
                        @if ($apartment->user_id === Auth::id())
                            {{$apartment->title_apartment}}
                            <img src="{{asset('storage/'.$apartment->img_apartment)}}" alt="">
                            {{-- <form class="delete-form destroy-form" action="{{ route ('admin.user_index.destroy',$apartment) }}"  method="POST">
                                    
                                @csrf
                                @method('DELETE')
                            
                                <button class="btn btn-danger my-3">Elimina</button>
                            
                            </form> --}}
                         @endif

                         <div class="mt-3 mb-3">
                                <a class="btn btn-success" href="">Sponsorizza</a>

                         </div>
                         <a class="btn btn-dark" href="{{route('admin.apartments.show',$apartment)}}">Visualizza dettagli</a>


                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
        
    </div>
@endsection
 