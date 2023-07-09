<?php

namespace App\Providers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Person;
use App\Models\Membership;

use DB;
use Exception;
use Illuminate\Support\ServiceProvider;

class SubscribersProvider extends ServiceProvider
{

    public static function list($page = 10)
    {
        return Membership::with('person.membershipType');
    }

    /**
     * Register Subscriber.
     */
    public static function create(SubscriberRequest $request): array
    {
        DB::beginTransaction();
        try {
            $params = $request->validated();
            $person = Person::create([
                'firstname' => $params['firstname'],
                'middlename' => $params['middlename'],
                'lastname' => $params['lastname'],
                'suffix' => $params['suffix'],
                'birthdate' => $params['birthdate'],
                'email' => $params['email'],
                'contact_number' => $params['contact_number'],
                'emergency_contact_name' => $params['emergency_contact_name'],
                'emergency_contact_number' => $params['emergency_contact_number']
            ]);
            
            $membership = Membership::create([
                'person_id',
                'membership_type_id'
            ]);
            DB::commit();
            return [
                'success' => true,
                'message' => 'Successfully added subscriber',
                'data' => $membership->load(['person', 'membershipType'])
            ];
        } catch(Exception $e) {
            Log::error(get_class().' :'.$e->getMessage());
            DB::rollback();
            return [
                'success'=> false,
                'message' => $e->getMessage(),
                'data' => ''
            ];
        }
    }
}
