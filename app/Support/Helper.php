<?php

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * A blueprint of a failed ajax request
 * @param string $msg
 * @param array $data
 * @param array $meta
 * @return array
 */
function apiSuccess(string $msg, $data = [], array $meta = [])
{
    [$payload, $pagination] = apiPaginationFactory($data);

    $nativeMeta = [];

    $responder = config('app.apiResponse');
    $responder['status'] = true;
    $responder['message'] = $msg;
    $responder['payload'] = $payload;

    if (!empty($pagination)) {
        $responder['pagination'] = $pagination;
    }

    $responder['meta'] = array_merge($meta, $nativeMeta);

    return $responder;
}

/**
 * A blueprint of a failed ajax request
 * @param string $msg
 * @param array $payload
 * @param int $status
 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
 */
function apiFailure(string $msg, $payload = [], $status=500)
{
    $responder = config('app.apiResponse');
    $responder['status'] = false;
    $responder['message'] = $msg;
    $responder['payload'] = $payload;

    return response($responder, $status);
}

function unauthorized()
{
    return apiFailure('Unauthorized access', []);
}

/**
 * Logs a simple message to log file
 * @param String $message
 */
function simpleLog(String $message)
{
    try {
        \Illuminate\Support\Facades\Log::info($message);
    }
    catch (\Exception $exception) {

    }
}

/**
 * Log the information of an exception to log file
 * @param \Exception $exception
 */
function logAnException(\Exception $exception)
{

    $exceptionFormat = "\n". config('app.name') ."-EXCEPTION \nMESSAGE:: %s \nFILE:: %s \nLINE::%s \n\n";

    \Illuminate\Support\Facades\Log::info(sprintf($exceptionFormat,
        !empty(trim($exception->getMessage())) ? $exception->getMessage() : get_class($exception),
        $exception->getFile(),
        $exception->getLine()
    ));
}

function apiPaginationFactory($data)
{
    $payload = [];
    $pagination = [];

    // to cater for pagination data
    if (is_object($data)) {
        switch (get_class($data)) {
            case LengthAwarePaginator::class:
                $pagination = $data->toArray();
                $payload = $pagination['data'];
                unset($pagination['data']);
                break;

            default:
                $payload = $data;
                break;
        }
    }
    else {
        $payload = $data;
    }

    return [$payload, $pagination];
}