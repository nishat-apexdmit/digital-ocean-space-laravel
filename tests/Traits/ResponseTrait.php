<?php

namespace Tests\Traits;

use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;

trait ResponseTrait
{
    /**
     * Get validation response.
     *
     * @param  array $response
     * @param  string $message
     * @return array
     */
    protected function validationError(array $response, string $message = null): array
    {
        return [
            'message' => $message ?? 'The given data was invalid.',
            'errors' => $response,
        ];
    }

    /**
     * Generate json response.
     *
     * @param  array $json
     * @param  bool $useMessage
     * @param  string|null $message
     * @return array
     */
    protected function jsonResponse(array $json, bool $useMessage = true, string $message = null): array
    {
        return $useMessage ? $this->validationError($json, $message) : $json;
    }

    /**
     * Assert response returned 200.
     *
     * @param  \Illuminate\Testing\TestResponse $response
     * @return void
     */
    protected function assertResponseOk(TestResponse $response): void
    {
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Assert response returned 200 and json response.
     *
     * @param  \Illuminate\Testing\TestResponse $response
     * @param  array $json
     * @param  bool $useMessage
     * @return void
     */
    protected function assertResponseOkWithJson(
        TestResponse $response,
        array $json = [],
        bool $useMessage = false
    ): void {
        $this->assertResponseOk($response);
        $response->assertExactJson($this->jsonResponse($json, $useMessage));
    }

    /**
     * Assert response returned 201.
     *
     * @param  \Illuminate\Testing\TestResponse $response
     * @return void
     */
    protected function assertResponseCreated(TestResponse $response): void
    {
        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * Assert response returned 201 and json response.
     *
     * @param  \Illuminate\Testing\TestResponse $response
     * @param  array $json
     * @param  bool $useMessage
     * @return void
     */
    protected function assertResponseCreatedWithJson(
        TestResponse $response,
        array $json = [],
        bool $useMessage = false
    ): void {
        $this->assertResponseCreated($response);
        $response->assertExactJson($this->jsonResponse($json, $useMessage));
    }

    /**
     * Assert response returned 422.
     *
     * @param  \Illuminate\Testing\TestResponse $response
     * @return void
     */
    protected function assertResponseUnprocessable(TestResponse $response): void
    {
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Assert response returned 422 and json response.
     *
     * @param  \Illuminate\Testing\TestResponse $response
     * @param  array $json
     * @param  bool $useMessage
     * @return void
     */
    protected function assertResponseUnprocessableWithJson(
        TestResponse $response,
        array $json = [],
        bool $useMessage = true
    ): void {
        $this->assertResponseUnprocessable($response);
        $response->assertExactJson($this->jsonResponse($json, $useMessage));
    }
}
