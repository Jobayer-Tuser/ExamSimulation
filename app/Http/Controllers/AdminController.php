<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminType;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

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
        $data['admintypes'] = AdminType::alltype()->get();
        // $data['admins'] = Admin::with(['admintype' => function($query){
        //                         $query->select('name');
        //                     }])->allAdmin()->get();
        $data['admins'] =  Admin::allAdmin()->get();
        // dd($data['admins']->toArray());
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
        if ( Admin::create($request->validated()) ) {
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
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
