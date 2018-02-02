<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Supports\IndikatorPencapaian;

class DashboardController extends Controller
{
    function __construct(IndikatorPencapaian $ip){
      $this->ip = $ip;
    }

    public function index(){
      // return response()->json($this->ip->limaBelas()) ;
      return view('dashboard.index');
    }
}
