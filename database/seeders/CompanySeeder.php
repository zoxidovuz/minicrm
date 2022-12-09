<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{

    public function run(): void
    {
        Company::factory()->count(10)->has(Employee::factory()->count(10))
            ->create();
    }
}
