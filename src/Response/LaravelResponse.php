<?php

namespace Moduvel\HttpAbstracted\Response;

use Illuminate\Http\Response;

class LaravelResponse implements ResponseInterface
{
    public function __construct(
        protected Response $response
    ) {
    }

    public function addHeaders(array $headers = []): self
    {
        $this->response->withHeaders($headers);

        return $this;
    }

    public function setHeaders(array $headers = []): self
    {
        $this->response->headers->replace();
        $this->response->withHeaders($headers);

        return $this;
    }

    public function removeHeaders(array $headers = []): self
    {
        foreach ($headers as $header) {
            $this->response->headers->remove($header);
        }

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->response->headers->all();
    }

    public function setBody(string $body = ''): self
    {
        $this->response->setContent($body);

        return $this;
    }

    public function getBody(): string
    {
        return $this->response->getContent() ?: '';
    }

    public function setJson(array $data): self
    {
        $this->setBody(json_encode($data));
        $this->response->header('Content-Type', 'application/json');

        return $this;
    }

    public function getJson(): array
    {
        return json_decode($this->getBody(), true);
    }

    public function setStatusCode(int $code): self
    {
        $this->response->setStatusCode($code);

        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function respond(): mixed
    {
        return $this->response;
    }
}