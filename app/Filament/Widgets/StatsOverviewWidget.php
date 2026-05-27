<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Visitor;
use App\Models\Article;
use Carbon\Carbon;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kunjungan Website', Visitor::count())
                ->description('Total dari semua IP address')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Stat::make('Kunjungan Hari Ini', Visitor::where('visited_date', Carbon::today()->toDateString())->count())
                ->description('Berdasarkan IP address unik hari ini')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            
            Stat::make('Total Artikel Dibaca', Article::sum('views') ?? 0)
                ->description('Total keseluruhan views')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('warning'),
        ];
    }
}
