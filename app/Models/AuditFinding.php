<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditFinding extends Model
{
    protected $fillable = ['audit_schedule_id', 'category', 'finding', 'severity', 'recommendation', 'status'];

    public function auditSchedule()
    {
        return $this->belongsTo(AuditSchedule::class);
    }
}
