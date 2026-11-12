<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\User; use App\Models\Wallet; use App\Models\Topup; use App\Models\Transaction;
class DashboardController extends Controller{ public function index(){ $stats=['users'=>User::where('role','user')->count(),'total_balance'=>Wallet::sum('balance'),'pending_topups'=>Topup::where('status','pending')->count(),'transactions'=>Transaction::count()]; $latestTopups=Topup::with('user')->latest()->limit(5)->get(); $latestTransactions=Transaction::with('user')->latest()->limit(5)->get(); return view('admin.dashboard',compact('stats','latestTopups','latestTransactions')); }}
