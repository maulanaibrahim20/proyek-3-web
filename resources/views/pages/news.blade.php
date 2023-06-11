@extends('index')
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Table Hospital</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" class="breadcrumb-item">Data </h4>
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
                                    <th><strong>Judul</strong></th>
                                    <th><strong>Deskripsi</strong></th>
                                    <th><strong>Gambar</strong></th>
                                    <th><strong>Aksi</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td><img src="{{ asset('/images_news/' . $data->image) }}"
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
                                                    <form action="{{ url('index/table/news/' . $data->id) }}" method="POST"
                                                        id="deleteForm">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="dropdown-item"
                                                            onclick="confirmDelete(event)">Delete</button>
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
                    <form action="{{ url('index/table/news') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="title"> Judul </label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Masukkan Judul Berita Anda!">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description"> Deskripsi berita </label>
                                <input type="text" class="form-control" name="description" id="description"
                                    placeholder="Masukkan Deskrip Berita Anda!">
                            </div>
                            <div class="form-group mb-3">
                                <label for="image"> Gambar </label>
                                <input type="file" class="form-control" name="image" id="gambar">
                            </div>
                            <img id="preview" src="#" alt="your image" class="mt-3"
                                style="display:none; width:200px;height:200px" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -
        {{-- End Modal Tambah Data --}}

        {{-- Start Modal Edit Data --}}
        @foreach ($news as $data)
            <div class="modal fade" id="EditModal{{ $data->id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ url('index/table/news/' . $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Masukkan Name" value="{{ $data->title }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Deskripsi</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="{{ $data->description }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image">Gambar</label>
                                    @if ($data->image)
                                        <p>Nama File: {{ $data->image }}</p>
                                        <img src="{{ asset('images_news/' . $data->image) }}" alt="Current Image"
                                            style="max-height: 200px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                    <input type="file" class="form-control" name="image" id="image">
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
        @endforeach
        {{-- End Modal Edit Data --}}
    @endsection
    @push('script')
        <script>
            gambar.onchange = evt => {
                preview = document.getElementById('preview');
                preview.style.display = 'block';
                const [file] = gambar.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endpush

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();

            swal({
                    title: "Apakah Anda yakin?",
                    text: "Data ini akan dihapus!",
                    icon: "warning",
                    buttons: ["Batal", "Hapus"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById("deleteForm").submit();
                    }
                });
        }
    </script>
