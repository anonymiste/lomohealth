<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vaccination;

class VaccineSeeder extends Seeder
{
    public function run(): void
    {
        $vaccines = [
            ['vaccine_name' => 'BCG', 'dose' => 'Dose unique', 'age_days' => 0],
            ['vaccine_name' => 'VPO', 'dose' => 'Dose 0', 'age_days' => 0],
            ['vaccine_name' => 'Pentavalent', 'dose' => 'D1', 'age_days' => 42],
            ['vaccine_name' => 'VPO', 'dose' => 'D1', 'age_days' => 42],
            ['vaccine_name' => 'Pneumo', 'dose' => 'D1', 'age_days' => 42],
            ['vaccine_name' => 'Rotavirus', 'dose' => 'D1', 'age_days' => 42],
            ['vaccine_name' => 'Pentavalent', 'dose' => 'D2', 'age_days' => 70],
            ['vaccine_name' => 'VPO', 'dose' => 'D2', 'age_days' => 70],
            ['vaccine_name' => 'Pneumo', 'dose' => 'D2', 'age_days' => 70],
            ['vaccine_name' => 'Rotavirus', 'dose' => 'D2', 'age_days' => 70],
            ['vaccine_name' => 'Pentavalent', 'dose' => 'D3', 'age_days' => 98],
            ['vaccine_name' => 'VPO', 'dose' => 'D3', 'age_days' => 98],
            ['vaccine_name' => 'Pneumo', 'dose' => 'D3', 'age_days' => 98],
            ['vaccine_name' => 'VPI', 'dose' => 'Dose unique', 'age_days' => 98],
            ['vaccine_name' => 'Rougeole-Rubéole', 'dose' => 'D1', 'age_days' => 270],
            ['vaccine_name' => 'Fièvre jaune', 'dose' => 'Dose unique', 'age_days' => 270],
            ['vaccine_name' => 'Méningite A', 'dose' => 'Dose unique', 'age_days' => 270],
            ['vaccine_name' => 'Rougeole-Rubéole', 'dose' => 'D2', 'age_days' => 540],
        ];

        foreach ($vaccines as $v) {
            // on le seedera plus tard par enfant
        }
    }
}