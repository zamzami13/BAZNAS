<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muser;

class MuserController extends Controller
{
    public function index(Request $request)
    {
    	// $daftbank = \App\Daftbank::all();
    	// return view('daftbank.index',['daftbank' -> $daftbank]);
        if ($request->has('cari')) {
            $musers = \App\users::where('name','LIKE','%'.$request->cari.'%')->get();
        } else {
    	   $muser=Muser::all();
        }
        return view('muser/index',compact('muser'));
    }

    public function create(Request $request)
    {
    	// \App\Muser::create($request->all());
    	$user = new \App\User;
 		$user->role = $request->role;
 		$user->name = $request->name;
 		$user->email = $request->email;
 		$user->password = bcrypt($request->password);
 		$user->remember_token = str_random(60);
 		$user->save();
    	return redirect('/muser')->with('sukses','Data berhasil ditambah');
    }

    public function edit($id)
    {
    	$muser = \App\Muser::find($id);
    	return view('muser/edit',compact('muser'));
    }

    public function update(Request $request,$id)
    {
    	$muser = \App\Muser::find($id);
    	$muser -> update($request->all());
    	return redirect('/muser')->with('sukses','Data berhasil diubah');
    	// return view('daftbank/edit',compact('daftbank'));
    }

    public function delete($id)
    {
        $muser = \App\Muser::find($id);
        $muser->delete($muser); 
        // return redirect('/muser');
        return redirect('/muser')->with('sukses','Data berhasil dihapus');
    }

    public function deleteChild($id)
    {
        $muser = \App\Muser::find($id);
        $muser->delete($muser); 
        // return redirect('/muser');
        echo json_encode(array("status" => true));
    }

}
