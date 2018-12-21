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

            $penduduk_id = $carikematian->penduduk_id;
        }else{
            $action = route('kematian.store');
            $method = 'POST';

            $penduduk_id = '';
        }

       	$kematian   = $this->kematian->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
        $pindah     = $this->mutasi->pindah()->kecualiPendudukid($penduduk_id)->pluck('penduduk_id');
        $penduduk   = $this->penduduk->tidakMuncul($kematian, $pindah)->get();

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

        // $i = 0;
        // while($i < count(request()->file('file'))){
        //     // $this->filemanager->uploadFile(request()->file('file')[$i], $kematian->file);
        //     request()->file('file')[$i]->move("storages/", 'coba'.$i);
        //     $i++;
        // }
        
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
