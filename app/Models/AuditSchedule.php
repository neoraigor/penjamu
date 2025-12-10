<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditSchedule extends Model
{
    protected $fillable = ['title', 'date', 'time', 'program_id', 'auditor_id', 'status'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function auditor()
    {
        return $this->belongsTo(User::class, 'auditor_id');
    }

    public function findings()
    {
        return $this->hasMany(AuditFinding::class);
    }

    public function documents()
    {
        return $this->hasMany(AuditDocument::class);
    }
}
