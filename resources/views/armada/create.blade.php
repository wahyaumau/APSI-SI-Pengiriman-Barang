@extends('template')
@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">    
@endsection
@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Armada') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('armada.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="plat_nomor" class="col-md-2 col-form-label text-md-right">{{ __('Plat Nomor') }}</label>
                            <div class="col-md-8">
                                <input id="plat_nomor" type="text" class="form-control{{ $errors->has('plat_nomor') ? ' is-invalid' : '' }}" name="plat_nomor" value="{{ old('plat_nomor') }}" required autofocus>
                                @if ($errors->has('plat_nomor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('plat_nomor') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label for="kode_jenis_kendaraan" class="col-md-2 col-form-label text-md-right">{{ __('Jenis Kendaraan') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2-single" name="kode_jenis_kendaraan">
                                    @foreach($listJenisKendaraaan as $jenisKendaraan)
                                    <option value="{{$jenisKendaraan->kode_jenis_kendaraan}}">{{$jenisKendaraan->nama_jenis}}</option>
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
            $('.select2-multi').select2();
            $('.select2-single').select2();        
        });            
    </script>    
@endsection
