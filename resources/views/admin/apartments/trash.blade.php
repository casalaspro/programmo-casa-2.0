
@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Programmo Casa</h1>
    <div class="container mb-5">
        <div class="slider">
            qui ci va lo slider
        </div>
    </div>
</div>
    <div class="container">

        <a class="btn btn-primary mb-3" href="{{route('admin.apartments.create')}}"> crea un unovo appartamento</a>


        <div class="row gx-3 gy-3 text-center">
            @foreach ($apartments as $apartment)
            @if ($apartment->trashed()) {
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="img_banner">
                            <img src="{{asset('img/'.$apartment->img_apartment)}}" alt="">
                            <div class="banner">
                                {{$apartment->title_apartment}}
                                <div>
                                    <a href="{{route('admin.apartments.show',$apartment)}}">look apartment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif   
            @endforeach
        </div>
    

</div>
@endsection