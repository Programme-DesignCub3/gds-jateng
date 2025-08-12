<?php

namespace App\Http\Controllers\Auth;

use App\Enums\CompetitionList;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'instagram_account' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'string', 'max:20'], // Bisa kamu tambahkan validasi nomor telepon
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'school_name' => ['required', 'string', 'max:255'],
            'competition' => ['required', Rule::enum(CompetitionList::class)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        $validated = $request->validate($rules);

        $user = User::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'instagram_account' => $validated['instagram_account'],
            'phone_no' => $validated['phone_no'],
            'email' => $validated['email'],
            'school_name' => $validated['school_name'],
            'competition' => $validated['competition'],
            'password' => Hash::make($validated['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
