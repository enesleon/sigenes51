<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table='partners';

    protected $fillable=[];
}
