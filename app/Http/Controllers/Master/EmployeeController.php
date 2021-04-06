<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Notifications\UserFollowed;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'ASC')->get();
        return view('office.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }
    public function follow(Employee $employee)
    {
        $follower = auth()->user();
        if ($follower->id == $employee->id_user) {
            return back()->withError("You can't follow yourself");
        }
        if(!$follower->isFollowing($employee->id_user)) {
            $follower->follow($employee->id_user);

            // sending a notification
            $employee->notify(new UserFollowed($follower));

            return back()->withSuccess("You are now friends with {$employee->name}");
        }
        return back()->withError("You are already following {$employee->name}");
    }

    public function unfollow(Employee $employee)
    {
        $follower = auth()->user();
        if($follower->isFollowing($employee->id_user)) {
            $follower->unfollow($employee->id_user);
            return back()->withSuccess("You are no longer friends with {$employee->name}");
        }
        return back()->withError("You are not following {$employee->name}");
    }
    public function ban(Request $request)
    {
        $input = $request->all();
        if(!empty($input['id'])){
            $user = User::find($input['id']);
            $user->bans()->create([
			    'expired_at' => '+1 month',
			    'comment'=>$request->baninfo
			]);
        }


        return redirect()->route('users.index')->with('success','Ban Successfully..');
    }
    public function revoke($id)
    {
        if(!empty($id)){
            $user = User::find($id);
            $user->unban();
        }


        return redirect()->route('users.index')
        				->with('success','User Revoke Successfully.');
    }
}
