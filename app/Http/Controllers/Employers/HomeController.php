<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index()
    {
        return view('employers.index');
    }



}
