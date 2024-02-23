<?php

namespace Moduvel\HttpAbstracted\Frameworks\Laravel;

use Illuminate\Support\ServiceProvider;
use Moduvel\HttpAbstracted\Request\LaravelRequest;
use Moduvel\HttpAbstracted\Request\RequestInterface;
use Moduvel\HttpAbstracted\Response\LaravelResponse;
use Moduvel\HttpAbstracted\Response\ResponseInterface;

class HttpAbstractedServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RequestInterface::class, LaravelRequest::class);
        $this->app->bind(ResponseInterface::class, LaravelResponse::class);
    }
}