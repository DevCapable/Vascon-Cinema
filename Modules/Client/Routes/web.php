    <?php

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    use Nwidart\Modules\Facades\Module;
    use Illuminate\Support\Facades\Route;
    use Modules\Client\Http\Controllers\ClientController as clintController;

    Route::prefix('client')->group(function () {
            Route::get('/', 'ClientController@index');
            Route::get('lekkiCinema', [clintController::class, 'lekkiCinema'])->name('lekkiCinema');

        // get ikeja publication page
            Route::get('ikejaCinema', [clintController::class, 'ikejaCinema'])->name('ikejaCinema');

        // get Ajah publication page
            Route::get('ajahCinema', [clintController::class, 'ajahCinema'])->name('ajahCinema');

        // get contact us page
            Route::get('contactUs', [clintController::class, 'contactUs'])->name('contactUs');

        // get about us page
            Route::get('aboutUs', [clintController::class, 'aboutUs'])->name('aboutUs');

        // read ajah Cinema
            Route::get('read-ajahCinema/{id}', [clintController::class, 'readAjahCinema'])->name('read-ajahCinema');
        // read ikeja Cinema
            Route::get('read-ikejaCinema/{id}', [clintController::class, 'readIkejaCinema'])->name('read-ikejaCinema');

        // read lekki Cinema
            Route::get('read-lekkiCinema/{id}', [clintController::class, 'readLekkiCinema'])->name('read-lekkiCinema');

    });
