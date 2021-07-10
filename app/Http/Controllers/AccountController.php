<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Check user is admin
        $user_type = auth()->user()->user_type;
        if ($user_type != 'admin') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }

        return view('admin.account.index');
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
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'region' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'user_type' => ['required'],
        ]);
        // dd($data);
        User::create([
            'name' => $data['name'],
            'region_id' => $data['region'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('/account')->with('success', 'Account created successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public function all_users()
    {
        // Check user is admin or supervisor
        $user_type = auth()->user()->user_type;
        $allowed = ['admin', 'supervisor'];
        if (!in_array($user_type, $allowed)) {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // if user is admin then display all users else display enumnators only based on the current upervisor
        if ($user_type == 'admin') {
            $users = User::orderBy('created_at', 'DESC')->paginate(10);
        }
        if ($user_type == 'supervisor') {
            $supervisor_region_id = auth()->user()->region_id;
            // dd($supervisor_region_id);
            $users = User::where('user_type', 'enumerator')->where('region_id', $supervisor_region_id)->orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('admin.all-users.index', [
            'users' => $users
        ]);
    }

    public function enable_disable_account(Request $request)
    {
        // Check user is admin or supervisor
        $user_type = auth()->user()->user_type;
        $allowed = ['admin', 'supervisor'];
        if (!in_array($user_type, $allowed)) {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }

        $user_id = $request['user_id'];
        $status = $request['status'];
        $message = '';
        if ($status) {
            $status = false;
            $message = 'User account Disabled';
        } else {
            $status = true;
            $message = 'User account Enabled';
        }
        $data = [
            'active_account' => $status
        ];

        User::where('id', $user_id)->update($data);
        return back()->with('success', $message);
    }
}
