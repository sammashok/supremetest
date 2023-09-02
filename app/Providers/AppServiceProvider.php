<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();

        $this->registerMigrationMacros();
        $this->registerApiResponseMacro();
        $this->registerCarbonMacro();
        $this->registerCustomBladeDirectives();
    }

    /**
     * Creates a Response macro for API json responses having a standard format;
     */
    public function registerApiResponseMacro(): void
    {
        Response::macro('api', function (string $message, $data = [], $status = 200, array $headers = []) {
            return response()->json(['message' => $message, 'data' => $data], $status, $headers);
        });
    }

    /**
     * Creates a Carbon macro for greetings at different hours of the day;
     */
    public function registerCarbonMacro()
    {
        Carbon::macro('greet', fn () => match (true) {
            ($hour = now()->format('H')) < 12 => 'Morning',
            $hour < 17 => 'Afternoon',
            default    => 'Evening'
        });
    }

    /**
     * Creates a Blueprint macro for authors when database migrations;
     */
    public function registerMigrationMacros()
    {
        Blueprint::macro('authors', function () {
            $this->foreignId('created_by')->nullable()->constrained('users');
            $this->foreignId('updated_by')->nullable()->constrained('users');
        });
    }

    public function registerCustomBladeDirectives()
    {
        Blade::if('admin', function (?User $user = null) {
            return ($user ?? user())->isAdmin();
        });

        Blade::if('customer', function (?User $user = null) {
            return ($user ?? user())->isCustomer();
        });
    }
}
