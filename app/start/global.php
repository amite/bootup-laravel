<?php



/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',
	app_path().'/libraries',
	app_path().'/helpers'
));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a rotating log file setup which creates a new file each day.
|
*/

$logFile = 'log-'.php_sapi_name().'.txt';

Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

App::error(function(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
{
    return Response::make('Not Found', 404);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenace mode is in effect for this application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Page not found
|--------------------------------------------------------------------------
|
*/
App::missing(function($exception)
{
	return Response::view('layouts.default', array('content' => View::make('404')), 404);
});

/*
|--------------------------------------------------------------------------
| Register event listener for database query
|-------------------------------------------------------------------------
*/
Event::listen('illuminate.query', function($query, $bindings, $time, $name)
{

	//If the pofiler is enabled
	if (Config::get("database.profile") == true) {

		//Build the profile string
		$string = $query . ' | ' . json_encode($bindings) . ' | ' . $time . ' | ' . $name;

		//Log the query into file
		File::append(storage_path() . '/logs/sql-' . date('Y-m-d') . '.log', date('Y-m-d H:i:s').' - ' . $string . PHP_EOL);
	}
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';