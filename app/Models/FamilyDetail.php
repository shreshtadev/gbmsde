<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name_of_head_of_family',
        'address_line_1',
        'taluk',
        'area',
        'phone_number',
        'email_address',
        'occupation',
        'category',
        'sub_category',
        'gotra',
        'veda',
    ];

    public function familyMemberDetails(): HasMany {
        return $this->hasMany(FamilyMemberDetail::class);
    }
}
