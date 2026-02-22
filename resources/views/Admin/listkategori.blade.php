@extends('admin.layout ')

@section('content')
<h1>Data Siswa</h1>
<table class="table table-striped table-bordered table-hover align-middle">
    <a href="{{ route('kategori.tambah') }}"
        class="btn btn-sm btn-primary">
        Tambah
    </a>
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Keterangan Kategori</th>
            <th>Asi</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $kat)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kat->ket_kategori }}</td>
            <td>
                <form action="{{ route('kategori.destroy', $kat->id_kategori) }}" method="post"
                    class="btn btn-sm btn-danger">
                    @csrf
                    @method('DELETE')
                   <button type="submit">Hapus</button> 
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection