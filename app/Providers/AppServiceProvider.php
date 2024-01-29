<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchmapNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        app()->bind(Newsletter::class, function(){
           
        $client=(new ApiClient)->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);


            return new MailchmapNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function(User $user){

                return $user->username == 'asesaadmin';

        });
      
    }
}
