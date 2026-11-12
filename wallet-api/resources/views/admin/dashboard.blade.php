@extends('admin.layouts.app')
@section('title','Dashboard') @section('page_title','Dashboard')
@section('content')
<div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
 @foreach([['👥','Total User',number_format($stats['users'])],['💰','Total Saldo',rupiah($stats['total_balance'])],['⏳','Top Up Pending',number_format($stats['pending_topups'])],['📈','Transaksi',number_format($stats['transactions'])]] as $c)
 <div class="rounded-[2rem] bg-white p-6 shadow-soft"><div class="text-3xl">{{ $c[0] }}</div><div class="mt-4 text-sm text-slate-500 font-bold">{{ $c[1] }}</div><div class="text-3xl font-black">{{ $c[2] }}</div></div>
 @endforeach
</div>
<div class="grid xl:grid-cols-2 gap-6">
 <div class="rounded-[2rem] bg-white p-6 shadow-soft"><div class="font-black text-xl mb-4">Top Up Terbaru</div>@forelse($latestTopups as $t)<div class="flex justify-between border-b py-3"><div><div class="font-bold">{{ $t->user->name ?? '-' }}</div><div class="text-sm text-slate-500">{{ $t->reference_no }}</div></div><div class="text-right"><div class="font-black">{{ rupiah($t->amount) }}</div><span class="text-xs rounded-full px-3 py-1 ring-1 {{ badge_class($t->status) }}">{{ $t->status }}</span></div></div>@empty<div class="text-slate-500">Belum ada top up.</div>@endforelse</div>
 <div class="rounded-[2rem] bg-white p-6 shadow-soft"><div class="font-black text-xl mb-4">Transaksi Terbaru</div>@forelse($latestTransactions as $x)<div class="flex justify-between border-b py-3"><div><div class="font-bold">{{ $x->user->name ?? '-' }}</div><div class="text-sm text-slate-500">{{ $x->type }} · {{ $x->reference_no }}</div></div><div class="font-black">{{ rupiah($x->amount) }}</div></div>@empty<div class="text-slate-500">Belum ada transaksi.</div>@endforelse</div>
</div>
@endsection
