@extends('template')

@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>List Pemesanan</h3>            
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
                    <th>Action</th>
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
                        <td>
                        @if($pengambilan->status == "Menunggu konfirmasi")
                        <a href="{{ route('pengambilan.barang.konfirmasi', $pengambilan) }}" class="btn btn-warning">Konfirmasi</a>

                        @else
                        
                        
                        @endif
                    </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>        
    </div>
</div>

@endsection
