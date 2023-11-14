<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BenefitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                \App\Benefit::JOB_POLICY_INSURANCE => 'Insurance',
                \App\Benefit::JOB_POLICY_TRAVEL => 'Travel',
                \App\Benefit::JOB_POLICY_REWARD => 'Reward',
                \App\Benefit::JOB_POLICY_HEALTHCARE => 'Healthcare',
                \App\Benefit::JOB_POLICY_TRAINING => 'Training',
               \App\Benefit::JOB_POLICY_LAPTOP => 'Laptop',
               \App\Benefit::JOB_POLICY_ALLOWANCE => 'Allowance',
               \App\Benefit::JOB_POLICY_PICKUP => 'Pickup',
               \App\Benefit::JOB_POLICY_HOLIDAY => 'Holiday',
               \App\Benefit::JOB_POLICY_UNIFORM => 'Uniform',
               \App\Benefit::JOB_POLICY_PAYRISE =>  'Payrise',
               \App\Benefit::JOB_POLICY_LEAVE => 'Leave',
               \App\Benefit::JOB_POLICY_SENIOR => 'Senior',
               \App\Benefit::JOB_POLICY_CLUB => 'Sport Club',
            ];

        $id = 0;
        foreach ($data as $k => $dt) {
            DB::table('job_benefits')->insert([
                'code' => $k,
                'name' => $dt,
            ]);
        }
    }
}
