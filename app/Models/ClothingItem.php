<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClothingItem extends Model {
    protected $fillable = ['name', 'category', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}