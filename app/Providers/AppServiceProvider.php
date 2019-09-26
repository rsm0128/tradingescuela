<?php

namespace App\Providers;

use App\BasicSetting;
use App\EmailSetting;
use App\PaymentMethod;
use App\Section;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        Schema::defaultStringLength(191);
        $basic = BasicSetting::first();
        $section = Section::first();
        $meta = 1;

        $email = EmailSetting::first();
        /*if ($email->driver == 'smtp'){
            Config::set('mail.driver','smtp');
            Config::set('mail.host',$email->host);
            Config::set('mail.username',$email->username);
            Config::set('mail.password',$email->password);
            Config::set('mail.port',$email->post);
            Config::set('mail.encryption',$email->encryption);
        }else{
            Config::set('mail.driver','mail');
        }*/
        Config::set('mail.from',$email->email);
        Config::set('mail.name',$email->title);

        Config::set('captcha.secret',$basic->captcha_secret);
        Config::set('captcha.sitekey',$basic->captcha_site);

        View::share('site_title',$basic->title);
        View::share('basic',$basic);
        View::share('section',$section);
        View::share('meta',$meta);
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
