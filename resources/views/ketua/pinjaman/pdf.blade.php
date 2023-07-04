<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pinjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Laporan Pinjaman</h4>
        </h5>
    </center>

    <table class="table table-hover table-bordered table-striped" id="simpananTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Anggota</th>
                <th>Jumlah Pinjaman</th>
                <th>Biaya Jasa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjaman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->created_at->format('d F Y') }}</td>
                <td>
                    @if ($item->anggota_poktan)
                        {{ $item->anggota_poktan->nama_anggota }}
                    @endif
                </td>
                <td>@currency($item->jumlah_pinjaman)</td>
                <td>{{ $item->biaya_jasa }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
