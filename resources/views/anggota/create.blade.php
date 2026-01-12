<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
</head>
<body>

<h2>Tambah Anggota</h2>

<form action="{{ route('anggota.store') }}" method="POST">
    @csrf
    <p>Nama: <input type="text" name="nama"></p>
    <p>NIM: <input type="text" name="nim"></p>
    <p>Jurusan: <input type="text" name="jurusan"></p>
    <p>Alamat: <input type="text" name="alamat"></p>
    <p>No HP: <input type="text" name="no_hp"></p>
    <button type="submit">Simpan</button>
</form>

<a href="{{ route('anggota.index') }}">Kembali</a>

</body>
</html>
