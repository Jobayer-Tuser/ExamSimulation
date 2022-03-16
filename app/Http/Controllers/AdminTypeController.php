<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminType;
use Exception;
use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
    public function index()
    {
        $data['admin'] = AdminType::all();
        return view('admin.admintype.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin_type' => 'required|string',
        ]);

        try {
            AdminType::create([
                'type_name' => $request->admin_type,
            ]);
            return redirect(route('admintype.index'));
        } catch ( Exception $exception ) {
            return $exception->getMessage();
        }

    }

    public function update(Request $request, AdminType $admintype)
    {
        $validated = $request->validate([
            'admin_type' => 'required|string',
        ]);

        try {

            $admintype->type_name = $request->admin_type;
            $admintype->save();

            return redirect(route('admintype.index'));
        } catch ( Exception $exception ) {
            return $exception->getMessage();
        }

    }

    public function destroy(AdminType $admintype)
    {
        if ($admintype->delete()){
            return redirect(route('admintype.index'));
        }
    }
}
