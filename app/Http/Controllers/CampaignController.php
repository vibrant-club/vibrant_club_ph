<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CampaignController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'description' => 'required|string',
            'budget_per_influencer' => 'nullable|numeric|min:0',
            'total_influencers' => 'nullable|integer|min:1',
            'deadline' => 'required|date',
            'form_link' => 'required|string',
            'status' => 'required|in:active,draft',
            'tags' => 'nullable|string',
        ]);

        $campaign = new Campaign();
        $campaign->user_id = Auth::id(); // Filter by the logged-in user's ID
        $campaign->title = $validated['title'];
        $campaign->brand_name = $validated['brand_name'];
        $campaign->description = $validated['description'];
        $campaign->budget = $validated['budget_per_influencer'] ?? null;
        $campaign->total_influencers_needed = $validated['total_influencers'] ?? null;
        $campaign->deadline = $validated['deadline'];
        $campaign->form_link = $validated['form_link'];
        $campaign->status = $validated['status'];
        $campaign->tags = json_encode(explode(',', $validated['tags'] ?? ''));

        $campaign->save();

        return redirect()->route('home')->with('success', 'Campaign created successfully!');
    }


    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);

        $campaign->delete();

        return redirect()->back()->with('success', 'Campaign deleted successfully.');
    }


    public function showPendingApproval(Request $request)
    {
        $filter = $request->input('filter', 'pending'); // default to 'pending'

        $query = Campaign::query()
            ->whereDate('deadline', '>=', Carbon::today())
            ->latest();

        if ($filter === 'declined') {
            $query->where('is_approved', 2);
        } else {
            // Treat 'pending' as is_approved = 0
            $query->where('is_approved', 0);
        }

        $campaigns = $query->paginate(6);

        return view('approve_campaigns', compact('campaigns', 'filter'));
    }


    public function showMyPendingCampaigns(Request $request)
    {
        $filter = $request->input('filter', 'pending'); // default to 'pending'

        $query = Campaign::query()
            ->where('user_id', Auth::id()) // Filter by the logged-in user's ID
            ->whereDate('deadline', '>=', Carbon::today())
            ->latest();

        if ($filter === 'declined') {
            $query->where('is_approved', 2);
        } elseif ($filter === 'approved') {
            $query->where('is_approved', 1);
        } else {
            // Treat 'pending' as is_approved = 0
            $query->where('is_approved', 0);
        }

        $campaigns = $query->paginate(6);

        return view('my_pending_campaigns', compact('campaigns', 'filter'));
    }





    public function approve($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->is_approved = 1;
        $campaign->save();

        return redirect()->back()->with('success', 'Campaign approved successfully.');
    }

    public function decline($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->is_approved = 2;
        $campaign->save();

        return redirect()->back()->with('success', 'Campaign declined.');
    }
}
