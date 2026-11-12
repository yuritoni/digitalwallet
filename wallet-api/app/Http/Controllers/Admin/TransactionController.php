<?php
namespace App\Http\Controllers\Admin; use App\Http\Controllers\Controller; use App\Models\Transaction; use Illuminate\Http\Request;
class TransactionController extends Controller{ public function index(Request $request){$q=Transaction::with('user')->latest(); if($request->filled('type'))$q->where('type',$request->type); if($request->filled('status'))$q->where('status',$request->status); $transactions=$q->paginate(10)->withQueryString(); return view('admin.transactions.index',compact('transactions'));}}
