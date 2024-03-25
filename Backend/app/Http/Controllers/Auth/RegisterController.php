<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Customer; // Add this line to include the Customer model
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\RegistrationCode;


class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    // Conditional rule for the registration code
    if (!empty($data['registration_code'])) {
        $rules['registration_code'] = [
            'string',
            function ($attribute, $value, $fail) use ($data) {  // Use the 'use' keyword to inherit variables from the parent scope
                $registrationCode = RegistrationCode::where('code', $value)
                                                    ->where('expires_at', '>', now())
                                                    ->where('used', false)
                                                    ->first();
                if (!$registrationCode) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }
        ];
    }

    return Validator::make($data, $rules);
}


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function create(array $data)
    {
        $registrationCode = null;
        $isAdmin = false;

        if (!empty($data['registration_code'])) {
        $registrationCode = RegistrationCode::where('code', $data['registration_code'])
                                         ->where('expires_at', '>', now())
                                         ->where('used', false)
                                         ->first();

    if (!$registrationCode) {
        return redirect()->back()->withInput()->withErrors(['registration_code' => 'Invalid registration code.']);
    }

    $registrationCode->used = true;
    $registrationCode->save();
}
        if ($registrationCode) {
        $isAdmin = true; // Or set it based on any condition you have for admin registration
    }

        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_as' => $isAdmin ? 1 : 0, // Set 'role_as' to 1 if isAdmin is true, otherwise set to 0
        ]);
    
        // Create a record in the customers table
        $user = new Customer();
        $user->FirstName = $user->name;
        $user->Email = $user->email;
        // No need to set LastName, it's handled by the model
        $user->save();
    
        return $user;
    }
}
