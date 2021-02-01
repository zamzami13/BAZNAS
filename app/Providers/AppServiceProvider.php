<?php

namespace App\Providers;

//tambahan karna error migrate create table
// use Illuminate\Support\Facedes\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Pengeluarandet;
use App\Penerimaandet;
use App\Daftbank;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //tambahan karna error migrate tabel
        // Schema::defaultStringLength(191);
        Blade::directive('rupiah', function ( $expression ) 
        { 
            return "<?php echo number_format($expression,2,',','.'); ?>"; 
        });        

    }
}

