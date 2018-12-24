<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penduduk;
use App\Models\Kematian;
use App\Models\Mutasi;
use App\Models\File;

use App\Supports\FileManager;

use WordTemplate;
use App;

class KematianController extends Controller
{
	public function __construct(
								Request $request, 
								Penduduk $penduduk,
								Kematian $kematian,
                                Mutasi $mutasi,
                                File $file,
                                FileManager $filemanager
							)
	{
		$this->penduduk   = $penduduk;
        $this->kematian   = $kematian;
		$this->mutasi 	  = $mutasi;
        $this->file = $file;
		$this->request 	  = $request;
        $this->filemanager= $filemanager;
	}

    public function index()
    {
    	$kematian  = $this->kematian;
        $file      = []; 

        foreach($kematian->get() as $index => $item){
            $file[$item->id] =  $this->file->kondisi($item->penduduk_id, 'kematian')->pluck('nama');
        }

        // return $file[7];

        $kematian = $kematian->paginate(10);

    	return view('kematian.index', compact('kematian', 'file'));
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
        $carikematian = $this->kematian->find($id);

        if ($carikematian) {
            session()->flashInput($carikematian->toArray());
            $action = route('kematian.update',$id);
            $method = 'PUT';

            $penduduk_id = $carikematian->penduduk_id;
        }else{
            $action = route('kematian.store');
            $method = 'POST';

            $penduduk_id = '';
        }

       	$kematian   = $this->kematian->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
        $pindah     = $this->mutasi->pindah()->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
        $penduduk   = $this->penduduk->tidakMuncul($kematian, $pindah)->get();
        $file       = $this->file->where(['penduduk_id' => $penduduk_id, 'fungsi' => 'kematian'])->get();

        return view('kematian.form',compact(
        	'action', 'method', 'penduduk', 'file'
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
            $kematian = $this->kematian->find($id);
        }else{
            $kematian = $this->kematian;
        }

        $input = $this->request->except('_token');
        // return $input;

        // upload file ke table file //
        $this->filemanager->uploadFile(
            request()->file('file'), 
            request('penduduk_id'), 
            'kematian'
        );
        
        $kematian->penduduk_id	= request('penduduk_id');
        $kematian->tempat		= request('tempat');
        $kematian->tanggal		= request('tanggal');
        $kematian->alasan		= request('alasan');
        $kematian->save();

        $penduduk = $this->penduduk->find(request('penduduk_id'));
        $penduduk->status_keadaan = 'kematian';
        $penduduk->save();

        return redirect()->route('kematian.index');
    }

    public function destroy($id)
    {
    	$kematian = $this->kematian->find($id);

        $penduduk = $this->penduduk->find($kematian->penduduk_id);
        $penduduk->status_keadaan = '';

        $penduduk->save();
        $kematian->delete();

    	return redirect()->back();
    }
}
