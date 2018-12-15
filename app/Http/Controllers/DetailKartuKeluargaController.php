<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Mutasi;
use App\Models\Kematian;
use App\Models\DetailKartuKeluarga;

class DetailKartuKeluargaController extends Controller
{
    public function __construct(
                                Request $request, 
                                DetailKartuKeluarga $detailkartukeluarga, 
                                KartuKeluarga $kartukeluarga, 
                                Mutasi $mutasi,
                                Kematian $kematian,
                                Penduduk $penduduk
                            )
	{
        $this->kartukeluarga        = $kartukeluarga;
		$this->penduduk 		    = $penduduk;
        $this->mutasi               = $mutasi;
        $this->kematian             = $kematian;
		$this->detailkartukeluarga 	= $detailkartukeluarga;
		$this->request 				= $request;

        $carikartukeluarga = $this->kartukeluarga->find(request('kk'));

        view()->share([
            'carikartukeluarga'     => $carikartukeluarga,
        ]);
	}

    public function index()
    {
    	$detailkartukeluarga = $this->detailkartukeluarga->where('kartukeluarga_id', request('kk'))->paginate(10);

        // return $kartukeluarga->toSql();

    	return view('detailkartukeluarga.index', compact('detailkartukeluarga'));
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
        $cariDetailKartuKeluarga = $this->detailkartukeluarga->find($id);

        if ($cariDetailKartuKeluarga) {
            session()->flashInput($cariDetailKartuKeluarga->toArray());
            $action = route('detailkartukeluarga.update',$id);
            $method = 'PUT';
        }else{
            $action = route('detailkartukeluarga.store');
            $method = 'POST';
        }

        $kematian   = $this->kematian->pluck('penduduk_id')->all();
        $pindah     = $this->mutasi->pindah()->pluck('penduduk_id')->all();
        $penduduk   = $this->penduduk->bukanKepalaKeluarga()->tidakMuncul($kematian, $pindah)->get();

        return view('detailkartukeluarga.form',compact(
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
            $detailkartukeluarga = $this->detailkartukeluarga->find($id);
        }else{
            $detailkartukeluarga = $this->detailkartukeluarga;
        }

        // $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $detailkartukeluarga->penduduk_id       = request('penduduk_id');
        $detailkartukeluarga->role              = request('role');
        $detailkartukeluarga->kartukeluarga_id  = request('kartukeluarga_id');
        $detailkartukeluarga->save();

        return redirect()->route('detailkartukeluarga.index', ['kk' => request('kartukeluarga_id')]);
    }

    public function destroy($id)
    {
        $detailkartukeluarga = $this->detailkartukeluarga->find($id);
        $detailkartukeluarga->delete();

        return redirect()->back()->with('kk', request('kk'));
    }

}
