<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penduduk;
use App\Models\Kematian;

class KematianController extends Controller
{
	public function __construct(
								Request $request, 
								Penduduk $penduduk,
								Kematian $kematian
							)
	{
		$this->penduduk 		= $penduduk;
		$this->kematian 		= $kematian;
		$this->request 			= $request;
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
        }else{
            $action = route('kematian.store');
            $method = 'POST';
        }

       	$penduduk = $this->penduduk->get();

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

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $kematian->penduduk_id	= request('penduduk_id');
        $kematian->tempat		= request('tempat');
        $kematian->tanggal		= request('tanggal');
        $kematian->alasan		= request('alasan');
        $kematian->save();

        return redirect()->route('kematian.index');
    }

    public function destroy($id)
    {
    	$kematian = $this->kematian->find($id);
    	$kematian->delete();

    	return redirect()->back();
    }
}
