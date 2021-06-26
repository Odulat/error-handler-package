<?php

namespace Dulat\ErrorHandler\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorException extends Model
{
    protected $fillable = [
        'class', 'title', 'user_id', 'file',
        'url', 'payload', 'method', 'line',
    ];
}