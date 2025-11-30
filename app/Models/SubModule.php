<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubModule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
