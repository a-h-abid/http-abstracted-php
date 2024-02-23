<?php

namespace Moduvel\HttpAbstracted\Response;

interface ResponseInterface
{
    public function addHeaders(array $headers = []): self;

    public function setHeaders(array $headers = []): self;

    public function removeHeaders(array $headers = []): self;

    public function getHeaders(): array;

    public function setBody(string $body = ''): self;

    public function getBody(): string;

    public function setJson(array $data): self;

    public function getJson(): array;

    public function setStatusCode(int $code): self;

    public function getStatusCode(): int;

    public function respond(): mixed;
}