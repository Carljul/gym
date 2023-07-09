<?php

namespace App\Models;

use App\Models\Person;
use App\Models\MembershipType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'memberships';

    protected $fillable = [
        'person_id',
        'membership_type_id'
    ];

    public function person() : HasOne
    {
        return $this->hasOne(Person::class);
    }

    public function membershipType() : HasOne
    {
        return $this->hasOne(MembershipType::class);
    }
}
