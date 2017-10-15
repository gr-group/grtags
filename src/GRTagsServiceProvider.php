<?php

namespace GRGroup\GRTags;

use Illuminate\Support\ServiceProvider;

class GRTagsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/Migrations/create_tag_tables.php' => database_path('migrations/'.$timestamp.'_create_tag_tables.php'),
            ], 'grtags_migrations');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}