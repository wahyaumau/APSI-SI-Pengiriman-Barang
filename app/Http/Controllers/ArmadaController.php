<?php

namespace App\Http\Controllers;

use App\Armada;
use App\JenisKendaraan;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listArmada = Armada::paginate(20);        
        return view('armada.index', compact('listArmada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listJenisKendaraaan = JenisKendaraan::all();
        return view('armada.create', compact('listJenisKendaraaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'plat_nomor' => 'required|max:255',
            'kode_jenis_kendaraan' => 'required|numeric',
        ));

        $armada = new Armada;        
        $armada->plat_nomor = $request->plat_nomor;
        $armada->kode_jenis_kendaraan = $request->kode_jenis_kendaraan;        
        $armada->save();        
        return redirect()->route('armada.index')->with('success', 'Armada berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function show(Armada $armada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function edit(Armada $armada)
    {
        //
        return view('armada.edit',compact('armada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Armada $armada)
    {
        //
        $this->validate($request, array(
             'plat_nomor' => 'required|max:255',
            'kode_jenis_kendaraan' => 'required|numeric'
        ));
        $armada->plat_nomor = $request->plat_nomor;  
        $armada->save();
        
        return redirect()->route('armada.index')->with('success','Armada berhasil di edit Boss!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Armada $armada)
    {
        $armada->delete();
        return redirect()->route('armada.index')->with('succes', 'armada berhasil dihapus');
    }
}
