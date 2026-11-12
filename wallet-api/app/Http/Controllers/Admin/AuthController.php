<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\User; use Illuminate\Http\Request; use Illuminate\Support\Facades\Hash;
class AuthController extends Controller{
 public function showLogin(){return view('admin.login');}
 public function login(Request $request){$request->validate(['email'=>'required|email','password'=>'required']);$user=User::where('email',$request->email)->first();if(!$user||!Hash::check($request->password,$user->password)||$user->role!=='admin'){return back()->withInput()->with('error','Email/password admin salah.');} session(['admin_user_id'=>$user->id,'admin_user_name'=>$user->name]);return redirect()->route('admin.dashboard');}
 public function logout(Request $request){$request->session()->forget(['admin_user_id','admin_user_name']);$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('admin.login');}
}
