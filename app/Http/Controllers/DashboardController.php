<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Kematian;
use App\Models\Kelahiran;
use App\Models\Mutasi;
use App\Models\Dusun;
use App\Models\Surat;

class DashboardController extends Controller
{
    public function __construct(
								Request $request, 
								KartuKeluarga $kartukeluarga, 
                                Penduduk $penduduk,
                                Surat $surat,
                                Dusun $dusun,
                                Kematian $kematian,
                                Kelahiran $kelahiran,
								Mutasi $mutasi
							)
	{
		$this->kartukeluarga 	= $kartukeluarga;
        $this->mutasi           = $mutasi;
        $this->kelahiran        = $kelahiran;
        $this->kematian         = $kematian;
		$this->surat 			= $surat;
		$this->dusun 			= $dusun;
		$this->penduduk 		= $penduduk;
		$this->request 			= $request;
	}

    public function index()
    {
    	$kepalakeluarga = $this->kartukeluarga->count();
    	$kematian 		= $this->kematian->count();
    	$kelahiran 		= $this->kelahiran->count();
    	$dusun 			= $this->dusun->count();
    	$surat 			= $this->surat->count();
    	$datang 		= $this->mutasi->datang()->count();
    	$pindah 		= $this->mutasi->pindah()->count();
    	$penduduk 		= $this->penduduk->count();

    	$total_penduduk = $penduduk - ($kematian + $pindah) + ($datang + $kelahiran);

    	return view('dashboard', compact(
    		'kepalakeluarga', 'kematian', 'kelahiran','dusun',
    		'surat','datang', 'pindah', 'total_penduduk'
    	));
    }
}
