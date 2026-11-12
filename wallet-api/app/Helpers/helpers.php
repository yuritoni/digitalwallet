<?php

if (! function_exists('rupiah')) {
    function rupiah($amount): string
    {
        return 'Rp ' . number_format((float) ($amount ?? 0), 0, ',', '.');
    }
}

if (! function_exists('badge_class')) {
    function badge_class(?string $status): string
    {
        return match ($status) {
            'success' => 'bg-emerald-100 text-emerald-700 ring-emerald-200',
            'pending' => 'bg-amber-100 text-amber-700 ring-amber-200',
            'failed', 'rejected' => 'bg-rose-100 text-rose-700 ring-rose-200',
            default => 'bg-slate-100 text-slate-700 ring-slate-200',
        };
    }
}
