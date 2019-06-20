@extends('template')
@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">    
@endsection
@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Gudang') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('gudang.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_gudang" class="col-md-2 col-form-label text-md-right">{{ __('Nama Gudang') }}</label>
                            <div class="col-md-8">
                                <input id="nama_gudang" type="text" class="form-control{{ $errors->has('nama_gudang') ? ' is-invalid' : '' }}" name="nama_gudang" value="{{ old('nama_gudang') }}" required autofocus>
                                @if ($errors->has('nama_gudang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_gudang') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_gudang" class="col-md-2 col-form-label text-md-right">{{ __('Alamat Gudang') }}</label>
                            <div class="col-md-8">
                                <input id="alamat_gudang" type="text" class="form-control{{ $errors->has('alamat_gudang') ? ' is-invalid' : '' }}" name="alamat_gudang" value="{{ old('alamat_gudang') }}" required autofocus>
                                @if ($errors->has('alamat_gudang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alamat_gudang') }}</strong>
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
