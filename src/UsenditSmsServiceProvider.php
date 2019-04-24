<?php

namespace tricciardi\UsenditSms;

use Illuminate\Support\ServiceProvider;

class UsenditSmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

      $this->publishes([
                          __DIR__.'/config/multibanco.php' => config_path('multibanco.php'),
                        ]);
      $this->loadMigrationsFrom(__DIR__.'/migrations');

      //set commands
      if ($this->app->runningInConsole()) {
          $this->commands([]);
      }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->mergeConfigFrom( __DIR__.'/config/usenditsms.php', 'usenditsms' );
    }
}
