<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $employees = Employee::all();
        // $departmet_name = Department::user('department_id')->$department_name;
        return view('backend.admin', compact('users','employees'));
    }

    public function departments()
    {
        $departments = Department::all();
        return view('backend.departments')->with('departments',$departments,);
    }
    public function tickets()
    {
        $tickets = Ticket::all();
        return view('backend.tickets')->with('tickets',$tickets,);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUserPage()
    {
        return view('backend.createUser');
    }


    public function createEmployeePage()
    {
        return view('backend.createEmployee');
    }
    public function createUser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>$request->password,
            'department_id' => $request->department,

        ]);
        return back();
    }

    public function createDepartmentPage()
    {
        return view('backend.createDepartment');
    }
    public function createDepartment(Request $request)
    {
        $department = Department::create([
            'department_name' => $request->name,
            'department_users' => 0,

        ]);
        return back();
    }


    public function createEmployee(Request $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>$request->password,
        ]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request,$id)
    {
        $user = User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department,

        ]);
        return back();

    }
    public function storeEmployee(Request $request,$id)
    {
        $employee = Employee::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */

    public function showTickets()
    {
        //
    }
    public function showDepartments()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editUser($id)
    {
        $users = User::findOrFail($id);
        return view('backend.editUser')->with('user', $users);

    }
    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return view('backend.editEmployee')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyUser($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('users');
    }
    public function destroyDepartment($id)
    {
        $departments = Department::findOrFail($id)->delete();
        return redirect()->route('departments');
    }
    public function destroyEmployee($id)
    {
        $employee = Employee::findOrFail($id)->delete();
        return redirect()->route('users');
    }
}
