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
use Illuminate\Validation\Rules\Enum;
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
        $is_school_account = $request->input('is_school_account');
        // dd($request->competition, newEnum(CompetitionList::class));
        $base_rule = [
            'name' => 'required|string|max:255',
            'instagram_account' => 'required|string|max:50',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'phone_no' => ['required', 'phone:ID'],
            'is_school_account' => ['required', 'boolean'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'competition' => [new Enum(CompetitionList::class)]
        ];



        if ($is_school_account) {
            // school account
            $rule = array_merge($base_rule, [
                'school_name' => ['required', 'string', 'max:50', 'unique:' . User::class],
                'position' => ['required', 'string', 'max:50'],
                'area' => ['required', 'string', 'max:150']
            ]);
        } else {
            // personal account
            $rule = array_merge($base_rule, [
                'address' => ['required', 'string', 'max:255']
            ]);
        }

        $validated_request = $request->validate($rule);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'instagram_account' => $request->instagram_account,
            'school_name' => $request->school_name,
            'area' => $request->area,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'is_school_account' => $request->is_school_account,
            'competition' => $request->competition,
            'position' => $request->position,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
