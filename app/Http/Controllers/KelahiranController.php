<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelahiran;
use App\Models\Penduduk;
use App\Models\Kematian;
use App\Models\Mutasi;

use App\Supports\FileManager;

class KelahiranController extends Controller
{
	public function __construct(
								Request $request, 
								Penduduk $penduduk,
								Kelahiran $kelahiran,
                                FileManager $filemanager,
                                Kematian $kematian,
                                Mutasi $mutasi
							)
	{
		$this->penduduk 		= $penduduk;
		$this->kelahiran 		= $kelahiran;
		$this->request 			= $request;
        $this->mutasi           = $mutasi;
        $this->kematian         = $kematian;
        $this->filemanager      = $filemanager;
	}

    public function index()
    {
    	$kelahiran     = $this->kelahiran->paginate(10);

    	return view('kelahiran.index', compact('kelahiran'));
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
        $carikelahiran = $this->kelahiran->find($id);

        if ($carikelahiran) {
            session()->flashInput($carikelahiran->toArray());
            $action = route('kelahiran.update',$id);
            $method = 'PUT';

            $penduduk_id = $carikelahiran->penduduk_id;
        }else{
            $action = route('kelahiran.store');
            $method = 'POST';

            $penduduk_id = '';
        }

        $kematian       = $this->kematian->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
        $pindah         = $this->mutasi->pindah()->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
       	$penduduk 		= $this->penduduk->tidakMuncul($kematian, $pindah)->get();
       	$jenis_kelamin	= config('library.jenis_kelamin');

        return view('kelahiran.form',compact(
        	'action', 'method', 'penduduk', 'jenis_kelamin'
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
            $kelahiran = $this->kelahiran->find($id);
        }else{
            $kelahiran = $this->kelahiran;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $kelahiran->penduduk_id		= request('penduduk_id');
        $kelahiran->tempat			= request('tempat');
        $kelahiran->tanggal			= request('tanggal');
        $kelahiran->jenis_kelamin	= request('jenis_kelamin');
        $kelahiran->file         = $this->filemanager->uploadFile(request()->file('file'), $kelahiran->file);
        $kelahiran->save();

        return redirect()->route('kelahiran.index');
    }

    public function destroy($id)
    {
    	$kelahiran = $this->kelahiran->find($id);
    	$kelahiran->delete();

    	return redirect()->back();
    }
}
