<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Supports\Topsis;

class PeringkatController extends Controller
{
    public function __construct(Topsis $topsis){
      $this->topsis = $topsis;
    }

    public function index(){
      return $this->topsis->peringkatProses();
    }
}
