@extends('template')
@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">    
@endsection
@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Supir') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('supir.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_supir" class="col-md-2 col-form-label text-md-right">{{ __('Nama Supir') }}</label>
                            <div class="col-md-8">
                                <input id="nama_supir" type="text" class="form-control{{ $errors->has('nama_supir') ? ' is-invalid' : '' }}" name="nama_supir" value="{{ old('nama_supir') }}" required autofocus>
                                @if ($errors->has('nama_supir'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_supir') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_supir" class="col-md-2 col-form-label text-md-right">{{ __('Alamat Supir') }}</label>
                            <div class="col-md-8">
                                <input id="alamat_supir" type="text" class="form-control{{ $errors->has('alamat_supir') ? ' is-invalid' : '' }}" name="alamat_supir" value="{{ old('alamat_supir') }}" required autofocus>
                                @if ($errors->has('alamat_supir'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alamat_supir') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sim" class="col-md-2 col-form-label text-md-right">{{ __('SIM') }}</label>
                            <div class="col-md-8">
                                <input id="sim" type="text" class="form-control{{ $errors->has('sim') ? ' is-invalid' : '' }}" name="sim" value="{{ old('sim') }}" required autofocus>
                                @if ($errors->has('sim'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sim') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                                                
                        <div class="form-group row">
                            <label for="kode_jenis_supir" class="col-md-2 col-form-label text-md-right">{{ __('Jenis Supir') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2-single" name="kode_jenis_supir">
                                    @foreach($listJenisSupir as $jenisSupir)
                                    <option value="{{$jenisSupir->kode_jenis_supir}}">{{$jenisSupir->nama_jenis_supir}}</option>
                                    @endforeach
                                </select>
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
            $('.select2-single').select2();            
        });
    </script>    
@endsection
