<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $data['user'] = User::where('email','!=',Auth::user()->email);
        $data['role'] = Role::all();
        return view('Admin.Master.User.index', $data);
    }

    public function delete($id){
        $var = User::find($id);
        $var->delete();

        if($var){
            return redirect()->route('admin.users')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->route('admin.users')->with('failed','Data Gagal Dihapus');

        }
    }

    public function simpan(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validated){
            $user = new User();
            $user->name = $request->name;

            $user->save();

            if($user){
                return redirect()->route('admin.comic');
            }
        }
    }
}
