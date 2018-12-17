<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penduduk;
use App\Models\Kematian;
use App\Models\Mutasi;

use App\Supports\FileManager;
use WordTemplate;

class KematianController extends Controller
{
	public function __construct(
								Request $request, 
								Penduduk $penduduk,
								Kematian $kematian,
                                Mutasi $mutasi,
                                FileManager $filemanager
							)
	{
		$this->penduduk   = $penduduk;
        $this->kematian   = $kematian;
		$this->mutasi 	  = $mutasi;
		$this->request 	  = $request;
        $this->filemanager= $filemanager;
	}

    public function index()
    {
    	$kematian = $this->kematian->paginate(10);

    	return view('kematian.index', compact('kematian'));
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
        }else{
            $action = route('kematian.store');
            $method = 'POST';
        }

       	$kematian       = $this->kematian->pluck('penduduk_id')->all();
        $pindah         = $this->mutasi->pindah()->pluck('penduduk_id')->all();
        $penduduk       = $this->penduduk->tidakMuncul($kematian, $pindah)->get();

        return view('kematian.form',compact(
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
            $kematian = $this->kematian->find($id);
        }else{
            $kematian = $this->kematian;
        }

        $input = $this->request->except('_token');
        // return $input;

        $kematian->file         = $this->filemanager->uploadFile(request()->file('file'), $kematian->file);
        $kematian->penduduk_id	= request('penduduk_id');
        $kematian->tempat		= request('tempat');
        $kematian->tanggal		= request('tanggal');
        $kematian->alasan		= request('alasan');

        $kematian->save();

        return redirect()->route('kematian.index');
    }

    public function destroy($id)
    {
    	$kematian = $this->kematian->find($id);
    	$kematian->delete();

    	return redirect()->back();
    }

    public function persetujuan($id)
    {
        $kematian = $this->kematian->find($id);
        $kematian->persetujuan = 1;
        $kematian->save();

        return redirect()->back();
    }

    public function file($id)
    {
        $file = public_path('storages/surat_pernyataan.rtf');
    
        $array = array(
            '[NOMOR_SURAT]' => '015/BT/SK/V/2017',
            '[PERUSAHAAN]' => 'CV. Borneo Teknomedia',
            '[NAMA]' => 'Haidi',
            '[NIP]' => '6472065508XXXXX',
            '[ALAMAT]' => 'Jl. Manunggal Gg. 8 Loa Bakung, Samarinda',
            '[PERMOHONAN]' => 'Permohonan pengurusan pembuatan NPWP',
            '[KOTA]' => 'Samarinda',
            '[DIRECTOR]' => 'Noviyanto Rahmadi',
            '[TANGGAL]' => date('d F Y'),
        );
        $nama_file = 'surat-keterangan-kerja.doc';

        return WordTemplate::export($file, $array, $nama_file);
    }
}
