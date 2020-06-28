<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    protected $fillable = [
        'name',
        'foto',
        'branch_id',
        'description',
        'no_hp',
        'email'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
