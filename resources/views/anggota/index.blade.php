<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
</head>
<body>

<h2>Data Anggota Perpustakaan</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('anggota.create') }}">+ Tambah Anggota</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>
    @foreach ($anggota as $no => $a)
    <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $a->nama }}</td>
        <td>{{ $a->nim }}</td>
        <td>{{ $a->jurusan }}</td>
        <td>
            <a href="{{ route('anggota.edit', $a->id) }}">Edit</a>
            <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus data?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
