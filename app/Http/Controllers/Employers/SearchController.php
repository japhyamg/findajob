<?php

namespace App\Http\Controllers\Employers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchResults = null;
        if($request->hasAny('search')){
            $searchResults = (new Search())
                ->registerModel(User::class, 'firstname', 'lastname')
                ->search($request->search);

            // dd($searchResults);
        }
        return view('employers.search.index', compact('searchResults'));
    }
}
