<!DOCTYPE html>
<html>
<head>
    <title>Data Parkir</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #3498db;
            padding: 8px 12px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #2c3e50;
            color: white;
        }

        button {
            background-color: red;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkred;
        }

        .container {
            width: 700px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        input, select {
            padding: 8px;
            width: 100%;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>

</head>
<body>

<div class="container">

<h1>Data Parkir</h1>

<a href="/parkir/create">+ Tambah Data</a>

<table>
<tr>
    <th>Pengguna</th>
    <th>Kendaraan</th>
    <th>Lokasi</th>
    <th>Aksi</th>
</tr>

@foreach($data as $p)
<tr>
    <td>{{ $p->pengguna->users }}</td>
    <td>{{ $p->kendaraan->jenis }}</td>
    <td>{{ $p->lokasi }}</td>
    <td>
        <a href="/parkir/{{ $p->id }}/edit">Edit</a>

        <form action="/parkir/{{ $p->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>

</div>

</body>
</html>