<?php

namespace Adithwidhiantara\LaravelResponseFormatter\Tests;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Adithwidhiantara\LaravelResponseFormatter\ResponseFormatter;

class ResponseFormatterTest extends TestCase
{
    public function test_success_response(): void
    {
        $response = ResponseFormatter::success(
            data: ['key' => 'value'],
            message: 'Data created successfully',
            status: 'created',
            code: Response::HTTP_CREATED
        );

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        $this->assertEquals([
            'status' => 'created',
            'message' => 'Data created successfully',
            'data' => ['key' => 'value'],
        ], $response->getData(true));
    }

    public function test_error_response(): void
    {
        $response = ResponseFormatter::error(
            data: ['error' => 'Invalid input'],
            message: 'Data validation failed',
            status: 'error',
        );

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
        $this->assertEquals([
            'status' => 'error',
            'message' => 'Data validation failed',
            'data' => ['error' => 'Invalid input'],
        ], $response->getData(true));
    }
}