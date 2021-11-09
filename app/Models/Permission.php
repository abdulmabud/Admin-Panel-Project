<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function module(){
        $this->belongsTo(Module::class);
    }

    public function roles(){
        $this->belongsToMany(Permission::class);
    }
}
