<?php namespace Barryvdh\VendorCleanup;

use Illuminate\Support\ServiceProvider;

class VendorCleanupServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('barryvdh/laravel-vendor-cleanup');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['command.vendor-cleanup'] = $this->app->share(function($app)
            {
                return new VendorCleanupCommand;
            });
        $this->commands('command.vendor-cleanup');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
        return array('command.vendor-cleanup');
	}

}