<!DOCTYPE html>
<html>
<head>
    <title>Tambah Parkir</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 400px;
            margin: 60px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        select, input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #219150;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
        }

        .back:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Tambah Data Parkir</h2>

{{-- ERROR VALIDASI --}}
@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form action="/parkir" method="POST">
@csrf

<label>Pengguna</label>
<select name="pengguna_id" required>
    <option value="">-- Pilih Pengguna --</option>
    @foreach($pengguna as $p)
        <option value="{{ $p->id }}">{{ $p->users }}</option>
    @endforeach
</select>

<label>Kendaraan</label>
<select name="kendaraan_id" required>
    <option value="">-- Pilih Kendaraan --</option>
    @foreach($kendaraan as $k)
        <option value="{{ $k->id }}">{{ $k->jenis }}</option>
    @endforeach
</select>

<label>Lokasi</label>
<input type="text" name="lokasi" placeholder="Contoh: Mall, Kampus" required>

<button type="submit">Simpan</button>

</form>

<a href="/parkir" class="back">← Kembali</a>

</div>

</body>
</html>