@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Ubah Data Buku</h3>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oopss!</strong> Coba cek lagi inputan anda.<br>
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('buku.update' , $book->id) }}" method="post">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-12 mt-2">
                    <strong>Judul : </strong>
                    <input type="text" name="judul" class="form-control" value="{{ $book->judul }}">
                </div>
                <div class="col-md-12 mt-2">
                    <strong>Pengarang : </strong>
                    <input type="text" name="pengarang" class="form-control" value="{{ $book->pengarang }}">
                </div>
                <div class="col-md-12 mt-2">
                    <strong>Kategori : </strong>
                    <input type="text" name="kategori" class="form-control" value="{{ $book->kategori }}">
                </div>
                <div class="col-md-12 mt-2">
                    <strong>Tahun Terbit : </strong>
                    <input type="text" name="tahunTerbit" class="form-control" value="{{ $book->tahunTerbit }}">
                </div>
                <div class="col-md-12 mt-2">
                    <strong>Penerbit : </strong>
                    <input type="text" name="penerbit" class="form-control" value="{{ $book->penerbit }}">
                </div>

                <div class="col-md-12 mt-4">
                    <a href="{{ route('buku.index') }}" class="btn btn-sm btn-success">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                </div>
            </div>
        </form>

    </div>

@endsection