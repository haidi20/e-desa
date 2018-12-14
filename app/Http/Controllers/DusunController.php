<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dusun;

class DusunController extends Controller
{
	public function __construct(Request $request, Dusun $dusun)
	{
		$this->dusun 	= $dusun;
		$this->request 	= $request;
	}

    public function index()
    {
    	$dusun = $this->dusun->paginate(10);

    	return view('dusun.index', compact('dusun'));
    }

    public function create()
    {
    	return $this->form();
    }

    public function edit($id)
    {
    	return $this->form();
    }

    public function form($id = null){
        $cariDusun = $this->dusun->find($id);

        if ($cariDusun) {
            session()->flashInput($cariDusun->toArray());
            $action = route('dusun.update',$id) ;
            $method = 'PUT';
        }else{
            $action = route('dusun.store');
            $method = 'POST';
        }

        return view('dusun.form',compact(
        	'action','method'
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
            $dusun = $this->dusun->find($id);
        }else{
            $dusun = $this->dusun;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);
        
        $dusun->nama  	= request('nama');
        $dusun->alamat  = request('alamat');
        $dusun->save();

        return redirect()->route('dusun.index');
    }

    public function destroy($id)
    {
    	$dusun = $this->dusun->find($id);
    	$dusun->delete();

    	return redirect()->back();
    }
}
