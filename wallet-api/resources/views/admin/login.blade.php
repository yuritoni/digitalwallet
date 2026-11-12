<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Admin Login</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="min-h-screen bg-gradient-to-br from-slate-950 via-indigo-950 to-sky-950 flex items-center justify-center p-4">
<div class="w-full max-w-md rounded-[2rem] bg-white/95 p-8 shadow-2xl">
    <div class="text-center mb-8"><div class="mx-auto w-16 h-16 rounded-3xl bg-indigo-600 text-white flex items-center justify-center text-3xl">💳</div><h1 class="mt-5 text-3xl font-black">Admin Wallet</h1><p class="text-slate-500">Login untuk mengelola transaksi</p></div>
    @if(session('error'))<div class="mb-4 rounded-2xl bg-rose-100 text-rose-700 p-4 font-bold">{{ session('error') }}</div>@endif
    <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">@csrf
        <div><label class="font-bold text-sm">Email</label><input name="email" value="{{ old('email','admin@wallet.test') }}" class="mt-1 w-full rounded-2xl border p-4" required></div>
        <div><label class="font-bold text-sm">Password</label><input name="password" type="password" value="password" class="mt-1 w-full rounded-2xl border p-4" required></div>
        <button class="w-full rounded-2xl bg-indigo-600 text-white p-4 font-black hover:bg-indigo-700">Masuk Admin</button>
    </form>
</div></body></html>
