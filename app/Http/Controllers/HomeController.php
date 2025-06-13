<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $search = $request->input('search');

        $campaigns = Campaign::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('tags', 'like', '%"' . $search . '"%');
            });
        })
            ->whereDate('deadline', '>=', Carbon::today()) // Only show future or today
            ->where('is_approved', 1)                      // ✅ Only show approved campaigns
            ->latest()
            ->paginate(6);

        return view('home', compact('campaigns', 'search'));
    }
}
