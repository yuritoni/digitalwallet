<?php
namespace App\Http\Controllers\Api; use App\Http\Controllers\Controller; use Illuminate\Http\Request;
class TransactionController extends Controller{ public function index(Request $request){return response()->json(['status'=>true,'transactions'=>$request->user()->transactions()->latest()->paginate(20)]);}}
