<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Employee;
use App\Models\TicketStatus;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Department::factory()->create([
            'department_name' => 'Marketing',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123123'),
            'department_id' => 1,
        ]);

        Employee::factory()->create([
            'name' => 'Test Employee',
            'email' => 'test@test',
            'password' => Hash::make('123123'),
        ]);

        TicketStatus::factory()->create([
            'status' => 'open',
        ]);
    }
}
