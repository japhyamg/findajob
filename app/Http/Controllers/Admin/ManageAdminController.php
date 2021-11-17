<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ManageAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        // dd($admins);
        return view('admin.manageadmin.index', compact('admins'));
    }
}
