<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Follower;
use Illuminate\Database\Eloquent\Relations\Relation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer(['Auther.*','Admin.*'], function( $view )
        {
            $followersCount = Follower::where('following_id',Auth::user()->id)->count();
            $view->with( 'followersCount', $followersCount );
        });

        Relation::enforceMorphMap([
            'post' => 'App\Models\Post',
            'comment' => 'App\Models\Comment',
        ]);
    }
}
