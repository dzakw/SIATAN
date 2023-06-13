<table class="table table-hover" id="simpananTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Anggota</th>
            <th>Jumlah Pinjaman</th>
            <th>Jangka Waktu</th>
            <th>Biaya Jasa</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pinjaman as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->created_at->format('d F Y') }}</td>
            <td>{{ $item->anggota->nama_anggota }}</td>
            <td>@currency($item->jumlah_pinjaman)</td>
            <td>{{ $item->invoice->tagihan }}</td>
            <td>{{ $item->biaya_jasa }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
