<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminType;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTypeController extends Controller
{
    public function index()
    {
        $data['admin'] = AdminType::all();
        return view('admin.admintype.index', $data);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
        ]);

        try {
            AdminType::create($validateData);
            notify()->success('Admin type created successfully!');
            return redirect(route('admintype.index'));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Request $request, AdminType $admintype)
    {
        $validateData = $request->validate([ 'name' => 'required|string|between:3,50' ]);

        try {

            $admintype->name        = $validateData;
            $admintype->updated_at  = now()->toDateTimeString();
            $admintype->save();

            notify()->success('Admin type updated successfully!');
            return redirect(route('admintype.index'));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function destroy(AdminType $admintype)
    {
        if ($admintype->delete()) {
            notify()->success('Admin type deleted successfully!');
            return redirect(route('admintype.index'));
        }
    }
}
