<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Ticket;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $employees = Employee::all();

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
        //
    }
    public function createUser()
    {
        //
    }
    public function createEmployee()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function showTickets(Admin $admin)
    {
        //
    }
    public function showDepartments(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
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
    public function destroyUser(Admin $admin,$id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('users');
    }
    public function destroyEmployee(Admin $admin,$id)
    {
        $employee = Employee::findOrFail($id)->delete();
        return redirect()->route('users');
    }
}
