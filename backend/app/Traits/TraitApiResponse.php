<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

trait TraitApiResponse {

    public function customResponse($result = [], $message = ''): JsonResponse {
        $response = [
            'status'  => true,
            'message' => $message,
        ];

        if (count($result) > 0) {
            array_push($response, $result);
        }

        return response()->json($response, 200);
    }

    public function successResponse($result, $message = '', $token = ''): JsonResponse {
        if ($token != '') {
            $response = [
                'status'  => true,
                'message' => empty($message) ? 'Successfuly.' : $message,
                'token'   => $token,
                'data'    => $result,
            ];
        } else {
            $response = [
                'status'  => true,
                'message' => empty($message) ? 'Successfuly.' : $message,
                'data'    => $result,
            ];
        }

        return response()->json($response, 200);
    }

    public function successResponseImage($image) {
        return response($image, 200)->header('Content-Type', 'image/jpeg');
    }


    public function errorResponse($error, $errorMessages = [], $code = 404): JsonResponse {
        $response = [
            'status'  => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function exceptionResponse(Throwable $e): JsonResponse {
        $code = 500;
        if ($e instanceof HttpExceptionInterface) {
            $code = $e->getStatusCode();
        } else {
            if ($e->getCode() > 0) {
                $code = $e->getCode();
            }
        }

        return $this->errorResponse($e->getMessage(), [], $code);
    }

    public function paginateResponse($meta) {
        return response()->json([
            'status' => true,
            'meta'   => $meta
        ], 200);
    }

    public function metaResponse($meta) {
        return response()->json([
            'status' => true,
            'meta'   => $meta
        ], 200);
    }
}
