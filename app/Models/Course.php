<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'name', 'credits', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
