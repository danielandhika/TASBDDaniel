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

        <h5 class="card-title fw-bolder mb-3">Tambah Data Penerbangan</h5>

        <form method="post" action="{{ route('penerbangan.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_penerbangan" class="form-label">ID Penerbangan</label>
                <input type="text" class="form-control" id="id_penerbangan" name="id_penerbangan">
            </div>
            <div class="mb-3">
                <label for="nomorpenerbangan" class="form-label">Nomor Penerbangan</label>
                <input type="text" class="form-control" id="nomorpenerbangan" name="nomorpenerbangan">
            </div>
            <div class="mb-3">
                <label for="keberangkatan" class="form-label">Keberangkatan</label>
                <input type="text" class="form-control" id="keberangkatan" name="keberangkatan">
            </div>
            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan">
            </div>
            <div class="mb-3">
                <label for="id_foo" class="form-label">FOO</label>
                 <select class="form-control m-bot15" name="id_foo">
                    @if(count($foos) > 0)
                    @foreach($foos as $foo)
                    <option value="{{$foo->id_foo}}">{{$foo->nama}}</option>
                    @endForeach
                    @else
                    No Record Found
                    @endif   
                </select>
            </div>
            <div class="mb-3">
                <label for="id_pilot" class="form-label">Pilot</label>
                <select class="form-control m-bot15" name="id_pilot">
                    @if(count($pilots) > 0)
                    @foreach($pilots as $pilot)
                    <option value="{{$pilot->id_pilot}}">{{$pilot->nama}} - {{$pilot->lisensi}}</option>
                    @endForeach
                    @else
                    No Record Found
                    @endif   
                </select>
            </div>
            <div class="mb-3">
                <label for="id_pesawat" class="form-label">Pesawat</label>
                <select class="form-control m-bot15" name="id_pesawat">
                    @if(count($pesawats) > 0)
                    @foreach($pesawats as $pesawat)
                    <option value="{{$pesawat->id_pesawat}}">{{$pesawat->registrasi}} - {{$pesawat->tipe}}</option>
                    @endForeach
                    @else
                    No Record Found
                    @endif   
                </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop