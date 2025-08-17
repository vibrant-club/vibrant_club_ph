<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use App\Channels\ResendChannel;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app(ChannelManager::class)->extend('resend', function ($app) {
            return new ResendChannel();
        });


        // Listen for user login and update last_login timestamp
        Event::listen(Login::class, function ($event) {
            $event->user->update([
                'last_login' => Carbon::now(),
            ]);
        });
    }
}
