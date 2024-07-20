<?php

declare(strict_types=1);

namespace YieldStudio\LaravelExpoNotifier\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpoNotification extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $connection = 'flex_expo_notification';
}
