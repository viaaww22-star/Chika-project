<!DOCTYPE html>
<html>
<head>
    <title>Edit Parkir</title>

    <style>
        body { font-family: Arial; background:#f4f6f9; }

        .container {
            width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
        }

        button {
            background: orange;
            color: white;
            padding: 10px;
            border: none;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Edit Data Parkir</h2>

<form action="/parkir/{{ $parkir->id }}" method="POST">
@csrf
@method('PUT')

<label>Pengguna</label>
<select name="pengguna_id">
@foreach($pengguna as $p)
<option value="{{ $p->id }}" {{ $p->id == $parkir->pengguna_id ? 'selected' : '' }}>
    {{ $p->users }}
</option>
@endforeach
</select>

<label>Kendaraan</label>
<select name="kendaraan_id">
@foreach($kendaraan as $k)
<option value="{{ $k->id }}" {{ $k->id == $parkir->kendaraan_id ? 'selected' : '' }}>
    {{ $k->jenis }}
</option>
@endforeach
</select>

<label>Lokasi</label>
<input type="text" name="lokasi" value="{{ $parkir->lokasi }}">

<button type="submit">Update</button>

</form>

</div>

</body>
</html>