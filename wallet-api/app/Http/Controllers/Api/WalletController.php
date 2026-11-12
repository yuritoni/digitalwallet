<?php
namespace App\Http\Controllers\Api; use App\Http\Controllers\Controller; use Illuminate\Http\Request;
class WalletController extends Controller{ public function show(Request $request){$wallet=$request->user()->wallet()->firstOrCreate(['user_id'=>$request->user()->id],['balance'=>0]);return response()->json(['status'=>true,'wallet'=>$wallet]);}}
