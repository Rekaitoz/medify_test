@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form-group mb-2">
                <a href="{{url('kategori-items')}}" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
            </div>
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

                    <a class="btn btn-info" href="{{url('kategori-items/form/edit')}}/{{$data->id}}">Edit</a>
                    <a class="btn btn-danger" href="{{url('kategori-items/delete')}}/{{$data->id}}" onclick="return confirm('Are you sure you want to delete this kategori?');">Delete</a>
                    <a class="btn btn-primary" href="{{url('kategori-items/' . $data->kode . '/print')}}">Print</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection
