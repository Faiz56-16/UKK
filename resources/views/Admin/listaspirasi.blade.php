@extends('admin.layout ')

@section('content')
<h1>Data Siswa</h1>
<form action="{{ url('users') }}" method="GET">
    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="">--All--</option>
        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="editor" {{ request('role') == 'editor' ? 'selected' : '' }}>Editor</option>
        <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
    </select>

    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="">--All--</option>
        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>

    <button type="submit">Filter</button>
    <a href="{{ url('users') }}"><button type="button">Reset</button></a>
</form>

<table class="table table-striped table-bordered table-hover align-middle">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aspirasi as $asp)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $asp->keterangan }}</td>
            <td>{{ $asp->kategori->ket_kategori }}</td>
            <td>{{ $asp->umpanbalik->status ?? 'Belum diproses' }}</td>
            <td>{{ $asp->lokasi }}</td>
            <td>{{ $asp->created_at->format('Y-m-d') }}</td>
            <td>


                <a href="{{ route('aspirasi.feedback', $asp->id_pelaporan) }}"
                    class="btn btn-sm btn-primary">
                    Umpan Balik
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>


@endsection