<?php
namespace App\Http\Controllers\Admin; use App\Http\Controllers\Controller; use App\Models\User;
class UserController extends Controller{ public function index(){ $users=User::with('wallet')->latest()->paginate(10); return view('admin.users.index',compact('users')); } public function show(User $user){$user->load(['wallet','topups'=>fn($q)=>$q->latest()->limit(20),'transactions'=>fn($q)=>$q->latest()->limit(20)]);return view('admin.users.show',compact('user'));}}
