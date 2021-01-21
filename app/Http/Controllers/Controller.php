<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a JSON success response.
     *
     * @param mixed[] $data
     * @param string $message
     * @param int $status
     * @param string[] $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(array $data = [], $message = 'Success', $status = 200, array $headers = [])
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'code' => $status,
        ], $status, $headers);
    }

    /**
     * Create a JSON error response.
     *
     * @param mixed[] $data
     * @param string $message
     * @param int $status
     * @param string[] $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(array $data = [], $message = 'Error', $status = 422, array $headers = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
            'code' => $status,
        ], $status, $headers);
    }
}
