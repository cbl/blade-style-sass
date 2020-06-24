<?php

namespace BladeStyle\Sass;

use BladeStyle\Engines\CompilerEngine;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSassCompiler();

        $this->app->afterResolving('style.engine.resolver', function ($resolver) {
            $this->registerSassEngine($resolver);
        });
    }

    /**
     * Regsiter sass compiler.
     *
     * @return void
     */
    protected function registerSassCompiler()
    {
        $this->app->singleton('style.compiler.sass', function () {
            return new SassCompiler(
                $this->app['style.engine.minifier'],
                $this->app['files'],
                $this->app['config']['style.compiled'],
            );
        });
    }

    /**
     * Register sass compiler.
     *
     * @param \BladeStyle\Engines\EngineResolver $resolver
     * @return void
     */
    protected function registerSassEngine($resolver)
    {
        $resolver->register('sass', function () {
            return new CompilerEngine($this->app['style.compiler.sass']);
        });
        $resolver->register('scss', function () {
            return new CompilerEngine($this->app['style.compiler.sass']);
        });
    }

    /**
     * Register publishes.
     *
     * @return void
     */
    public function registerPublishes()
    {
        $this->publishes([
            __DIR__ . '/../storage/' => storage_path('framework/styles')
        ], 'storage');
    }
}
