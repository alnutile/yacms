<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        //        $paymentsCount = collect(range(0, 6))->map(function ($daysAgo) {
        //            $date = Carbon::now()->subDays($daysAgo);
        //
        //            return Payment::whereDate('payment_completed_at', $date)->count();
        //        })->reverse();
        //
        //        $paymentsSums = collect(range(0, 6))->map(function ($daysAgo) {
        //            $date = Carbon::now()->subDays($daysAgo);
        //
        //            return Payment::whereDate('payment_completed_at', $date)->sum('amount');
        //        })->reverse();
        //        $sumFormatted = '$'.$paymentsSums->sum() / 100;
        //
        //        return [
        //            Stat::make('Payments', $paymentsCount->count())
        //                ->description('Payments Last 7 Days')
        //                ->descriptionIcon('heroicon-m-arrow-trending-up')
        //                ->chart($paymentsCount->toArray())
        //                ->color('success'),
        //
        //            Stat::make('Payments Sums', $sumFormatted)
        //                ->description('Payments Sums Last 7 Days')
        //                ->descriptionIcon('heroicon-m-arrow-trending-up')
        //                ->chart($paymentsSums->toArray())
        //                ->color('success'),
        //        ];

        return [];
    }
}
