<?php

namespace App\Interfaces;

interface AdminInterface
{
    public function getAllAdmin();
    public function storeAdminData($request);
    public function updateAdminData($request, $admin);
}
