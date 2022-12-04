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

        <h5 class="card-title fw-bolder mb-3">Ubah Data FOO</h5>

		<form method="post" action="{{ route('foo.update', $data->id_foo) }}">
			@csrf
            <div class="mb-3">
                <label for="id_foo" class="form-label">ID FOO</label>
                <input type="text" class="form-control" id="id_foo" name="id_foo" value="{{ $data->id_foo }}" readonly>
            </div>
			<div class="mb-3">
                <label for="nama" class="form-label">Nomor Penerbangan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop