<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Eloquent\User::class => \App\Policies\UserPolicy::class,
        \Silber\Bouncer\Database\Role::class => \App\Policies\RolePolicy::class,
        \App\Eloquent\Slide::class => \App\Policies\SlidePolicy::class,
        \App\Eloquent\Menu::class => \App\Policies\MenuPolicy::class,
        \App\Eloquent\Config::class => \App\Policies\ConfigPolicy::class,
        \App\Eloquent\Page::class => \App\Policies\PagePolicy::class,
        \App\Eloquent\Product::class => \App\Policies\ProductPolicy::class,
        \App\Eloquent\Contact::class => \App\Policies\ContactPolicy::class,
        \App\Eloquent\Category::class => \App\Policies\CategoryPolicy::class,
        \App\Eloquent\Post::class => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
