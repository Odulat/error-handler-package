<?php

namespace Dulat\ErrorHandler\Singletones;

use Dulat\ErrorHandler\Mail\ExceptionMailable;
use Dulat\ErrorHandler\Repositories\ErrorExceptionRepositoryContract;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Mail;
use Throwable;

/**
 * Class ErrorHandler
 *
 * @package Dulat\ErrorHandler\Singletones
 */
class ErrorHandler
{
    /**
     * @throws BindingResolutionException
     */
    public function captureException(Throwable $e) : void
    {
        $data = [
            'class' => get_class($e),
            'title' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'url' => url()->current(),
            'payload' => json_encode(request()->all()),
            'method' => request()->method(),
            'user_id' => auth()->check() ? auth()->user()->id : null
        ];

        $repository = app()->make(ErrorExceptionRepositoryContract::class);

        $result = $repository->store($data);

        if(!$result) {

        }

        Mail::to(config('error_handler.send_email_to'))
            ->send(new ExceptionMailable($data));
    }
}