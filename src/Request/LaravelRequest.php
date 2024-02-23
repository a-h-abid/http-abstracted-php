<?php

namespace Moduvel\HttpAbstracted\Request;

use Illuminate\Http\Request;

class LaravelRequest implements RequestInterface
{
    public function __construct(
        protected Request $request
    ) {
    }

    public function header(string $key, string|null $default = null): string|null
    {
        return $this->request->headers->get($key, $default);
    }

    public function query(string $key, string|int|bool|array|null $default = null): string|int|bool|array|null
    {
        return $this->request->query($key, $default);
    }

    public function data(string $key, string|int|bool|array|null $default = null): string|int|bool|array|null
    {
        return $this->request->request->get($key, $default);
    }

    public function allHeaders(): array
    {
        return $this->request->header();
    }

    public function allQueries(): array
    {
        return $this->request->query();
    }

    public function allData(): array
    {
        return $this->request->request->all();
    }
}