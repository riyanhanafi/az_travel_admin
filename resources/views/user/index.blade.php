@extends('layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        @if(session()->has('pesan'))
                        <!-- Tampilkan pesan session dalam bentuk Toastr saat dokumen dimuat -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Panggil metode Toastr
                                toastr.success("{{ session('pesan') }}");
                            });
                        </script>
                        @endif
                        @if(session()->has('hapus'))
                        <!-- Tampilkan pesan session dalam bentuk Toastr saat dokumen dimuat -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Panggil metode Toastr
                                toastr.warning("{{ session('hapus') }}");
                            });
                        </script>
                        @endif

                    </div>
                    <div class="card-body">
                        <!-- <p class="card-title">Data Mobil</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data Mobil
                        </button> -->
                        <div class="table-responsive mt-3">
                            <table id="tablesiswa" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No Ktp</th>
                                        <th>No Hp</th>
                                  
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>{{ $user->no_ktp }}</td>
                                        <td>{{ $user->no_telp }}</td>
                                       
                                    </tr>
                                    @endforeach
                                    <!-- Data akan dimuat di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data Mobil -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mobil/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" required>
                        </div>
                        <div class="form-group">
                            <label for="merek">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek" required>
                        </div>
                        <div class="form-group">
                            <label for="no_polisi">No Polisi</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" required>
                        </div>
                        <div class="form-group">
                            <label for="bahan_bakar">Bahan Bakar</label>
                            <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto_mobil">Gambar</label>
                            <input class="form-control" type="file" id="foto_mobil" name="foto_mobil">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($data as $mobil)
    <!-- Modal Edit Mobil -->
    <div class="modal fade" id="editMobilModal{{$mobil->id_mobil}}" tabindex="-1" role="dialog" aria-labelledby="editMobilModalLabel{{$mobil->id_mobil}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMobilModalLabel{{$mobil->id_mobil}}">Edit Data Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mobil/'. $mobil->id_mobil) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label for="edit_nama_mobil">Nama Mobil</label>
                            <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ $mobil->nama_mobil }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_merek">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek" value="{{ $mobil->merek }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_no_polisi">No Polisi</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi" value="{{ $mobil->no_polisi }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="{{ $mobil->harga }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $mobil->tahun }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_bahan_bakar">Bahan Bakar</label>
                            <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" value="{{ $mobil->bahan_bakar }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_foto_mobil">Gambar</label>
                            <input class="form-control" type="file" id="edit_foto_mobil" name="foto_mobil">
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $mobil->deskripsi }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($data as $mobil)
    <!-- Modal Delete Mobil -->
    <div class="modal fade" id="deleteMobilModal{{$mobil->id_mobil}}" tabindex="-1" role="dialog" aria-labelledby="deleteMobilModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMobilModalLabel">Hapus Data Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mobil/hapus/'. $mobil->id_mobil) }}">
                        @csrf

                        <input type="hidden" name="id" id="delete_id">
                        <p>Apakah Anda yakin ingin menghapus data mobil ini?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->

@endsection