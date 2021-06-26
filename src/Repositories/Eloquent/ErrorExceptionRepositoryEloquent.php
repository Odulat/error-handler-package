<?php

namespace Dulat\ErrorHandler\Repositories\Eloquent;

use Dulat\ErrorHandler\Models\ErrorException;
use Dulat\ErrorHandler\Repositories\ErrorExceptionRepositoryContract;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ErrorExceptionRepositoryEloquent implements ErrorExceptionRepositoryContract
{
    public function store(array $data): bool
    {
        try {
            DB::beginTransaction();
            ErrorException::query()
                ->create($data);
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());
            return false;
        }
    }
}