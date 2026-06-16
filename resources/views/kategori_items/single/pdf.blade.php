<!DOCTYPE html>
<html>
<head>
    <title>Print Kategori</title>
    <style>
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 12px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Kategori Item</div>

                <div class="card-body">
                    <table class="mb-4">
                        <tr>
                            <th>Kode</th>
                            <td>:</td>
                            <td>{{ $data->kode }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $data->nama }}</td>
                        </tr>
                    </table>

                    <h5>Daftar Master Items</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Harga Beli</th>
                                <th>Supplier</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data->masterItems as $item)
                            <tr>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>{{ $item->supplier }}</td>
                                <td>
                                    <a href="{{ url('master-items/view/' . $item->kode) }}" class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada item pada kategori ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <footer>
                        <p>Dicetak: {{ $printedAt->format('d-m-Y H:i:s') }}</p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
