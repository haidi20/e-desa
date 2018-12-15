<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
	public function __construct(Request $request, User $user)
	{
		$this->user 	= $user;
		$this->request 	= $request;
	}

    public function index()
    {
    	$user 	= $this->user->paginate(10);

    	return view('user.index', compact('user'));
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
        $cariuser = $this->user->find($id);

        if ($cariuser) {
            session()->flashInput($cariuser->toArray());
            $action = route('user.update',$id) ;
            $method = 'PUT';
        }else{
            $action = route('user.store');
            $method = 'POST';
        }

        $role = config('library.role');

        return view('user.form',compact(
        	'action','method', 'role'
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
            $user = $this->user->find($id);
        }else{
            $user = $this->user;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $user->username  	= request('username');
        $user->role  		= request('role');
        $user->password  	= bcrypt(request('password'));
        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
    	$user = $this->user->find($id);
    	$user->delete();

    	return redirect()->back();
    }
}
