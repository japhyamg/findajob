<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;

class ManageEmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::all();
        // dd($employers);
        return view('admin.manageemployer.index', compact('employers'));
    }
}
