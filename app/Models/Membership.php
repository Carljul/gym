<?php

namespace App\Models;

use Carbon\Carbon;
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
        'membership_type_id',
        'start_date',
        'end_date',
    ];

    protected $appends = [
        'startingSubscription',
        'endingSubscription'
    ];

    public function person() : HasOne
    {
        return $this->hasOne(Person::class, 'id', 'person_id');
    }

    public function membershipType() : HasOne
    {
        return $this->hasOne(MembershipType::class, 'id', 'membership_type_id');
    }

    public function getStartingSubscriptionAttribute()
    {
        return Carbon::parse($this->start_date)->format('F d, Y');
    }

    public function getEndingSubscriptionAttribute()
    {
        return Carbon::parse($this->end_date)->format('F d, Y');
    }
}
