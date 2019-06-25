<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Supir</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('supir.create')}}"><button class="btn btn-success float-right">Tambah Supir</button></a>
        </div>
    </div>
    @if (\Session::has('success'))
    <div class="row">
        <div class="alert alert-success col-md-12">
            <p>{{ \Session::get('success') }}</p>
        </div>
    </div>
    @elseif (\Session::has('fail'))
    <div class="row">
        <div class="alert alert-danger col-md-12">
            <p>{{ \Session::get('fail') }}</p>
        </div>
    </div>
    @endif

    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supir</th>
                    <th>Alamat Supir</th>
                    <th>SIM</th>                    
                    <th>Jenis Supir</th>                                        
                </tr>
            </thead>
            <tbody>
            @foreach($listSupir as $supir)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$supir->nama_supir}}</td>
                    <td>{{$supir->alamat_supir}}</td>
                    <td>{{$supir->sim}}</td>
                    <td>{{$supir->jenisSupir->nama_jenis_supir}}</td>                                        
                </tr>
            @endforeach                
            </tbody>
        </table>
    </div>
</div>
