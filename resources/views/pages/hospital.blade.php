@extends('index')
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Table User</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" class="breadcrumb-item">Data Pengguna</h4>
                    <a href="" data-bs-toggle="modal" data-bs-target="#basicModal"
                        class="btn btn-primary d-sm-inline-block d-none">Tambah data<i
                            class="fa-solid fa-plus ms-3 scale5"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>No.</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Alamat</strong></th>
                                    <th><strong>Gambar</strong></th>
                                    <th><strong>Aksi</strong></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hospital as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td><img src="{{ asset('/images_hospital/' . $data->image) }}"
                                                style="width:100px;height:70">
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-warning light sharp"
                                                    data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24">
                                                            </rect>
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2">
                                                            </circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#EditModal{{ $data->id }}">Edit</a>
                                                    <form action="{{ url('index/table/doctor/' . $data->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('apakah anda Ingin Menghapus Data ini?')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="dropdown-item">Delete</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{-- Mulai Tambah Data Modal --}}
        <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input Data Doctor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form action="{{ url('index/table/hospital') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="name"> Nama </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address"> Alamat </label>
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="Masukkan Alamat">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address"> Gambar </label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Tambah Data --}}

        {{-- Start Modal Edit Data --}}
        {{-- @foreach ($doctor as $doctor)
            <div class="modal fade" id="EditModal{{ $doctor->id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{ url('index/table/doctor/' . $doctor->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="name"> Nama </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Name" value="{{ $doctor->name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jk"> Jenis Kelamin </label>
                                    <select class="form-control" name="jk" id="jk"
                                        value="{{ $doctor->jk }}">
                                        <option disabled>Pilih</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="poli"> Poli/Spesialis </label>
                                    <input type="poli" class="form-control" name="poli" id="poli"
                                        placeholder="Masukkan Poli/Spesialis Anda?" value="{{ $doctor->poli }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="lulusan"> Lulusan </label>
                                    <input type="text" class="form-control" name="lulusan" id="lulusan"
                                        placeholder="Masukan Perguruan Tinggi Terkait" value="{{ $doctor->lulusan }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nostr"> No.STR </label>
                                    <input type="number" class="form-control" name="nostr" id="nostr"
                                        placeholder="Masukkan Nomer.STR Anda Anda" value="{{ $doctor->no_str }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach --}}
        {{-- End Modal Edit Data --}}
    @endsection
