<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Roles;

class UserRoles extends Controller
{
    public function getAllRoles(){
        
        $this->middleware('auth');

        $roles = Roles::all();

        return $roles;
    }

    public function viewRoles(){
        $roles = $this->getAllRoles();
        return view('user-roles', ['viewRoles' => $roles]);
    }

    public function addRoles(Request $request){
        $validateInput = $request->validate([
            'displayName' => 'required|string|regex:/^[a-zA-Z0-9\s\-\.\,\']+$/u',
            'description' => 'required|string|regex:/^[a-zA-Z0-9\s\-\.\,\']+$/u'
        ]);

        $roles = new Roles;

        $roles->display_name = $validateInput['displayName'];
        $roles->description = $validateInput['description'];
        $roles->created_at = now()->format('Y-m-d');
        $roles->save();

        return redirect()->route('viewRoles')->with('msg', 'Added new role');
    }

    public function updateDeleteRole(Request $req){
        $action = $req->input('action');
        if ($action === 'Delete') {
            $this->deleteRole($req);
            return redirect()->route('viewRoles')->with('msg', $this->deleteRole($req));
        } elseif ($action === 'Update') {
            $this->updateRole($req);
            return redirect()->route('viewRoles')->with('msg', $this->updateRole($req));
        }
    }

    public function deleteRole(Request $req){
    $id = $req->input('id');
    $role = Roles::find($id);

        if ($role) {
            $role->delete();
        }
        return 'Role deleted successfully.';
    }

    public function updateRole(Request $req){
        $validateInput = $req->validate([
            'displayName' => 'required|string|regex:/^[a-zA-Z0-9\s\-\.\,\']+$/u',
            'description' => 'required|string|regex:/^[a-zA-Z0-9\s\-\.\,\']+$/u'
        ]);

        $id = $req->input('id');
        $displayName = $validateInput['displayName'];
        $description = $validateInput['description'];

        $role = Roles::find($id);

        if ($role) {
            $role->display_name = $displayName;
            $role->description = $description;
            $role->save();

            return 'Role updated successfully.';
        }

        // Handle if the role is not found
        return 'Role update failed.';
    }

}
