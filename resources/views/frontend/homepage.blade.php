@extends('frontend.layout')

@section('content')
    <div class="hero" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-5">
                        <div class="col-lg-7 intro">
                            <h1><strong>Sewa Mobil</strong> Dengan Satu Sentuhan.</h1>
                        </div>
                    </div>

                    <form class="trip-form" method="get" action="{{ route('car.index') }}">
                        <div class="row align-items-center">
                            <div class="mb-3 mb-md-0 col-md-4">
                                <select name="category_id" id="category_id" class="custom-select form-control">
                                    <option value="">Pilih Kategori Mobil</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mb-md-0 col-md-4">
                                <select name="penumpang" id="penumpang" class="custom-select form-control">
                                    <option value="">Jumlah Penumpang</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="mb-3 mb-md-0 col-md-4">
                                <input type="submit" value="Cari" class="btn btn-primary btn-block py-3" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <h2 class="section-heading"><strong>Cara Pemesanan</strong></h2>
            <p class="mb-5">Langkah yang mudah untuk menyewa mobil</p>

            <div class="row mb-5">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="step">
                        <span>1</span>
                        <div class="step-inner">
                            <span class="number text-primary">01.</span>
                            <h3>Pilih Mobil</h3>
                            <p>
                                Pilih mobil yang sesuai dengan kebutuhan dan budget Anda dari daftar kendaraan kami yang
                                tersedia.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="step">
                        <span>2</span>
                        <div class="step-inner">
                            <span class="number text-primary">02.</span>
                            <h3>Isi Form</h3>
                            <p>
                                Lengkapi formulir pemesanan dengan data diri, tanggal sewa, dan lokasi penjemputan agar kami
                                dapat menyiapkan kendaraan Anda tepat waktu.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="step">
                        <span>3</span>
                        <div class="step-inner">
                            <span class="number text-primary">03.</span>
                            <h3>Pembayaran</h3>
                            <p>
                                Lakukan pembayaran sesuai instruksi yang diberikan. Setelah pembayaran terkonfirmasi, mobil
                                siap Anda gunakan sesuai jadwal.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center order-lg-2">
                    <div class="img-wrap-1 mb-5">
                        <img src="{{ asset('frontend/images/feature_01.png') }}" alt="Image" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-4 ml-auto order-lg-1">
                    <h3 class="mb-4 section-heading">
                        <strong>Kami berkomitmen untuk memberikan pelayanan terbaik</strong>
                    </h3>
                    <p class="mb-5">
                        Kami selalu berusaha memberikan pelayanan terbaik, agar setiap pelanggan merasa aman, nyaman, dan
                        puas selama menyewa mobil bersama kami.
                    </p>

                    <p><a href="#" class="btn btn-primary">Kontak Kami</a></p>
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
                        Pilih Mobil Sesuai Kebutuhan Anda.
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
                                    <a href="{{ route('car.show', \App\Helpers\UuidHelper::encodeIdToUuid($car->id)) }}"
                                        class="btn btn-primary w-100">Sewa Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Testimonial</strong></h2>
                    <p class="mb-5">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>
                                    {{ $testimonial->pesan }}
                                </p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="{{ Storage::url($testimonial->profile) }}" alt="Image"
                                    style="object-fit:cover;width: 80px;height:80px;" class="img-fluid mr-3" />
                                <div class="author-name">
                                    <span class="d-block">{{ $testimonial->name }}</span>
                                    <span>{{ $testimonial->pekerjaan }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
