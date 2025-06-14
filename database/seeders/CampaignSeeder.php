<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('campaigns_tbl')->insert([
            [
                'title' => '✨ Fresh Finds x Vibrant Club Launch Campaign',
                'user_id' => '1',
                'description' => 'We’re looking for trendy lifestyle influencers to promote our summer essentials kit on Instagram Stories and Reels.',
                'brand_name' => 'Fresh Finds PH',
                'budget' => 15000.00,
                'deadline' => '2025-06-25',
                'form_link' => 'https://forms.gle/fresh-finds-campaign',
                'total_influencers_needed' => 10,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '🎧 SoundVibe Headphones TikTok Challenge',
                'user_id' => '1',
                'description' => 'Join our TikTok dance challenge featuring SoundVibe’s latest noise-canceling headphones. Get creative and go viral!',
                'brand_name' => 'SoundVibe',
                'budget' => 20000.00,
                'deadline' => '2025-07-05',
                'form_link' => 'https://forms.gle/soundvibe-tiktok',
                'total_influencers_needed' => 20,
                'status' => 'upcoming',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '🍔 Burger Beast Street Eats Promo',
                'user_id' => '1',
                'description' => 'Calling all foodies! Help us spread the word about our new street burger line with tasty Instagram content.',
                'brand_name' => 'Burger Beast',
                'budget' => 8000.00,
                'deadline' => '2025-06-30',
                'form_link' => 'https://forms.gle/burgerbeast-collab',
                'total_influencers_needed' => 12,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '📦 Unbox With Us - Gadget Edition',
                'user_id' => '1',
                'description' => 'Tech influencers wanted for unboxing and reviewing budget-friendly gadgets for YouTube and TikTok.',
                'brand_name' => 'GizmoGo',
                'budget' => 12000.00,
                'deadline' => '2025-07-15',
                'form_link' => 'https://forms.gle/gizmogadgets',
                'total_influencers_needed' => 8,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '💄 Slay With Clay: Skincare Video Series',
                'user_id' => '1',
                'description' => 'Promote our new clay mask collection with before-and-after reels on Instagram and TikTok.',
                'brand_name' => 'DermaClay PH',
                'budget' => 9500.00,
                'deadline' => '2025-07-01',
                'form_link' => 'https://forms.gle/dermaclay2025',
                'total_influencers_needed' => 15,
                'status' => 'upcoming',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '👟 Flex Your Fit - Sneaker Launch Campaign',
                'user_id' => '1',
                'description' => 'Athletic and fashion-forward influencers needed to promote our streetwear sneaker drop.',
                'brand_name' => 'SwiftStep',
                'budget' => 18000.00,
                'deadline' => '2025-06-28',
                'form_link' => 'https://forms.gle/swiftstep-fits',
                'total_influencers_needed' => 18,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '🎮 Mobile Legends All-Star Showdown',
                'user_id' => '1',
                'description' => 'Gaming influencers needed for a sponsored Mobile Legends tournament on Facebook Live and TikTok.',
                'brand_name' => 'GameHub PH',
                'budget' => 25000.00,
                'deadline' => '2025-07-10',
                'form_link' => 'https://forms.gle/gamehubmlbb',
                'total_influencers_needed' => 25,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
