<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/empleados.json'));
        $employees = json_decode($json, true);

        foreach ($employees as $employee) {
            // Si skills es un array, lo convertimos a JSON
            if (is_array($employee['skills'])) {
                $employee['skills'] = json_encode($employee['skills']);
            }
        
            DB::table('employees')->insert($employee);
        }
        
    }
}
