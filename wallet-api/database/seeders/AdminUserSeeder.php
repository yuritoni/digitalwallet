<?php
namespace Database\Seeders; use App\Models\User; use Illuminate\Database\Seeder; use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder { public function run(){ $admin=User::updateOrCreate(['email'=>'admin@wallet.test'],['name'=>'Super Admin','phone'=>'0800000000','password'=>Hash::make('password'),'pin'=>Hash::make('123456'),'role'=>'admin']); $admin->wallet()->firstOrCreate(['user_id'=>$admin->id],['balance'=>0]); } }
