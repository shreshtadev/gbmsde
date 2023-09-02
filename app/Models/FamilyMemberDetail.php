<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMemberDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'member_name',
        'email_address',
        'phone_number',
        'related_as',
        'is_married',
        'age',
        'education_occupation_details',
        'family_detail_id'
    ];

    public function familyDetail(): BelongsTo {
        return $this->belongsTo(FamilyDetail::class);
    }
}
