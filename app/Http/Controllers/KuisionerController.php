<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pertanyaan;
use App\Models\Jawaban;

class KuisionerController extends Controller
{
    public function pertanyaan(){
        $pertanyaan = Pertanyaan::kondisi()
                                ->with('jawaban')
                                ->paginate(10);
        return $pertanyaan ;
    }

    public function jawaban(){
        $pertanyaan = Pertanyaan::kondisi()
                                ->get();
        $jawaban    = [];
        foreach ($pertanyaan as $index => $item) {
            $jawaban[$item->id]  = Jawaban::where('pertanyaan_id',$item->id)->get();
        }
        return $jawaban ;
    }

    public function index(){
        return view('kuisioner.index',compact('pertanyaan'));
    }

    public function store(){
        $jawaban = request()->input('jawaban');
        return $jawaban ;
        // return 'kuisioner store';
    }
}
