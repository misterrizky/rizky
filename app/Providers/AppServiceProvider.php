<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Employee;
use App\Models\Project;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $count_employee = Employee::where('roles','!=','Member')->get()->count();
        $count_member = User::where('roles','=','Member')->get()->count();
        $count_project = Project::all()->count();

        $data = array(
            'count_project' => $count_project,
            'count_employee' => $count_employee,
            'count_member' => $count_member,
        );
        View::share('data', $data);
        
        // Paginator::useTailwind();
        
        Paginator::defaultView('office_layouts.pagination');
    }
}
