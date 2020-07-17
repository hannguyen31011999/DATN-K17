<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Model\TypeProduct;
use Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['user.master'], function ($view) {
            $data = TypeProduct::all();
            $item = Cart::content();
            $view->with(['menu'=>$data,'item'=>$item]);
        });
    }
}
