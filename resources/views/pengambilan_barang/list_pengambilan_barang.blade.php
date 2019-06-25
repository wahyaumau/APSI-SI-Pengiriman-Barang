@extends('template')

@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Pengambilan Barang</h3>            
        </div>        
        <div class="col-md-4">
            <a href="{{route('pengambilan.barang.create')}}"><button class="btn btn-success float-right">Tambah Pesanan</button></a>
        </div>
    </div>

    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>
                <tr>
                    <th>Nama Supplier</th>
                    <th>Nama Barang</th>                    
                    <th>Jumlah Barang</th>                    
                    <th>Tanggal Pemesanan</th>                
                    <th>Status</th>                                        
                    <th>Tanggal Pengambilan</th>
                </tr>                
            </thead>
            <tbody>
                @foreach($listPengambilan as $pengambilan)
                    <tr>
                        <td>{{ $pengambilan->barang->supplier->nama }}</td>
                        <td>{{ $pengambilan->barang->nama_barang }}</td>
                        <td>{{ $pengambilan->jumlah }}</td>
                        <td>{{ $pengambilan->tanggal_pemesanan }}</td>
                        <td>{{ $pengambilan->status }}</td>
                        <td>{{ $pengambilan->tanggal_pengambilan }}</td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>        
    </div>
</div>

@endsection
