<?php

namespace Database\Seeders;

use App\Models\PaymentSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultPaymentSchedules extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentSchedules = [
            (array)[
                'name' => 'Monthly',
                'details' => 'Payments are made on a monthly basis, typically on a specific day of each month.'
            ],
            (array)[
                'name' => 'Annually',
                'details' => 'A one-time payment covers the membership for an entire year.'
            ],
        ];

        for ($i=0; $i < count($paymentSchedules); $i++) {
            PaymentSchedule::create([
                'name' => $paymentSchedules[$i]['name'],
                'details' => $paymentSchedules[$i]['details']
            ]);
        }
    }
}
