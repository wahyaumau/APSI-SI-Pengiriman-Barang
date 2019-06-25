@extends('template')
@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">    
@endsection
@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pengambilan Barang Ke Supplier') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pengambilan.barang.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="kode_barang" class="col-md-2 col-form-label text-md-right">{{ __('Nama Barang') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2-single" name="kode_barang">
                                    @foreach($listBarang as $barang)
                                    <option value="{{$barang->kode_barang}}">{{$barang->nama_barang}} per {{ $barang->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label for="jumlah_barang" class="col-md-2 col-form-label text-md-right">{{ __('Jumlah Barang') }}</label>
                            <div class="col-md-6">
                                <input id="jumlah_barang" type="text" class="form-control{{ $errors->has('jumlah_barang') ? ' is-invalid' : '' }}" name="jumlah_barang" value="{{ old('jumlah_barang') }}" required autofocus>
                                @if ($errors->has('jumlah_barang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jumlah_barang') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2-multi').select2();  
        });
    </script>    
@endsection
