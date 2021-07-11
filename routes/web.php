<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Admin.dashboard', 'Admin@admin')->name('AdminBoard');

// Update
// ****************
Route::get('/editEmail', 'editEmailController@edit')->name('edit');

Route::post('/update', 'editEmailController@update')->name('update');


//****************************************Admin part */

//categories
Route::get('/Admin.exam_category', 'Admin@exam_category')->name('exam_category');
Route::post('/Admin.addNewCategory', 'Admin@addNewCategory')->name('addNewCategory');
Route::get('/Admin.deleteCategory/{id}', 'Admin@deleteCategory')->name('deleteCategory');
Route::get('/Admin.editCategory/{id}', 'Admin@editCategory')->name('editCategory');
Route::post('/Admin.updateCategory', 'Admin@updateCategory')->name('updateCategory');
Route::get('/Admin.category_status/{id}', 'Admin@category_status')->name('category_status');

//exam masters
Route::get('/Admin.manage_exam', 'Admin@manage_exam')->name('manage_exam');
Route::post('/Admin.addNewExam', 'Admin@addNewExam')->name('addNewExam');
Route::get('/Admin.exam_status/{id}', 'Admin@exam_status')->name('exam_status');
Route::get('/Admin.delete_exam/{id}', 'Admin@delete_exam')->name('delete_exam');
Route::get('/Admin.edit_exam/{id}', 'Admin@edit_exam')->name('edit_exam');
Route::post('/Admin.update_exam', 'Admin@update_exam')->name('update_exam');

//question masters
Route::get('/Admin.add_question/{id}', 'Admin@add_question')->name('add_question');
Route::post('/Admin.addNewQuestion', 'Admin@addNewQuestion')->name('addNewQuestion');
Route::get('/Admin.question_status/{id}', 'Admin@question_status')->name('question_status');
Route::get('/Admin.delete_question/{id}', 'Admin@delete_question')->name('delete_question');
Route::get('/Admin.edit_question/{id}', 'Admin@edit_question')->name('edit_question');
Route::post('/Admin.updateQuestion', 'Admin@updateQuestion')->name('updateQuestion');


//students
Route::get('/Admin.students', 'Admin@students')->name('students');
Route::post('/Admin.add_students', 'Admin@add_students')->name('add_students');
Route::get('/Admin.student_status/{id}', 'Admin@student_status')->name('student_status');
Route::get('/Admin.delete_student/{id}', 'Admin@delete_student')->name('delete_student');
Route::get('/Admin.edit_student/{id}', 'Admin@edit_student')->name('edit_student');
Route::post('/Admin.update_student', 'Admin@update_student')->name('update_student');

//manage Portal in admin
Route::get('/Admin.manage_portal', 'Admin@manage_portal')->name('manage_portal');
Route::post('/Admin.add_portal', 'Admin@add_portal')->name('add_portal');
Route::get('/Admin.portal_status/{id}', 'Admin@portal_status')->name('portal_status');
Route::get('/Admin.delete_portal/{id}', 'Admin@delete_portal')->name('delete_portal');
Route::get('/Admin.edit_portal/{id}', 'Admin@edit_portal')->name('edit_portal');
Route::post('/Admin.update_portal', 'Admin@update_portal')->name('update_portal');

//****************************************portal part */
Route::get('/Portal.signUp', 'portalController@signUpPortal')->name('signUpPortal');
Route::post('/Portal.signUp_sub', 'portalController@signUp_sub')->name('signUp_sub');

Route::get('/Portal.loginPortal', 'portalController@loginPortal')->name('loginPortal');
Route::post('/Portal.login_sub', 'portalController@login_sub')->name('login_sub');

Route::get('/Portal.logoutPortal', 'portalController@logoutPortal')->name('logoutPortal');


Route::get('/Portal.dashboardPortal', 'portalController@dashboardPortal')->name('dashboardPortal');

Route::get('/Portal.exam_form/{id}', 'portalController@exam_form')->name('exam_form');
Route::post('/Portal.examForm_save', 'portalController@examForm_save')->name('examForm_save');
Route::get('/Portal.print/{id}', 'portalController@printPortal')->name('printPortal');

Route::get('/Portal.searchStudent', 'portalController@searchStudent')->name('searchStudent');
Route::get('/Portal.updateStudent', 'portalController@updateStudent')->name('updateStudent');
Route::post('/Portal.stdInfo_Update', 'portalController@stdInfo_Update')->name('stdInfo_Update');

//****************************************student part */

Route::get('/Student.loginStudent', 'studentController@loginStudent')->name('loginStudent');
Route::post('/Student.stdLogin_sub', 'studentController@stdLogin_sub')->name('stdLogin_sub');

Route::get('/Student.logoutStudent', 'studentController@logoutStudent')->name('logoutStudent');


Route::get('/Student.dashboardStudent', 'studentController@dashboardStudent')->name('dashboardStudent');

Route::get('/Student.Exams', 'studentController@Exams')->name('Exams');
// payment ***********************************************************
Route::get('/payForm', 'productController@show')->name('payForm');
Route::POST('/paypal', 'paypalController@index')->name('polpol');


Route::get('/product', 'paypalController@productReturn')->name('product_return');
Route::get('/canceld', 'paypalController@productCancel')->name('product_cancel');

// ***********************
Route::get('/Student.join_exam_form/{id}', 'studentController@join_exam_form')->name('join_exam_form');
Route::post('/Student.submit_exam', 'studentController@submit_exam')->name('submit_exam');
Route::get('/Student.show_result/{id}', 'studentController@show_result')->name('show_result');



                            //*********************** upload files */
Route::get('/Student.uploadPage', 'studentController@show_uploadPage')->name('uploadPage');
Route::post('/Student.uploadAction', 'studentController@uploadAction')->name('uploadAction');

Route::get('/Student.files', 'studentController@show_files')->name('files');

Route::get('/download/{abdo:file}', 'studentController@download')->name('download');

Route::get('/Student.files/{id}', 'studentController@view')->name('view');






















