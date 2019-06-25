@extends('template')

@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Invoice Pemesanan Barang</h3>            
            <p>Kode Transaksi : {{ $penjualan->kode_penjualan }}</p>
            <p>Nama Pelanggan : {{ $penjualan->pelanggan->nama }}</p>
            <p>Alamat Pelanggan : {{ $penjualan->pelanggan->alamat }}</p>
        </div>        
    </div>

    <h4>List Barang</h4>

    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>                
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>                    
                    <th>Harga Barang</th>                    
                    <th>Total Harga Barang</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalBayar=0;
                @endphp
                @foreach($penjualan->barang as $barang)
                @php
                    $totalBayar += $barang->pivot->harga_barang * $barang->pivot->jumlah_barang
                @endphp
                <tr>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->pivot->jumlah_barang }}</td>
                    <td>{{ $barang->pivot->harga_barang }}</td>
                    <td>{{ $barang->pivot->harga_barang * $barang->pivot->jumlah_barang }}</td>
                </tr>
                
                @endforeach

                <tr>
                <td colspan=3>Total bayar</td>
                <td >{{ $totalBayar }}</td>
            </tr>
            </tbody>
        </table>        
    </div>
</div>

@endsection
