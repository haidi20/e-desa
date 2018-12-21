<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penduduk;
use App\Models\Mutasi;
use App\Models\Kematian;

use App\Supports\FileManager;

class MutasiController extends Controller
{
	public function __construct(
								Request $request, 
								Penduduk $penduduk,
								Mutasi $mutasi,
                                Kematian $kematian,
                                FileManager $filemanager
							)
	{
		$this->penduduk 	= $penduduk;
		$this->mutasi 		= $mutasi;
		$this->request 		= $request;
        $this->kematian     = $kematian;
        $this->filemanager  = $filemanager;
	}

    public function index()
    {
    	$mutasi = $this->mutasi->paginate(10);

    	return view('mutasi.index', compact('mutasi'));
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
        $carimutasi = $this->mutasi->find($id);

        if ($carimutasi) {
            session()->flashInput($carimutasi->toArray());
            $action = route('mutasi.update',$id);
            $method = 'PUT';

            $penduduk_id = $carimutasi->penduduk_id;
        }else{
            $action = route('mutasi.store');
            $method = 'POST';

            $penduduk_id = '';
        }

       	$kematian       = $this->kematian->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
        $pindah         = $this->mutasi->pindah()->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
        $penduduk       = $this->penduduk->tidakMuncul($kematian, $pindah)->get();
       	$status_mutasi	= config('library.status_mutasi');

        return view('mutasi.form',compact(
        	'action', 'method', 'penduduk', 'status_mutasi'
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
            $mutasi = $this->mutasi->find($id);
        }else{
            $mutasi = $this->mutasi;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $mutasi->penduduk_id	= request('penduduk_id');
        $mutasi->alamat_datang	= request('alamat_datang');
        $mutasi->alamat_pergi	= request('alamat_pergi');
        $mutasi->status_mutasi	= request('status_mutasi');
        $mutasi->alasan			= request('alasan');
        $mutasi->file         = $this->filemanager->uploadFile(request()->file('file'), $mutasi->file);
        $mutasi->save();

        return redirect()->route('mutasi.index');
    }

    public function destroy($id)
    {
    	$mutasi = $this->mutasi->find($id);
    	$mutasi->delete();

    	return redirect()->back();
    }
}
