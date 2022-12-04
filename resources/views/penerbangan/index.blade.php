@extends('template')

@section('content')


<h4 class="mt-5">Data Penerbangan</h4>

<a href="{{ route('penerbangan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
    <form action="/penerbangan" method="GET">
        <input type="search" id="search" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search...">
    </form>
  </div>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<div class="card">
<div class="card-body">
<h5 class="card-title">Penerbangan Selanjutnya</h5>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nomor Penerbangan</th>
            <th>keberangkatan</th>
            <th>Tujuan</th>
            <th>Nama FOO</th>
            <th>Nama Pilot</th>
            <th>Registrasi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_penerbangan }}</td>
            <td>{{ $data->nomorpenerbangan }}</td>
            <td>{{ $data->keberangkatan }}</td>
            <td>{{ $data->tujuan }}</td>
            <td>{{ $data->nama_foo }}</td>
            <td>{{ $data->nama_pilot }}</td>
            <td>{{ $data->registrasi }}</td>
            <td>
                <a href="{{ route('penerbangan.edit', $data->id_penerbangan) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#hapusModal{{ $data->id_penerbangan }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_penerbangan }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('penerbangan.softDelete', $data->id_penerbangan) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
</div>
</div>

<div class="card">
<div class="card-body">
<h5 class="card-title">Penerbangan Selesai</h5>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nomor Penerbangan</th>
            <th>keberangkatan</th>
            <th>Tujuan</th>
            <th>Nama FOO</th>
            <th>Nama Pilot</th>
            <th>Registrasi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas2 as $data)
        <tr>
            <td>{{ $data->id_penerbangan }}</td>
            <td>{{ $data->nomorpenerbangan }}</td>
            <td>{{ $data->keberangkatan }}</td>
            <td>{{ $data->tujuan }}</td>
            <td>{{ $data->nama_foo }}</td>
            <td>{{ $data->nama_pilot }}</td>
            <td>{{ $data->registrasi }}</td>
            <td>
                {{-- <a href="{{ route('penerbangan.restore', $data->id_penerbangan) }}" type="button"
                    class="btn btn-warning rounded-3">Pulihkan</a> --}}
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal"
                    data-target="#restoreModal{{ $data->id_penerbangan }}">
                    Restore
                </button>

                <!-- Modal -->
                <div class="modal fade" id="restoreModal{{ $data->id_penerbangan }}" tabindex="-1"
                    aria-labelledby="restoreModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="restoreModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('penerbangan.restore', $data->id_penerbangan) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin memulihkan data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#hapusModal{{ $data->id_penerbangan }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_penerbangan }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('penerbangan.delete', $data->id_penerbangan) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
@stop