<?php

namespace Styde\Enlighten\HttpExamples;

class RequestInfo
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var array
     */
    private $queryParameters;

    /**
     * @var array
     */
    private $input;

    public function __construct(string $method, string $path, array $headers, array $queryParameters, array $input)
    {
        $this->method = $method;
        $this->path = $path;
        $this->headers = $headers;
        $this->queryParameters = $queryParameters;
        $this->input = $input;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getQueryParameters(): array
    {
        return $this->queryParameters;
    }

    public function getInput(): array
    {
        return $this->input;
    }
}
