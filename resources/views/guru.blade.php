<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <style>
        body  { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #4a90e2; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .succes { color: green; background: #e6ffe6; padding: 8px; border-radius: 4px; }
        .error  { color: red;   background: #ffe6e6; padding: 8px; border-radius: 4px; }
        a.btn   { padding: 6px 12px; background: #4a90e2; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Data Guru</h1>

    @if(session('succes'))
        <p class="succes">{{ session('succes') }}</p>
    @endif

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <a class="btn" href="{{ url('/guru/create') }}">+ Tambah Guru</a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($t_guru as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nip }}</td>
                    <td>{{ $row->nama_guru }}</td>
                    <td>{{ $row->jenis_kelamin }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>
                        <a href="{{ url('/guru/edit/' . $row->id) }}">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ url('/guru', $row->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                DELETE
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($t_guru->isEmpty())
                <tr>
                    <td colspan="7" align="center">Belum ada data guru</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>