<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\User;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Tambahkan jika ingin register otomatis login
        Login::class => [],
        Logout::class => [],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        // Update status online saat login
        Event::listen(Login::class, function ($event) {
            $user = $event->user;
            $user->is_online = true;
            $user->save();
        });

        // Update status offline saat logout
        Event::listen(Logout::class, function ($event) {
            $user = $event->user;
            if ($user) {
                $user->is_online = false;
                $user->save();
            }
        });
    }
}
