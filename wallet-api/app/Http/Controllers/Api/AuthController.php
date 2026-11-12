<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller; use App\Models\User; use Illuminate\Http\Request; use Illuminate\Support\Facades\Hash; use Illuminate\Support\Facades\DB;
class AuthController extends Controller{
 public function register(Request $request){$data=$request->validate(['name'=>'required','email'=>'required|email|unique:users','phone'=>'nullable','password'=>'required|min:6','pin'=>'required|min:4|max:8']);$user=DB::transaction(function()use($data){$u=User::create(['name'=>$data['name'],'email'=>$data['email'],'phone'=>$data['phone']??null,'password'=>Hash::make($data['password']),'pin'=>Hash::make($data['pin']),'role'=>'user']);$u->wallet()->create(['balance'=>0]);return $u;});$token=$user->createToken('mobile')->plainTextToken;return response()->json(['status'=>true,'message'=>'Register berhasil','token'=>$token,'user'=>$user]);}
 public function login(Request $request){$data=$request->validate(['email'=>'required|email','password'=>'required']);$user=User::where('email',$data['email'])->first();if(!$user||!Hash::check($data['password'],$user->password)){return response()->json(['status'=>false,'message'=>'Email/password salah'],422);} $token=$user->createToken('mobile')->plainTextToken;return response()->json(['status'=>true,'message'=>'Login berhasil','token'=>$token,'user'=>$user]);}
 public function profile(Request $request){return response()->json(['status'=>true,'user'=>$request->user()->load('wallet')]);}
 public function logout(Request $request){$request->user()->currentAccessToken()->delete();return response()->json(['status'=>true,'message'=>'Logout berhasil']);}
}
