@extends('layouts.user.main')
@section('title', 'Dashboard')

@section('subtitle')
  <p class="text-subtitle text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora labore ducimus pariatur, at modi sit voluptatibus fuga neque quo doloremque!</p>
@endsection

@section('content')
<div class="row">
@foreach($paket as $p)
<div class="col-xl-4 col-md-6 col-sm-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h5 class="card-title">{{ $p->nama }}</h5>
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="assets/images/samples/4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="assets/images/samples/origami.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="assets/images/samples/architecture1.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                </div><p></p>
                <p class="card-text">{{ $p->deskripsi }}</p>
                <p class="card-text">{{ count($p->places) }} Tempat wisata</p>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div class="flx-cstm">
                <span>Harga Tiket</span>
                <span><b>{{ rupiah($p->harga) }}</b></span>
            </div>
            <div>
                <a href="{{ route('detail_paket', $p->id) }}" class="btn btn-outline-primary">Lihat detail</a>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection