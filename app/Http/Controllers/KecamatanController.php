<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function index(){
        return Kecamatan::all();
    }
}
