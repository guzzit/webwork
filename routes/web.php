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

// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::get('/jobs/search', ['as'=>'/jobs/search', 'uses'=>'JobsController@search']);

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::get('/blog', 'PagesController@blog');

Route::resource('posts', 'PostsController');

Route::resource('jobs', 'JobsController');

Route::get('/users/{id}/{name}', function ($id, $name) {
    return "This is user ".$id." with the name ".$name;
});

Route::get('/employeeRegister', 'Auth\EmployeeRegController@showRegistration');

Route::post('/employeeRegister', 'Auth\EmployeeRegController@register')->name('employeeRegister');

Route::get('/employerRegister', 'Auth\EmployerRegController@showRegistration');

Route::post('/employerRegister', 'Auth\EmployerRegController@register')->name('employerRegister');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/employerDashboard', 'EmployerDashboardController@index');

Route::get('/employeeDashboard', 'EmployeeDashboardController@index');

Route::get('/employeeLogin', 'Auth\EmployeeLoginController@showLoginForm')->name('employeeLogin');

Route::post('employee_login', ['as'=>'employee_login','uses'=>'Auth\EmployeeLoginController@login']);

Route::post('/employeeLogout', 'Auth\EmployeeLoginController@logout')->name('employeeLogout');

Route::get('/employerLogin', 'Auth\EmployerLoginController@showLoginForm')->name('employerLogin');

Route::post('employer_login', ['as'=>'employer_login','uses'=>'Auth\EmployerLoginController@login']);

Route::post('/employerLogout', 'Auth\EmployerLoginController@logout')->name('employerLogout');



//Route::get('/?job_sector={job_sector}&city={city}&salary={salary}&highest_qualification={highest_qualificatin}&experience={experience}', 'JobsController@search');

// Route::get('logi',[
//     'middleware' => 'auth:employee',
//     'uses' => 'LoginController@login'
// ]);

// Route::get('/employeeRegister', function () {
//     return view('auth.employeeRegister');
// });

// Route::post('employeeRegister', function () {
//     return view('auth/employeeRegister');
// })->name('employeeRegister');



