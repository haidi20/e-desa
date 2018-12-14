<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;

class SuratController extends Controller
{
	public function __construct(Request $request, Surat $surat)
	{
		$this->surat 	= $surat;
		$this->request 	= $request;
	}

    public function index()
    {
    	$surat = $this->surat->paginate(10);

    	return view('surat.index', compact('surat'));
    }

    public function create()
    {
    	return view('surat.form');
    }
}
