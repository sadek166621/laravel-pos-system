<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// -------- Employeer----------------

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-employeers', 'EmployeersController@addemployeers')->name('add-employeers');
Route::get('/manage-employeers', 'EmployeersController@manageemployeers')->name('manage-employeers');
Route::get('/delete-employeer/{id}', 'EmployeersController@deleteemployeer')->name('delete-employeer');
Route::get('/edit-employeer/{id}', 'EmployeersController@editemployeer')->name('edit-employeer');
Route::get('/view-employeer/{id}', 'EmployeersController@viewemployeer')->name('view-employeer');
Route::post('incert-employeer', 'EmployeersController@incertemployeer')->name('incert-employeer');
Route::post('update-employeer', 'EmployeersController@updateemployeer')->name('update-employeer');



// ----------------- Customer---------------

Route::get('/add-customer', 'CustomerController@addcustomer')->name('add-customer');
Route::get('/manage-customer', 'CustomerController@managecustomer')->name('manage-customer');
Route::get('/edit-customer/{id}', 'CustomerController@editcustomer')->name('edit-customer');
Route::get('/delete-customer/{id}', 'CustomerController@deletecustomer')->name('delete-customer');
Route::post('/incert-customer', 'CustomerController@incertcustomer')->name('incert-customer');
Route::post('/update-customer', 'CustomerController@updatecustomer')->name('update-customer');

// ---------------- Suppliers -------------//

Route::get('/add-suppliers', 'SuppliersController@addsuppliers')->name('add-suppliers');
Route::get('/manage-suppliers', 'SuppliersController@managesuppliers')->name('manage-suppliers');
Route::get('/edit-suppliers/{id}', 'SuppliersController@editsuppliers')->name('edit-suppliers');
Route::get('/delete-suppliers/{id}', 'SuppliersController@deletesuppliers')->name('delete-suppliers');
Route::post('/incert-suppliers', 'SuppliersController@incertsuppliers')->name('incert-suppliers');
Route::post('/update-suppliers', 'SuppliersController@updatesuppliers')->name('update-suppliers');

// -------------- Categorys-----------------//

Route::get('/add-category', [
    'uses'          =>'CategoryController@index',
    'as'            =>'add-category',
]);
Route::post('/new-category', [
    'uses'          =>'CategoryController@saveCategory',
    'as'            =>'new-category',
]);
Route::get('/published-category/{id}',[
    'uses'  =>'CategoryController@publishedCategory',
    'as'    =>'published-category'
]);

Route::get('/unpublished-category/{id}',[
    'uses'  =>'CategoryController@unpublishedCategory',
    'as'    =>'unpublished-category'
]);
Route::get('/edit-category/{id}',[
    'uses'  =>'CategoryController@editCategory',
    'as'    =>'edit-category'
]);
Route::post('update-category',[
    'uses'  =>'CategoryController@updateCategory',
    'as'    =>'update-category'
]);

Route::get('/delete-category/{id}',[
    'uses'  =>'CategoryController@deleteCategory',
    'as'    =>'delete-category'
]);


//----------Start Products Module----------


Route::get('/add-product', [
    'uses'          =>'ProductController@addProduct',
    'as'            =>'add-product',
]);
Route::post('/new-product', [
    'uses'          =>'ProductController@saveProduct',
    'as'            =>'new-product',
]);
Route::get('/manage-product',[
    'uses'  =>'ProductController@manageProduct',
    'as'    =>'manage-product',
]);
Route::get('/edit-product/{id}',[
    'uses'  =>'ProductController@editProductInfo',
    'as'    =>'edit-product'
]);
Route::get('/view-product/{id}',[
    'uses'  =>'ProductController@viewProductInfo',
    'as'    =>'view-product'
]);
Route::post('/update-product',[
    'uses'  =>'ProductController@updateProductInfo',
    'as'    =>'update-product'
]);
Route::get('/delete-product/{id}',[
    'uses'  =>'ProductController@deleteProductInfo',
    'as'    =>'delete-product'
]);

