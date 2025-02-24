<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //use ConsoleTVs\Charts\Registrar as Charts;
        //Charts $charts
        Schema::defaultStringLength(191);
        /*
        $charts->register([
            \App\Charts\UserQuiz::class,
            \App\Charts\GlobalQuizzes::class,
            \App\Charts\MonthlyUsers::class,
        ]);
        */
    }
}
