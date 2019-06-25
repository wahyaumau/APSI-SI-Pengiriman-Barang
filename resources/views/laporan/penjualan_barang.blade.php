@extends('template')


@section('content')
<div class="container-fluid m-0 p-4">    
    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah Barang Terjual</th>                    
                    <th>Hasil Penjualan</th>                                        
                </tr>
            </thead>
            <tbody>
            @foreach($penjualan_barang as $penjualan)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$penjualan->nama_barang}}</td>                    
                    <td>{{$penjualan->total_penjualan}}</td>                    
                    <td>{{$penjualan->harga_barang * $penjualan->total_penjualan}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="app">
            {!! $chart->container() !!}
        </div>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart->script() !!}
</div>
@endsection
