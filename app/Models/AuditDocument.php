<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditDocument extends Model
{
    protected $fillable = ['audit_schedule_id', 'title', 'file_path'];

    public function auditSchedule()
    {
        return $this->belongsTo(AuditSchedule::class);
    }
}
