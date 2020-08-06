<?php

namespace App\Providers;
const ROLE_ADMIN = 1;
const ROLE_NCC = 2;
const ROLE_NHANVIEN = 3;
use Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('xemToanBo',function($user){
            return $user->id_role == ROLE_ADMIN;
         });
         Gate::define('xemToanBoNV',function($user){
            return $user->id_role == ROLE_NHANVIEN;
         });
         Gate::define('xemToanBoNCC',function($user){
            return $user->id_role == ROLE_NCC;
         });
    }
}
