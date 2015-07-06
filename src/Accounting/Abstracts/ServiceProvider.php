<?php

/*
 * Agency Core Accounting API
 *
 * Standard service provider template for Laravel.
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Abstracts;

use DB;
use Config;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

abstract class ServiceProvider extends LaravelServiceProvider
{
    /**
     * The following variables should be set in child class
     *
     */
    public $root;    // root directory for service e.g. __DIR__
    public $service; // name of the service e.g. freeagent
    public $library; // PSR-4 class name for service e.g. FreeAgent\Api
     
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
     
    /**
     * Bootstrap service.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->root . '/config.php' => config_path( $this->service . '.php' )
        ]);
    }
     
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $service = $this->service;
        $library = $this->library;
        $this->app->bind($service, function ($app) use ($library, $service) {
            $api = new $library();
            $tokens = Config::get($service . '.tokens');
            $database = Config::get($service . '.database');
            // fetch from database?
            if ( $database['active'] )
            {
                foreach ( $tokens as $key => &$value )
                {
                    $data = DB::table('settings')
                              ->select($database['index'], $database['value'])
                              ->where($database['index'], $service . '_tokens_' . $key);
                    if ( $data ) $tokens[$key] = $data;
                }
            }
            $api->setup( $tokens );
            $api->auxiliary( Config::get($service . '.auxiliary', []) ); // not all APIs make use of auxiliary config
            $api->debug( Config::get($service . '.debug') );
            $api->sandbox( Config::get($service . '.sandbox') );
            return $api;
        });
    }
    
    /**
     * Get the services.
     *
     * @return array
     */
    public function provides()
    {
        return [$this->service];
    }
}