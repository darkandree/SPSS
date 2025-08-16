<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use App\Models\RFFANotifications;




//return QueryBuilder::for(GeorefAccomplishmentView::WHERE('uploader_id',Auth::User()->emp_id)->orderBy('year', 'desc')->orderBy('month_id', 'DESC'))

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // View::composer('layouts.navigation', function ($view) {
        //     $alerts = Auth::check()
        //         ? RFFANotifications::where('notif_to_id', Auth::User()->emp_id)
        //         ->where('notification_status', 2)
        //         ->latest()
        //         ->take(5)
        //         ->get()
        //         : collect();

        //     $view->with('alerts', $alerts);
        // });
    }

    public function register() {}
}
