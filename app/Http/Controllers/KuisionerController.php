<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pertanyaan;
use App\Models\Jawaban;

class KuisionerController extends Controller
{
    public function index(){
        return view('kuisioner.index',compact('pertanyaan'));
    }

    public function pertanyaan(){
        $pertanyaan = Pertanyaan::kondisi()
                                ->with('jawaban')
                                ->paginate(10);

        return $pertanyaan ;
    }

    public function jawaban(){
        $jawaban = pertanyaan::kondisiJawaban()
                             ->get();
        return $jawaban;
    }

    public function store(){
        $nampung = [];
        $jawaban = request()->input('jawaban');

        foreach ($jawaban as $index => $item) {
            // $nampung[$index] = 'isi = '.$item['isi']. ' pertanyaan = '. $item['pertanyaan'];
            $pertanyaan_id                  = $item['pertanyaan'];
            $sekolah_id                     = $item['sekolah'];
            $isi                            = $item['isi'];
            $inputJawaban                   = Jawaban::updateOrCreate(compact('sekolah_id', 'pertanyaan_id'));
            $inputJawaban->isi              = $item['isi'];
            $inputJawaban->save();
        }
        // return $nampung;
    }
}
