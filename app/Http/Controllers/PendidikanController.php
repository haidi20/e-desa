<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    public function index(){
      return Pendidikan::all();
    }
}
