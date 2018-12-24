<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class SupportController extends Controller
{
    public function persetujuan($id, $table, $kondisi)
    {
        $table = App::make('App\Models\\'.$table)->find($id);
        $table->persetujuan = $kondisi == 'setuju' ? 1 : 2;
        $table->save();

        return redirect()->back();
    }

    public function file($id, $table)
    {
        echo $id . ' ' . $table;
    }

    public function unduhFile()
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
