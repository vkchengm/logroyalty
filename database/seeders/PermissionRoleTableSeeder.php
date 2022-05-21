<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $all_permissions = Permission::all();

        // Admin
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 6) == 'admin_';
        });
        Role::findOrFail(1)->permissions()->attach($user_permissions);
        // Role::findOrFail(1)->permissions()->sync($user_permissions);

        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 3) == 'fo_';
        });
        Role::findOrFail(1)->permissions()->attach($user_permissions);


        // Applicant
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 10) == 'applicant_';
        });
        Role::findOrFail(2)->permissions()->attach($user_permissions);
        
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'permit_';
        });
        Role::findOrFail(2)->permissions()->attach($user_permissions);
        
        // DFO
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 4) == 'dfo_';
        });
        Role::findOrFail(3)->permissions()->attach($user_permissions);
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'permit_';
        });
        Role::findOrFail(3)->permissions()->attach($user_permissions);

        // KPPM
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) == 'kppm_';
        });
        Role::findOrFail(4)->permissions()->attach($user_permissions);
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'permit_';
        });
        Role::findOrFail(4)->permissions()->attach($user_permissions);

        // FO
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 3) == 'fo_';
        });
        Role::findOrFail(5)->permissions()->sync($user_permissions);
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'permit_';
        });
        Role::findOrFail(5)->permissions()->attach($user_permissions);


        // Viewer
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'viewer_';
        });
        Role::findOrFail(6)->permissions()->sync($user_permissions);

        // regional PPW viewer
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 4) == 'ppw_';
        });
        Role::findOrFail(7)->permissions()->sync($user_permissions);
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'permit_';
        });
        Role::findOrFail(7)->permissions()->attach($user_permissions);

        // regional TPPW viewer
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) == 'tppw_';
        });
        Role::findOrFail(8)->permissions()->sync($user_permissions);
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'permit_';
        });
        Role::findOrFail(8)->permissions()->attach($user_permissions);

        // regional ADFO viewer
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) == 'adfo_';
        });
        Role::findOrFail(9)->permissions()->sync($user_permissions);
        $user_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) == 'permit_';
        });
        Role::findOrFail(9)->permissions()->attach($user_permissions);

    }
}
