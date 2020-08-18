<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Model\TypeProduct;
use Cart;
use Session;
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
    public function boot(Request $req)
    {
        View::composer(['user.master'], function ($view) {
            $data = TypeProduct::all();
            $view->with(['menu'=>$data]);

        });
    }
}
