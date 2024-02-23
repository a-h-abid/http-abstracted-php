<?php

namespace Moduvel\HttpAbstracted\Request;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;

class SymfonyRequest implements RequestInterface
{
    protected Request $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
        if (is_null($this->request)) {
            throw new \RuntimeException("Got 'null' Request object from Symfony RequestStack");
        }
    }

    public function header(string $key, string|null $default = null): string|null
    {
        return $this->request->headers->get($key, $default);
    }

    public function query(string $key, string|int|bool|array|null $default = null): string|int|bool|array|null
    {
        return $this->request->query->get($key, $default);
    }

    public function data(string $key, string|int|bool|array|null $default = null): string|int|bool|array|null
    {
        return $this->request->request->get($key, $default);
    }

    public function allHeaders(): array
    {
        return $this->request->headers->all();
    }

    public function allQueries(): array
    {
        return $this->request->query->all();
    }

    public function allData(): array
    {
        return $this->request->request->all();
    }
}