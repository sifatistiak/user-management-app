<?php

namespace App\Http\Controllers;

use App\DataTables\DeletedUsersDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        $header = "All Users";
        $all = true;
        return $dataTable->render('users.index', compact('header', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        // $file = request()->file('avatar');

        $user = User::create($request->all());

        return redirect()->back()->with('message', 'User stored successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index')->with('message', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message', 'User Deleted');
    }

    public function deleted(DeletedUsersDataTable $dataTable)
    {
        $header = "Deleted Users";
        $all = false;
        return $dataTable->render('users.index', compact('header', 'all'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->back()->with('message', 'User re-stored successfully!');
    }

    public function deletePermanently($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete();
        return redirect()->back()->with('message', 'User Removed from System');
    }

    public function restoreAll()
    {
        User::withTrashed()->restore();
        return redirect()->back()->with('message', 'All Deleted User re-stored successfully!');
    }
}
