<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>@yield('title','Admin Wallet')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{boxShadow:{soft:'0 20px 60px rgba(15,23,42,.10)'}}}}</script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
<div class="flex min-h-screen">
    <aside class="hidden lg:flex w-72 flex-col bg-slate-950 text-white p-6">
        <div class="text-2xl font-black">Wallet Admin</div><div class="text-sm text-slate-400 mt-1">Digital Wallet Control</div>
        <nav class="mt-10 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block rounded-2xl px-4 py-3 hover:bg-white/10">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="block rounded-2xl px-4 py-3 hover:bg-white/10">Users</a>
            <a href="{{ route('admin.topups.index') }}" class="block rounded-2xl px-4 py-3 hover:bg-white/10">Top Up</a>
            <a href="{{ route('admin.transactions.index') }}" class="block rounded-2xl px-4 py-3 hover:bg-white/10">Transactions</a>
        </nav>
        <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto">@csrf<button class="w-full rounded-2xl bg-rose-500 px-4 py-3 font-bold">Logout</button></form>
    </aside>
    <main class="flex-1 p-4 sm:p-8">
        <div class="mb-6 flex items-center justify-between gap-4"><div><h1 class="text-2xl sm:text-4xl font-black">@yield('page_title','Dashboard')</h1><p class="text-slate-500 mt-1">Halo, {{ session('admin_user_name','Admin') }}</p></div></div>
        @if(session('success'))<div class="mb-5 rounded-2xl bg-emerald-100 text-emerald-700 p-4 font-bold">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="mb-5 rounded-2xl bg-rose-100 text-rose-700 p-4 font-bold">{{ session('error') }}</div>@endif
        @yield('content')
    </main>
</div>
</body>
</html>
