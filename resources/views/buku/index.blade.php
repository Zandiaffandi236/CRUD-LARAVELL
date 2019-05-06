@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Daftar Buku</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('buku.create') }}">Tambah Data Buku</a>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>

        @endif

        <table class="table table-hover table-md">
            <tr>
                <th width="50px"><b>No.</b></th>
                <th width="150px"><b>Judul</b></th>
                <th width="150px"><b>Pengrang</b></th>
                <th width="150px"><b>Kategori</b></th>
                <th width="150px"><b>Tahun Terbit</b></th>
                <th width="150px"><b>Penerbit</b></th>
                <th width="150px"><b>Action</b></th>
            </tr>

            @foreach ($book as $buku)
                <tr>
                    <td><b>{{ ++$i }}</b></td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->kategori }}</td>
                    <td>{{ $buku->tahunTerbit }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            <a class="btn btn-sm btn-primary" href="{{ route('buku.edit' , $buku->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    {!! $book->links() !!}
    </div>

@endsection