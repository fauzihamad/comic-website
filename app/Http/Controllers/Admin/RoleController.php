<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $data['role'] = Role::all();

        return view('Admin.Master.Role.index', $data);
    }

    public function simpan(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'guard' => 'required',
        ]);

        if($validated){
            $role = new Role();
            $role->name = $request->name;
            $role->guard_name = $request->guard;

            $role->save();

            if($role){
                return redirect()->route('admin.role');
            }
        }
    }
    public function update($id){

    }

    public function delete($id){

    }

}
