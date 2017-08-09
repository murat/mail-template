<?php

namespace Muratbsts\MailTemplate\Providers;

use Illuminate\Support\ServiceProvider;

class MailTemplateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/settings.php' => config_path('mailtemplate.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/emails'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'mailtemplate');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Muratbsts\MailTemplate\MailTemplate', function ($app) {
            return new \Muratbsts\MailTemplate\MailTemplate(
                config('mailtemplate')
            );
        });
    }
}