//----------End Products Module----------





// ------- Excel Import and Export----------


Route::get('/import-product', 'ProductController@importproduct')->name('import-product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import')->name('import');



// ------End Import and Export---------





// ------------ Expense-----------

Route::get('/add-expense', 'ExpenseController@addexpense')->name('add-expense');
Route::get('/today-expense', 'ExpenseController@todayexpense')->name('today-expense');
Route::get('/month-expense', 'ExpenseController@monthexpense')->name('month-expense');
Route::get('/year-expense', 'ExpenseController@yearexpense')->name('year-expense');
Route::get('/-oneyr-expense', 'ExpenseController@oneyrexpense')->name('-oneyr-expense');
Route::get('/-twoyr-expense', 'ExpenseController@twoyrexpense')->name('-twoyr-expense');
Route::get('/all-expense', 'ExpenseController@allexpense')->name('all-expense');
Route::get('/edit-expense/{id}', 'ExpenseController@editexpense')->name('edit-expense');
Route::get('/delete-expense/{id}', 'ExpenseController@deleteexpense')->name('delete-expense');
Route::post('/incert-expense', 'ExpenseController@incertexpense')->name('incert-expense');
Route::post('/update-expense', 'ExpenseController@updateexpense')->name('update-expense');

Route::get('jan-expense', 'ExpenseController@janexpense')->name('jan-expense');
Route::get('feb-expense', 'ExpenseController@febexpense')->name('feb-expense');
Route::get('mar-expense', 'ExpenseController@marexpense')->name('mar-expense');
Route::get('apl-expense', 'ExpenseController@aplexpense')->name('apl-expense');
Route::get('may-expense', 'ExpenseController@mayexpense')->name('may-expense');
Route::get('jun-expense', 'ExpenseController@junexpense')->name('jun-expense');
Route::get('july-expense', 'ExpenseController@julyexpense')->name('july-expense');
Route::get('aug-expense', 'ExpenseController@augexpense')->name('aug-expense');
Route::get('sep-expense', 'ExpenseController@sepexpense')->name('sep-expense');
Route::get('oct-expense', 'ExpenseController@octexpense')->name('oct-expense');
Route::get('nov-expense', 'ExpenseController@novexpense')->name('nov-expense');
Route::get('dec-expense', 'ExpenseController@decexpense')->name('dec-expense');


// ---------------Attendance--------------

Route::get('add-attendance', 'AttendanceController@addattendance')->name('add-attendance');
Route::get('manage-attendance', 'AttendanceController@manageattendance')->name('manage-attendance');
Route::get('edit-attendance/{id}', 'AttendanceController@editattendance')->name('edit-attendance');
Route::get('view-attendance/{emp_id}', 'AttendanceController@viewattendance')->name('view-attendance');
Route::post('insent-attendace', 'AttendanceController@insertattendance')->name('insent-attendace');
Route::post('update-attendace', 'AttendanceController@updateattendance')->name('update-attendace');


// --------- Pos----------

Route::get('pos', 'PosController@pos')->name('pos');
Route::post('pos-customer', 'PosController@poscustomer')->name('pos-customer');
Route::get('/show-cat-pro/{id}', 'PosController@showcatpro')->name('show-cat-pro');
Route::post('/invoice', 'PosController@invoice')->name('invoice');
Route::post('/final-invoice', 'PosController@finalinvoice')->name('final-invoice');



// -------- Cart ------------

Route::post('/incert-cart', 'CartController@incertcart')->name('incert-cart');
Route::post('/cart-update', 'CartController@cartupdate')->name('cart-update');
Route::get('/remove-Cart/{id}', 'CartController@removeCart')->name('remove-Cart');


// --------- Orders-----------

Route::get('all-orders', 'OrdersController@allorders')->name('all-orders');
Route::get('due-orders', 'OrdersController@dueorders')->name('due-orders');
Route::get('view-order/{id}', 'OrdersController@vieworder')->name('view-order');

