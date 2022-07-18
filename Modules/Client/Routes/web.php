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
    use Modules\Client\Http\Controllers\ClientController as clientController;

    Route::prefix('client')->group(function () {
            Route::get('/', 'ClientController@index');
            Route::get('lekkiCinema', [clientController::class, 'lekkiCinema'])->name('lekkiCinema');

        // get ikeja publication page
            Route::get('ikejaCinema', [clientController::class, 'ikejaCinema'])->name('ikejaCinema');

        // get Ajah publication page
            Route::get('ajahCinema', [clientController::class, 'ajahCinema'])->name('ajahCinema');

        // get contact us page
            Route::get('contactUs', [clientController::class, 'contactUs'])->name('contactUs');

        // get about us page
            Route::get('aboutUs', [clientController::class, 'aboutUs'])->name('aboutUs');

        // read ajah Cinema
            Route::get('read-ajahCinema/{id}', [clientController::class, 'readAjahCinema'])->name('read-ajahCinema');
        // read ikeja Cinema
            Route::get('read-ikejaCinema/{id}', [clientController::class, 'readIkejaCinema'])->name('read-ikejaCinema');

        // read lekki Cinema
            Route::get('read-lekkiCinema/{id}', [clientController::class, 'readLekkiCinema'])->name('read-lekkiCinema');

    });
