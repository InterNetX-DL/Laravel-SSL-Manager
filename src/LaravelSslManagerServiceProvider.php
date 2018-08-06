<?php

namespace Ephenodrom;

use Illuminate\Support\ServiceProvider;
use Ephenodrom\SslManagerProvider;
use Ephenodrom\Commands\SslContactCreate;
use Ephenodrom\Commands\SslContactUpdate;
use Ephenodrom\Commands\SslContactDelete;
use Ephenodrom\Commands\SslContactInfo;
use Ephenodrom\Commands\SslContactList;

class LaravelSslManagerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        // Register service provider
        $this->app->singleton(SslManagerProvider::class, function ($app) {
            return new SslManagerProvider(env('SSL_MANAGER_API_URL'), env('SSL_MANAGER_API_USER'), env('SSL_MANAGER_API_CONTEXT'),env('SSL_MANAGER_API_PASSWORD'));
        });

        // Register artisan commands
        $this->app->bind('command.sslcontact.create', SslContactCreate::class);
        $this->app->bind('command.sslcontact.update', SslContactUpdate::class);
        $this->app->bind('command.sslcontact.delete', SslContactDelete::class);
        $this->app->bind('command.sslcontact.info', SslContactInfo::class);
        $this->app->bind('command.sslcontact.list', SslContactList::class);

        $this->commands([
            'command.sslcontact.create',
            'command.sslcontact.update',
            'command.sslcontact.delete',
            'command.sslcontact.info',
            'command.sslcontact.list'
        ]);
    }

}
