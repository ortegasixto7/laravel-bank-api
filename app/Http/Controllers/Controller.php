<?php

namespace App\Http\Controllers;

use App\Exceptions\BadRequestException;
use App\Exceptions\NotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function requestWrapper(callable $func) {
        try {
            Log::info('New Request.');
            return $func();
        } catch (\Throwable $ex) {
            if ($ex instanceof BadRequestException) return response()->json(['error' => $ex->getMessage()], 400);
            if ($ex instanceof NotFoundException) return response()->json(['error' => $ex->getMessage()], 404);
            Log::error($ex->getMessage());
            return response()->json(['error' => 'INTERNAL_SERVER_ERROR'], 500);
        }
    }
}
