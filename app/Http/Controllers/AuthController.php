<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.connexion');
    }  
      
    public function customLogin(Request $request)

    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:4|',
            
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.inscription');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);
           
        $user = new User();
        $user->setAttribute('name', $request->name);
        $user->setAttribute('prenom', $request->prenom);
        $user->setAttribute('email', $request->email);
        $user->setAttribute('telephone', $request->telephone);
        $user->setAttribute('role_id',1 );
        $user->setAttribute('password', Hash::make($request->password));
        $user->save();

        return redirect("login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'prenom' => $data['prenom'],
        'email' => $data['email'],
        'telephone' => $data['telephone'],
        'role_id' => $data['role_id'],
        'password' => Hash::make($data['password']),
      ]);
      
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('backend.dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}