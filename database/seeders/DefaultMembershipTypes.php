<?php

namespace Database\Seeders;

use App\Models\MembershipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultMembershipTypes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $membershipTypes = [(array)[
            'type' => 'Monthly',
            'details' => [
                'This membership allows individuals to pay a recurring monthly fee to access the gym facilities and services. It provides flexibility with no long-term commitment, making it a popular choice for many gym-goers.',
                'No gym instructor included',
                'With use of shower facility'
            ],
            'duration' => 'monthly'
        ],(array)[
            'type' => 'Annual',
            'details' => [
                'An annual membership requires members to pay a lump sum fee upfront for a one-year membership. It often comes with discounted rates compared to monthly memberships and provides a longer-term commitment for individuals who prefer a more cost-effective and extended membership option.',
                'Gym instructor included',
                'With use of shower facility'
            ],
            'duration' => 'yearly'
        ],(array)[
            'type' => 'Student',
            'details' => [
                'Many gyms offer special membership options for students, typically enrolled in high school, college, or university. These memberships often come with discounted rates to make fitness more affordable and accessible for students who prioritize their health and well-being.',
                'Gym instructor included',
                'No shower facility included'
            ],
            'duration' => 'monthly'
        ]];

        for ($i=0; $i < count($membershipTypes); $i++) { 
            MembershipType::create([
                'name' => $membershipTypes[$i]['type'],
                'inclussions' => json_encode($membershipTypes[$i]['details']),
                'duration' => $membershipTypes[$i]['duration']
            ]);
        }
    }
}
