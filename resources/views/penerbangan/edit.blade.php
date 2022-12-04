@extends('template')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Penerbangan</h5>

		<form method="post" action="{{ route('penerbangan.update', $data->id_penerbangan) }}">
			@csrf
            <div class="mb-3">
                <label for="id_penerbangan" class="form-label">ID Penerbangan</label>
                <input type="text" class="form-control" id="id_penerbangan" name="id_penerbangan" value="{{ $data->id_penerbangan }}" readonly>
            </div>
			<div class="mb-3">
                <label for="nomorpenerbangan" class="form-label">Nomor Penerbangan</label>
                <input type="text" class="form-control" id="nomorpenerbangan" name="nomorpenerbangan" value="{{ $data->nomorpenerbangan }}">
            </div>
            <div class="mb-3">
                <label for="keberangkatan" class="form-label">keberangkatan</label>
                <input type="text" class="form-control" id="keberangkatan" name="keberangkatan" value="{{ $data->keberangkatan }}">
            </div>
            <div class="mb-3">
                <label for="tujuan" class="form-label">tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $data->tujuan }}">
            </div>
            <div class="mb-3">
                <label for="id_pesawat" class="form-label">foo</label>
                <input type="text" class="form-control" id="id_foo" name="id_foo" value="{{ $data->id_foo }}">
            </div>
            <div class="mb-3">
                <label for="id_pilot" class="form-label">pilot</label>
                <input type="text" class="form-control" id="id_pilot" name="id_pilot" value="{{ $data->id_pilot }}">
            </div>
            <div class="mb-3">
                <label for="id_pesawat" class="form-label">pesawat</label>
                <input type="text" class="form-control" id="id_pesawat" name="id_pesawat" value="{{ $data->id_pesawat }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop