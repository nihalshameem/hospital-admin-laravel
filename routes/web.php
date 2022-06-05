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

/* Route::get('/', function () {
return view('welcome');
}); */

Route::get('/dashboard_1', 'App\Http\Controllers\EresadminController@dashboard_1');
Route::get('/index', 'App\Http\Controllers\EresadminController@dashboard_1');
Route::get('/doctor-detail', 'App\Http\Controllers\EresadminController@doctor_detail');
Route::get('/doctor-list', 'App\Http\Controllers\EresadminController@doctor_list');
Route::get('/page-review', 'App\Http\Controllers\EresadminController@review');
Route::get('/patient-details', 'App\Http\Controllers\EresadminController@patient_details');
Route::get('/patient-list', 'App\Http\Controllers\EresadminController@patient_list');
Route::get('/app-calender', 'App\Http\Controllers\EresadminController@app_calender');
Route::get('/app-profile', 'App\Http\Controllers\EresadminController@app_profile');
Route::get('/chart-chartist', 'App\Http\Controllers\EresadminController@chart_chartist');
Route::get('/chart-chartjs', 'App\Http\Controllers\EresadminController@chart_chartjs');
Route::get('/chart-flot', 'App\Http\Controllers\EresadminController@chart_flot');
Route::get('/chart-morris', 'App\Http\Controllers\EresadminController@chart_morris');
Route::get('/chart-peity', 'App\Http\Controllers\EresadminController@chart_peity');
Route::get('/chart-sparkline', 'App\Http\Controllers\EresadminController@chart_sparkline');
Route::get('/ecom-checkout', 'App\Http\Controllers\EresadminController@ecom_checkout');
Route::get('/ecom-customers', 'App\Http\Controllers\EresadminController@ecom_customers');
Route::get('/ecom-invoice', 'App\Http\Controllers\EresadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'App\Http\Controllers\EresadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'App\Http\Controllers\EresadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'App\Http\Controllers\EresadminController@ecom_product_list');
Route::get('/ecom-product-order', 'App\Http\Controllers\EresadminController@ecom_product_order');
Route::get('/email-compose', 'App\Http\Controllers\EresadminController@email_compose');
Route::get('/email-inbox', 'App\Http\Controllers\EresadminController@email_inbox');
Route::get('/email-read', 'App\Http\Controllers\EresadminController@email_read');
Route::get('/form-editor-summernote', 'App\Http\Controllers\EresadminController@form_editor_summernote');
Route::get('/form-element', 'App\Http\Controllers\EresadminController@form_element');
Route::get('/form-pickers', 'App\Http\Controllers\EresadminController@form_pickers');
Route::get('/form-validation-jquery', 'App\Http\Controllers\EresadminController@form_validation_jquery');
Route::get('/form-wizard', 'App\Http\Controllers\EresadminController@form_wizard');
Route::get('/map-jqvmap', 'App\Http\Controllers\EresadminController@map_jqvmap');
Route::get('/page-error-400', 'App\Http\Controllers\EresadminController@page_error_400');
Route::get('/page-error-403', 'App\Http\Controllers\EresadminController@page_error_403');
Route::get('/page-error-404', 'App\Http\Controllers\EresadminController@page_error_404');
Route::get('/page-error-500', 'App\Http\Controllers\EresadminController@page_error_500');
Route::get('/page-error-503', 'App\Http\Controllers\EresadminController@page_error_503');
Route::get('/page-forgot-password', 'App\Http\Controllers\EresadminController@page_forgot_password');
Route::get('/page-lock-screen', 'App\Http\Controllers\EresadminController@page_lock_screen');
Route::get('/page-login', 'App\Http\Controllers\EresadminController@page_login');
Route::get('/page-register', 'App\Http\Controllers\EresadminController@page_register');
Route::get('/table-bootstrap-basic', 'App\Http\Controllers\EresadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'App\Http\Controllers\EresadminController@table_datatable_basic');
Route::get('/uc-lightgallery', 'App\Http\Controllers\EresadminController@uc_lightgallery');
Route::get('/uc-nestable', 'App\Http\Controllers\EresadminController@uc_nestable');
Route::get('/uc-noui-slider', 'App\Http\Controllers\EresadminController@uc_noui_slider');
Route::get('/uc-select2', 'App\Http\Controllers\EresadminController@uc_select2');
Route::get('/uc-sweetalert', 'App\Http\Controllers\EresadminController@uc_sweetalert');
Route::get('/uc-toastr', 'App\Http\Controllers\EresadminController@uc_toastr');
Route::get('/ui-accordion', 'App\Http\Controllers\EresadminController@ui_accordion');
Route::get('/ui-alert', 'App\Http\Controllers\EresadminController@ui_alert');
Route::get('/ui-badge', 'App\Http\Controllers\EresadminController@ui_badge');
Route::get('/ui-button', 'App\Http\Controllers\EresadminController@ui_button');
Route::get('/ui-button-group', 'App\Http\Controllers\EresadminController@ui_button_group');
Route::get('/ui-card', 'App\Http\Controllers\EresadminController@ui_card');
Route::get('/ui-carousel', 'App\Http\Controllers\EresadminController@ui_carousel');
Route::get('/ui-dropdown', 'App\Http\Controllers\EresadminController@ui_dropdown');
Route::get('/ui-grid', 'App\Http\Controllers\EresadminController@ui_grid');
Route::get('/ui-list-group', 'App\Http\Controllers\EresadminController@ui_list_group');
Route::get('/ui-media-object', 'App\Http\Controllers\EresadminController@ui_media_object');
Route::get('/ui-modal', 'App\Http\Controllers\EresadminController@ui_modal');
Route::get('/ui-pagination', 'App\Http\Controllers\EresadminController@ui_pagination');
Route::get('/ui-popover', 'App\Http\Controllers\EresadminController@ui_popover');
Route::get('/ui-progressbar', 'App\Http\Controllers\EresadminController@ui_progressbar');
Route::get('/ui-tab', 'App\Http\Controllers\EresadminController@ui_tab');
Route::get('/ui-typography', 'App\Http\Controllers\EresadminController@ui_typography');
Route::get('/widget-basic', 'App\Http\Controllers\EresadminController@widget_basic');
Auth::routes();

// Admin Dashboard
Route::get('/home', 'App\Http\Controllers\HomeController@dashboard_1')->name('home');

// mother register
Route::get('/patient', 'App\Http\Controllers\Admin\PatientsController@patient_list');
Route::get('/patient/add', 'App\Http\Controllers\Admin\PatientsController@patient_add');
Route::post('/patient/add', 'App\Http\Controllers\Admin\PatientsController@patient_add_submit');
Route::get('/patient/{id}', 'App\Http\Controllers\Admin\PatientsController@patient_edit');
Route::post('/patient/{id}', 'App\Http\Controllers\Admin\PatientsController@patient_update');
Route::get('/patient/delete/{id}', 'App\Http\Controllers\Admin\PatientsController@patient_delete');

// mother register
Route::get('/mother-medical', 'App\Http\Controllers\Admin\PatientsController@mother_medical_list');
Route::get('/patient/mother-medical/{id}', 'App\Http\Controllers\Admin\PatientsController@mother_medical');
Route::post('/patient/mother-medical/{id}', 'App\Http\Controllers\Admin\PatientsController@mother_medical_update');
Route::get('/patient/mother-medical/delete/{id}', 'App\Http\Controllers\Admin\PatientsController@patient_mother_medical_delete');

// an mother visits
Route::get('/an-mother-visit', 'App\Http\Controllers\Admin\PatientsController@mother_visit_list');
Route::get('/patient/an-mother-visit/{id}', 'App\Http\Controllers\Admin\PatientsController@mother_visit');
Route::post('/patient/an-mother-visit/{id}', 'App\Http\Controllers\Admin\PatientsController@mother_visit_add');
Route::get('/patient/mother-visit/edit/{id}', 'App\Http\Controllers\Admin\PatientsController@mother_visit_edit');
Route::post('/patient/mother-visit/edit/{id}', 'App\Http\Controllers\Admin\PatientsController@mother_visit_update');
Route::get('/patient/mother-visit/delete/{id}', 'App\Http\Controllers\Admin\PatientsController@patient_mother_visit_delete');


// upload
Route::get('/mother-upload', 'App\Http\Controllers\Admin\PatientsController@mother_upload');
Route::post('/mother-upload', 'App\Http\Controllers\Admin\PatientsController@excel_upload');
Route::get('/hospital-upload', 'App\Http\Controllers\Admin\PatientsController@hospital_upload');

// search 
Route::get('/search', 'App\Http\Controllers\Admin\PatientsController@search');

// Home Redirection
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return redirect('/login');
    }
});

// Cache Clearing
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return "Cache is cleared";
});
