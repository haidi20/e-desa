<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penduduk;
use App\Models\Dusun;

class PendudukController extends Controller
{
	public function __construct(Request $request, Penduduk $penduduk, Dusun $dusun)
	{
		$this->penduduk = $penduduk;
		$this->dusun 	= $dusun;
		$this->request 	= $request;
	}

    public function index()
    {
    	$penduduk 	= $this->penduduk->paginate(10);

    	return view('penduduk.index', compact('penduduk'));
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
        $cariPenduduk = $this->penduduk->find($id);

        if ($cariPenduduk) {
            session()->flashInput($cariPenduduk->toArray());
            $action = route('penduduk.update',$id) ;
            $method = 'PUT';
        }else{
            $action = route('penduduk.store');
            $method = 'POST';
        }

       $jenis_kelamin 	= config('library.jenis_kelamin');
       $agama 			= config('library.agama');
       $status 			= config('library.status');
       $kewarganegaraan = config('library.kewarganegaraan');
       $dusun 			= $this->dusun->get();

        return view('penduduk.form',compact(
        	'action','method','penduduk', 'jenis_kelamin', 'agama', 
        	'status', 'kewarganegaraan', 'dusun'
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
            $penduduk = $this->penduduk->find($id);
        }else{
            $penduduk = $this->penduduk;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $penduduk->nik  			= request('nik');
        $penduduk->nama  			= request('nama');
        $penduduk->tempat_lahir  	= request('tempat_lahir');
        $penduduk->tanggal_lahir  	= request('tanggal_lahir');
        $penduduk->jenis_kelamin  	= request('jenis_kelamin');
        $penduduk->dusun_id  		= request('dusun_id');
        $penduduk->rt  				= request('rt');
        $penduduk->rw  				= request('rw');
        $penduduk->kelurahan  		= request('kelurahan');
        $penduduk->kecamatan  		= request('kecamatan');
        $penduduk->agama  			= request('agama');
        $penduduk->status  			= request('status');
        $penduduk->pekerjaan  		= request('pekerjaan');
        $penduduk->kewarganegaraan  = request('kewarganegaraan');
        $penduduk->kk_status  		= request('kk_status') ? 1 : 0;
        $penduduk->save();

        return redirect()->route('penduduk.index');
    }

    public function destroy($id)
    {
    	$penduduk = $this->penduduk->find($id);
    	$penduduk->delete();

    	return redirect()->back();
    }
}
