@extends('index')

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Table Dokter</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" class="breadcrumb-item">Data Dokter</h4>
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Tambah Data +
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>No.</strong></th>
                                    <th><strong>Foto</strong></th>
                                    <th><strong>name</strong></th>
                                    <th><strong>Poli</strong></th>
                                    <th><strong>lulusan</strong></th>
                                    <th><strong>Jenis Kelamin</strong></th>
                                    <th><strong>Rumah Sakit</strong></th>
                                    <th><strong>Aksi</strong></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctor as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td><img src="{{ asset('/images_doctor/' . $data->image) }}"
                                                style="width:60px;height:60">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->getSpesialis->spesialis }}</td>
                                        <td>{{ $data->lulusan }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>{{ $data->getHospital->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-warning light sharp"
                                                    data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editModal-{{ $data['id'] }}">
                                                        Edit
                                                    </button>
                                                    {{-- <form action="{{ url('index/table/doctor/' . $data->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('apakah anda Ingin Menghapus Data ini?')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="dropdown-item">Delete</button>
                                                    </form> --}}
                                                    <form action="{{ url('index/table/doctor/' . $data->id) }}"
                                                        method="POST" id="deleteForm">
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
    </div>

    <!-- Tambah Data -->
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Tambah Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{ url('index/table/doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name"> Nama </label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Masukkan Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jk"> Jenis Kelamin </label>
                            <select class="form-control" name="jk" id="jk">
                                <option value="">Pilih</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="spesialis"> Poli/Spesialis </label>
                            <Select class="form-control" name="spesialis" id="spesialis">
                                <option value="">- Pilih -</option>
                                @foreach ($spesialis as $data)
                                    <option value={{ $data->id }}>{{ $data->spesialis }}</option>
                                @endforeach
                            </Select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jk"> Pilih Rumah Sakit </label>
                            <select class="form-control" name="hospital" id="hospital">
                                <option value="">- Pilih -</option>
                                @foreach ($hospital as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="lulusan"> Lulusan </label>
                            <input type="text" class="form-control" name="lulusan" id="lulusan"
                                placeholder="Masukan Perguruan Tinggi Terkait">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nostr"> No.STR </label>
                            <input type="number" class="form-control" name="nostr" id="nostr"
                                placeholder="Masukkan Nomer.STR Anda Anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image"> Gambar </label>
                            <input type="file" class="form-control" name="image" id="image"
                                onchange="previewImage(event)">
                            <img id="imagePreview" src="#" alt="Preview"
                                style="max-width: 200px; max-height: 200px; margin-top: 10px; display: none;">
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
    <!-- END -->

    <!-- Edit Data -->
    @foreach ($doctor as $item)
        <div class="modal fade" id="editModal-{{ $item['id'] }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Edit Data
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form action="{{ url('index/table/doctor/' . $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="name"> Nama </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan Name" value="{{ $item['name'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="jk"> Jenis Kelamin </label>
                                <select class="form-control" name="jk" id="jk">
                                    <option value="">Pilih</option>
                                    @if ($item->jenis_kelamin == 'Laki-Laki')
                                        <option value="Laki-Laki" selected>Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    @elseif($item->jenis_kelamin == 'Perempuan')
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan" selected>Perempuan</option>
                                    @else
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="spesialis"> Poli/Spesialis </label>
                                <Select class="form-control" name="spesialis" id="spesialis">
                                    <option value="">- Pilih -</option>
                                    @foreach ($spesialis as $data)
                                        @if ($item->id_spesialis == $data->id)
                                            <option value={{ $data->id }} selected>{{ $data->spesialis }}</option>
                                        @else
                                            <option value={{ $data->id }}>{{ $data->spesialis }}</option>
                                        @endif
                                    @endforeach
                                </Select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="jk"> Pilih Rumah Sakit </label>
                                <select class="form-control" name="hospital" id="hospital">
                                    <option value="">- Pilih -</option>
                                    @foreach ($hospital as $data)
                                        @if ($item->id_hospital == $data->id)
                                            <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                        @else
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lulusan"> Lulusan </label>
                                <input type="text" class="form-control" name="lulusan" id="lulusan"
                                    placeholder="Masukan Perguruan Tinggi Terkait" value="{{ $item['lulusan'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nostr"> No.STR </label>
                                <input type="number" class="form-control" name="nostr" id="nostr"
                                    placeholder="Masukkan Nomer.STR Anda Anda" value="{{ $item['no_str'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Gambar</label>
                                @if ($data->image)
                                    <p>Nama File: {{ $item->image }}</p>
                                    <img src="{{ asset('images_doctor/' . $item->image) }}" alt="Current Image"
                                        style="max-height: 100px;">
                                @else
                                    <p>No image available</p>
                                @endif
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
    @endforeach
    <!-- END -->
@endsection
<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

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
