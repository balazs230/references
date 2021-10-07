<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{

    public function index(){
        return view('users/index', ['users' => User::paginate(10) ]);
    }

    public function edit(User $user)
    {
        return view('users/edit', [
            'user' => $user ]);      
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:150',
            'phone' => 'bail|required|max:15',
            'address' => 'bail|required|string|max:100',
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;

       $user->save();

       return redirect('users');
    }
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:150|unique:users',
            'phone' => 'bail|required|max:15',
            'address' => 'bail|required|string|max:100',
            'password' => 'bail|required|string|min:6|same:password_confirmation',
            'password_confirmation' => 'bail|required|string|min:6'
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function destroy(User $user)
    {
        DB::transaction(function () use($user) {

            DB::table('orders')->where('user_id', '=', $user->id)->delete();
            
            $user->delete();
        });
       
        return redirect()->back();
    }
}
