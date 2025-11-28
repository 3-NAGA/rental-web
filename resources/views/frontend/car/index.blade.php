@extends('frontend.layout')

@section('content')
    <div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-5">
                    <div class="intro">
                        <h1><strong>Daftar Mobil</strong></h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.html">Home</a> <span class="mx-2">/</span>
                            <strong>Daftar Mobil</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Daftar Mobil</strong></h2>
                    <p class="mb-5">
                        Kami menyediakan berbagai macam mobil.
                    </p>
                </div>
            </div>

            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ Storage::url($car->image) }}" alt="{{ $car->nama_mobil }}"
                                class="card-img-top img-fluid rounded object-fit-cover"
                                style="width: 100%; aspect-ratio: 16/9; object-fit: cover; object-position: center;">


                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-uppercase fw-bold mb-2">{{ $car->nama_mobil }}</h5>
                                    <div class="rent-price mb-2">
                                        <strong>Rp{{ number_format($car->price, 0, ',', '.') }}</strong>
                                        <span class="text-muted">/ hari</span>
                                    </div>
                                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                                        <div><span class="text-muted">Pintu:</span> {{ $car->pintu }}</div>
                                        <div><span class="text-muted">Penumpang:</span> {{ $car->penumpang }}</div>
                                    </div>
                                    <p class="text-muted small">{{ $car->description }}</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('car.show', $car) }}" class="btn btn-primary w-100">Sewa Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
