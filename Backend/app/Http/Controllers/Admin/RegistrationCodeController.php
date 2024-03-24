<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegistrationCode;
use Carbon\Carbon;
use Illuminate\Support\Str;


class RegistrationCodeController extends Controller
{
    public function index()
    {
        $codes = RegistrationCode::all();
        return view('admin.code.index', compact('codes'));
    }

    public function create()
    {
        return view('admin.code.create');
    }

    public function store()
{
    $code = strtoupper(Str::random(10)); // Generate a random string
    $expires_at = Carbon::now()->addMinutes(2); // Set expiration time to 24 hours

    RegistrationCode::create([
        'code' => $code,
        'expires_at' => $expires_at,
    ]);

    return redirect()->route('admin.code.index');
}


    public function show($id)
    {
        $code = RegistrationCode::findOrFail($id);
        return view('admin.code.show', compact('code'));
    }

}
