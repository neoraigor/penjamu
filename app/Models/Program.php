<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['code', 'name', 'level'];

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function auditSchedules()
    {
        return $this->hasMany(AuditSchedule::class);
    }
}
