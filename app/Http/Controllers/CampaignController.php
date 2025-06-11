<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'description' => 'required|string',
            'budget_per_influencer' => 'required|numeric|min:0',
            'total_influencers' => 'required|integer|min:1',
            'deadline' => 'required|date',
            'form_link' => 'required|string',
            'status' => 'required|in:active,draft',
            'tags' => 'nullable|string',
        ]);

        $campaign = new Campaign();
        $campaign->user_id = auth()->id(); // @intelephense-ignore-line
        $campaign->title = $validated['title'];
        $campaign->brand_name = $validated['brand_name'];
        $campaign->description = $validated['description'];
        $campaign->budget = $validated['budget_per_influencer'];
        $campaign->total_influencers_needed = $validated['total_influencers'];
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
}
