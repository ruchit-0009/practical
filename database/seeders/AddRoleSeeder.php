<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use Illuminate\Database\Seeder;

class AddRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role[]=['name'=>'Super Admin'];
        $role[]=['name'=>'Admin'];
        $role[]=['name'=>'Employee'];
        RoleModel::insert($role);
    }
}
