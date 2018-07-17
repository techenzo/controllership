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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/purchasing', function () {
//     return view('pages.purchasing');
// });

// Route::get('/finance', function () {
//     return view('pages.finance');
// });

// Route::get('/create', function () {
//     return view('vendor.create');
// });


Route::get('/', 'PagesController@index');
Route::get('/finance', 'PagesController@finance');
Route::get('/purchasing', 'PagesController@purchasing');
Route::get('/purchasing/create', 'VendorsController@addvendor');
Route::get('/purchasing/search', 'VendorsController@searchvendor');



Route::get('/multiuploads', 'VendorsController@uploadForm');

Route::post('/upload', 'VendorsController@uploadSubmit');
Route::resource('vendor', 'VendorsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));



// Download Route
Route::get('download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = storage_path() .'/file/'. $filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\_\.]+');