<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Naif\WorldClock\WorldClock;
use NovaCards\SystemInformationCard\SystemInformationCard;
use Techouse\TotalRecords\TotalRecords;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'tikken23@gmail.com'
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
//            new Help,
            new TotalRecords(Order::class, __('Всего заказов'), now()->addHour()), // cached for 1 hour
            new TotalRecords(User::class, __('Всего пользователей'), now()->addHour()), // cached for 1 hour
            new TotalRecords(Product::class, __('Всего продуктов'), now()->addHour()), // cached for 1 hour
//            new SystemInformationCard(),
            (new WorldClock())
                ->timezones([
                    'Europe/Moscow',
                    'Asia/Tokyo',
                    'Asia/Dubai'
                ])
                ->timeFormat('h:i') //Optional time format default is: 'h:i:s'
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Bolechen\NovaActivitylog\NovaActivitylog(),
            new \Infinety\Filemanager\FilemanagerTool(),
            \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
            (new \vmitchell85\NovaLinks\Links())
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
