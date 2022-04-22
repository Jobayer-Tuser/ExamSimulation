<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\Admin;
use App\Models\AdminType;

class AdminRepository implements AdminInterface
{

    public function getAllAdmin()
    {

        $data['admintypes'] = AdminType::alltype()->get();
        $data['admins'] =  Admin::with('adminType')->allAdmin()->get();
        return $data;
    }

    public function storeAdminData($request)
    {
        return Admin::create([
            'name'              => request('name'),
            'email'             => request('email'),
            'admin_type_id'     => request('admin_type_id'),
            'account_password'  => bcrypt(request('password')),
            'status'            => request('status'),
        ]);
    }

    public function updateAdminData($request, $admin) //: bool
    {
        // return $admin;
        $admin->name = request('name');
        $admin->email = request('email');
        $admin->admin_type_id = request('admin_type_id');
        $admin->status = request('status');
        return $admin->save();
    }

    public function deleteAdmin($admin) : bool
    {
        return $admin->delete();
    }

}
