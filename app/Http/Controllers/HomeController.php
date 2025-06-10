<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $campaigns = Campaign::all(); // or paginate() if needed

        // $campaigns = Campaign::latest()->paginate(6); 
        // return view('home', compact('campaigns'));

        $search = $request->input('search');

        $campaigns = Campaign::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(6);

        return view('home', compact('campaigns', 'search'));
    }
}
