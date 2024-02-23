<?php

namespace Moduvel\HttpAbstracted\Request;

interface RequestInterface
{
    public function header(string $key, string|null $default = null): string|null;

    public function query(string $key, string|int|bool|array|null $default = null): string|int|bool|array|null;

    public function data(string $key, string|int|bool|array|null $default = null): string|int|bool|array|null;

    public function allHeaders(): array;

    public function allQueries(): array;

    public function allData(): array;
}