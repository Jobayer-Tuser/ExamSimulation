<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AdminRepository;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;

class AdminController extends Controller
{
    protected $adminRepo;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepo = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->adminRepo->getAllAdmin();
        return view('admin.admins.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreAdminRequest $request)
    {
        // return $request;
        $admin = $this->adminRepo->storeAdminData($request);

        if ( $admin > 0 ) {
            notify()->success('Admin created successfully!');
            return redirect(route('admin.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('admin.index'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Admin $admin)
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin = $this->adminRepo->updateAdminData($request, $admin);
        if ( $admin > 0 ) {
            notify()->success('Admin updated successfully!');
            return redirect(route('admin.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('admin.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin = $this->adminRepo->deleteAdmin($admin);
        if ( $admin > 0 ) {
            notify()->success('Admin deleted successfully!');
            return redirect(route('admin.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('admin.index'));
        }
    }
}
