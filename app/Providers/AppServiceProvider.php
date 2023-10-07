<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('guest', function () {
            return "<?php if(!auth()->guard('web')->check()): ?>";
        });
    
        Blade::directive('endguest', function () {
            return '<?php endif; ?>';
        });
    }
}
