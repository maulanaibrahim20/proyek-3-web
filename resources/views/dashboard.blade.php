@extends('index')
@section('content')
    <div class="row top_tiles">
        <div class="col-sm-12">
            <div class="alert" style="background-color: #0AA8B0; color: white;">
                <p style="font-size: 20px; margin-bottom: 0;">Selamat Datang <b>"{{ auth()->user()->name }}"</b></p>
            </div>
        </div>
    </div>
    {{-- Start Card --}}
    <div class="row invoice-card-row">
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card bg-warning invoice-card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('icons/man.png') }}" width="44px" height="44px" alt="Icon Man">
                    </div>
                    <div>
                        <h2 class="text-white invoice-num">{{ $jumlah_user }}</h2>
                        <span class="text-white fs-18">User Terdaftar</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card bg-success invoice-card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('icons/doctor.png') }}" width="50px" height="50px" alt="Icon Doctor">
                    </div>
                    <div>
                        <h2 class="text-white invoice-num">{{ $jumlah_doctor }}</h2>
                        <span class="text-white fs-18">Dokter Tersedia</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card bg-info invoice-card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('icons/hospital.png') }}" width="50px" height="50px" alt="Icon Hospital">
                    </div>
                    <div>
                        <h2 class="text-white invoice-num">{{ $jumlah_hospital }}</h2>
                        <span class="text-white fs-18">Rumah Sakit Tersedia</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card bg-secondary invoice-card">
                <div class="card-body d-flex">
                    <div class="icon me-3">
                        <img src="{{ asset('icons/news.png') }}" width="40px" height="40px" alt="Icon News">
                    </div>
                    <div>
                        <h2 class="text-white invoice-num">{{ $jumlah_news }}</h2>
                        <span class="text-white fs-18">Berita Tersedia</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Card --}}
@endsection
