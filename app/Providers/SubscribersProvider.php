<?php

namespace App\Providers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Person;
use App\Models\Membership;
use App\Models\MembershipType;

use DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class SubscribersProvider extends ServiceProvider
{

    public static function list($params = [])
    {
        return Membership::with('person')->with('membershipType')->paginate(10);
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


            $type = MembershipType::where('id', $params['membership_type_id'])->first();

            $subscriptionEndDate = Carbon::parse($params['subscription_start_date'])->addMonths(config('const.subscriptions')[$type['duration']]);
            
            $membership = Membership::create([
                'person_id' => $person->id,
                'membership_type_id' => $type->id,
                'start_date' => $params['subscription_start_date'],
                'end_date' => $subscriptionEndDate
            ]);

            DB::commit();
            return [
                'success' => true,
                'message' => 'Successfully added subscriber',
                'data' => $membership->load(['person', 'membershipType'])
            ];
        } catch(Exception $e) {
            \Log::error(get_class().' :'.$e->getMessage());
            DB::rollback();
            return [
                'success'=> false,
                'message' => $e->getMessage(),
                'data' => ''
            ];
        }
    }


    /**
     * Updates Record
     *
     * @return array
     */
    public static function update(SubscriberRequest $request, integer $id): array 
    {

    }
}
