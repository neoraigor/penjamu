<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['nip', 'name', 'email', 'phone', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
