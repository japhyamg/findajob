<?php

namespace App\Http\Controllers\Employers;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchResults = null;
        // dd(auth('employer')->user()->inbox);
        if($request->hasAny('search')){
            // $searchResults = (new Search())
            //     ->registerModel(User::class, 'firstname', 'lastname')
            //     ->search($request->search);
            $searchResults = Search::add(User::class, ['firstname', 'lastname', 'email'])
            ->beginWithWildcard()
            ->paginate(1)
            ->get($request->search);

            // dd($searchResults);
        }
        return view('employers.search.index', compact('searchResults'));
    }
}
