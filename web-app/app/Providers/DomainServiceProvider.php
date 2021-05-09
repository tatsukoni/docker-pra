<?php

namespace App\Providers;

use App\Packages\Domains\Mediator\IMediator;
use App\Packages\Domains\Mediator\ConcreteMediator;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IMediator::class, ConcreteMediator::class);
    }
}
