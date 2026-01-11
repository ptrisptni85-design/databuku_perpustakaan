<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
</head>
<body>

<h2>Edit Anggota</h2>

<form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nama: <input type="text" name="nama" value="{{ $anggota->nama }}"></p>
    <p>NIM: <input type="text" name="nim" value="{{ $anggota->nim }}"></p>
    <p>Jurusan: <input type="text" name="jurusan" value="{{ $anggota->jurusan }}"></p>
    <p>Alamat: <input type="text" name="alamat" value="{{ $anggota->alamat }}"></p>
    <p>No HP: <input type="text" name="no_hp" value="{{ $anggota->no_hp }}"></p>
    <button type="submit">Update</button>
</form>

<a href="{{ route('anggota.index') }}">Kembali</a>

</body>
</html>
