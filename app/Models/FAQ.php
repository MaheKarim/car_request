<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function vehicle(){
        return $this->belongsTo(CourierType::class);
    }
}
