<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Kematian;
use App\Models\Mutasi;

class KartuKeluargaController extends Controller
{
	public function __construct(
								Request $request, 
								KartuKeluarga $kartukeluarga, 
                                Penduduk $penduduk,
                                Kematian $kematian,
								Mutasi $mutasi
							)
	{
		$this->kartukeluarga 	= $kartukeluarga;
        $this->mutasi           = $mutasi;
        $this->kematian         = $kematian;
		$this->penduduk 		= $penduduk;
		$this->request 			= $request;
	}

    public function index()
    {
    	$kartukeluarga = $this->kartukeluarga->paginate(10);

    	return view('kartukeluarga.index', compact('kartukeluarga'));
    }

    public function create()
    {
    	return $this->form();
    }

    public function edit($id)
    {
    	return $this->form($id);
    }

    public function form($id = null){
        $cariKartuKeluarga = $this->kartukeluarga->find($id);

        if ($cariKartuKeluarga) {
            session()->flashInput($cariKartuKeluarga->toArray());
            $action = route('kartukeluarga.update',$id);
            $method = 'PUT';
        }else{
            $action = route('kartukeluarga.store');
            $method = 'POST';
        }

        $kematian   = $this->kematian->pluck('penduduk_id')->all();
        $pindah     = $this->mutasi->pindah()->pluck('penduduk_id')->all();
        $kk         = $this->kartukeluarga->pluck('penduduk_id')->all();
        $penduduk   = $this->penduduk->kepalaKeluarga()->tidakMuncul($kematian, $pindah, $kk)->get();

        return view('kartukeluarga.form',compact(
        	'action', 'method', 'penduduk'
        ));
    }

    public function store(){
        return $this->save();
    }

    public function update($id){
        return $this->save($id);
    }

    public function save($id = null){
        if ($id) {
            $kartukeluarga = $this->kartukeluarga->find($id);
        }else{
            $kartukeluarga = $this->kartukeluarga;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $kartukeluarga->nomor  		= request('nomor');
        $kartukeluarga->penduduk_id	= request('penduduk_id');
        $kartukeluarga->save();

        return redirect()->route('kartukeluarga.index');
    }

    public function destroy($id)
    {
    	$kartukeluarga = $this->kartukeluarga->find($id);
    	$kartukeluarga->delete();

    	return redirect()->back();
    }
}
