<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',                
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed'
            ]); 
    
            User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
    
            return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login kembali');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', $e->getMessage());
        }        
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            if (Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
    
            return back()->withErrors(['email' => 'email atau password salah']);
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error',$e->getMessage());
        }    
    }

    /**
     * Function: googleLogin
     * Description: Redirect to google
     * @param NA
     * @return void
     */
    public function googleLogin(){
        return Socialite::driver('google')->redirect();        
    }

    /**
     * Function: googleAuth
     * Description: Authenticate the user throug the google
     * @param NA
     * @return void
     */
    public function googleAuth(){
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();                                 
                        
            $googleUserData = $googleUser->getRaw();

            $firstName = $googleUserData['given_name'] ?? null;
            $lastName = $googleUserData['family_name'] ?? null;

            $user = User::where('google_id', $googleUser->id)->first();

            if($user){
                Auth::login($user);
                session()->regenerate();
                return redirect()->route('dashboard');
            }

            $userData = User::create([
                'name' => $googleUser->getName(),
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $googleUser->getEmail(),
                'password' => Hash::make(Str::password(10)),
                'role' => 'user',
                'google_id' => $googleUser->getId(),
            ]);

            if ($userData){
                Auth::login($userData);
                session()->regenerate();
                return redirect()->route('dashboard');
            }

        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTrace());
        }    
    }

    public function changePassword(Request $request, $id){
        $user = User::find($id);
        
        $validatedData = $request->validate([
            'current_password' => [
                'required|min:6',
                function($attribute, $value, $fail) use ($user){
                    if(!Hash::check($value, $user->password)){
                        $fail('The current password is incorrect');
                    }
                }
            ],
            'new_passord' => 'required|min:6|confirmed'
        ]);

        $validatedData['new_password'] = Hash::make($validatedData['new_password']);
                      
        $user->password = $validatedData['new_password'];            
        $user->save();

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('login'); 
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
