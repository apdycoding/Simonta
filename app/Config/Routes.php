<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');

$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/santri', 'Santri::index', ['filter' => 'auth']);
$routes->get('/santri/inactive', 'Santri::inactive', ['filter' => 'auth']);
$routes->get('/santri/create', 'Santri::add', ['filter' => 'auth']);
$routes->get('/santri/edit/(:num)', 'Santri::edit/$1', ['filter' => 'auth']);
$routes->delete('/santri/(:num)', 'Santri::trash/$1', ['filter' => 'auth']);
$routes->get('/santri/(:num)', 'Santri::detail/$1', ['filter' => 'auth']);

$routes->get('/santri/generate/(:num)', 'Santri::generate/$1', ['filter' => 'auth']);

// soft delete santri
$routes->delete('/santri/delete/(:num)', 'Santri::delete/$1', ['filter' => 'auth']);
$routes->get('santri/showData', 'Santri::showData', ['filter' => 'auth']);
$routes->get('santri/restore/(:any)', 'Santri::restore/$1', ['filter' => 'auth']);
$routes->get('santri/restore', 'Santri::restore', ['filter' => 'auth']);


// melihat softdelete guru
$routes->get('teacher/showData', 'Teacher::showData', ['filter' => 'auth']);
$routes->get('teacher/restore/(:any)', 'Teacher::restore/$1', ['filter' => 'auth']);
$routes->get('teacher/restore', 'Teacher::restore', ['filter' => 'auth']);
$routes->delete('teacher/deletePermanen/(:num)', 'Teacher::deletePermanen/$1', ['filter' => 'auth']);
// $routes->get('teacher/delete2', 'Teacher::delete2', ['filter' => 'auth']);

// ubah status santri
$routes->delete('/santri/status/(:num)', 'Santri::updateStatus/$1', ['filter' => 'auth']);
// $routes->group();

// menggunakan routes and resouce
$routes->presenter('teacher', ['filter' => 'auth']);
$routes->presenter('HafalanSurah', ['filter' => 'auth']);
$routes->get('/santri/groups/(:num)', 'Santri::groupData/$1', ['filter' => 'auth']);
$routes->get('/hadits/print/(:num)', 'hadits::eCertificat/$1', ['filter' => 'auth']);

$routes->get('/hadits/hafalanHadits/(:num)', 'hadits::hafalanHadits/$1', ['filter' => 'auth']);
$routes->get('/doa/hafalanDoa/(:num)', 'doa::hafalanDoa/$1', ['filter' => 'auth']);
// cetak sertifikat doa
$routes->get('/doa/serti/(:num)', 'Doa::cetak/$1', ['filter' => 'auth']);
$routes->get('/users/status/(:num)', 'Users::status/$1',  ['filter' => 'auth']);
$routes->get('/users/change/(:num)', 'Users::changePass/$1', ['filter' => 'auth']);

// ambil data dari ajax datahadits
$routes->get('/Datahadits/getDataSantri', 'Datahadits::getDataSantri', ['filter' => 'auth']);

// ambil data dari ajax datadoa
$routes->get('/Datadoa/getDatadoa', 'Datadoa::getDatadoa', ['filter' => 'auth']);

// inactive santri staff || role staff
$routes->get('/staff/Santristaff/inactive', 'Staff\Santristaff::inactive', ['filter' => 'auth']);

// ubah status aktif ke non aktif || role staff
$routes->post('/staff/Santristaff/change/(:num)', 'Staff\Santristaff::change/$1');

$routes->presenter('penguji', ['filter' => 'auth']);
$routes->presenter('hadits', ['filter' => 'auth']);
$routes->presenter('doa', ['filter' => 'auth']);
$routes->presenter('users', ['filter' => 'auth']);
$routes->presenter('profilesAdmin', ['filter' => 'auth']);
$routes->presenter('Datahadits', ['filter' => 'auth']);

// routes dhadits dan mhadits
$routes->presenter('admin/DHadits', ['filter' => 'auth']);
$routes->presenter('admin/Datahadits', ['filter' => 'auth']);

// routes report
$routes->presenter('admin/Reportsurah', ['filter' => 'auth']);

//export admin report hadits 
$routes->get('/admin/ReportHadits/export', 'Admin\ReportHadits::export', ['filter' => 'auth']);
// export doa
$routes->get('/admin/Reportdoa/export', 'Admin\Reportdoa::export', ['filter' => 'auth']);
// export santri
$routes->get('/admin/ReportSantri/export', 'Admin\ReportSantri::export', ['filter' => 'auth']);

$routes->resource('admin/ReportHadits', ['filter' => 'auth']);
$routes->resource('admin/ReportSantri', ['filter' => 'auth']);
$routes->resource('admin/Reportdoa', ['filter' => 'auth']);


// routes bagian staff || role staff
$routes->presenter('staff/Santristaff', ['filter' => 'auth']);
$routes->presenter('staff/guru', ['filter' => 'auth']);
$routes->presenter('staff/Ksekolah', ['filter' => 'auth']);
$routes->resource('staff/Profilestaff', ['filter' => 'auth']);

$routes->resource('staff/Datahadits', ['filter' => 'auth']);
// get getDataSantri
$routes->post('staff/Masterhadits/getDataSantri', 'Staff\Masterhadits::getDataSantri', ['filter' => 'auth']);
$routes->resource('staff/Masterhadits', ['filter' => 'auth']);

$routes->post('staff/Masterdoa/getDatadoa', 'Staff\Masterdoa::getDatadoa', ['filter' => 'auth']);
$routes->resource('staff/Datadoa', ['filter' => 'auth']);
$routes->resource('staff/Masterdoa', ['filter' => 'auth']);
$routes->resource('staff/Pengujis', ['filter' => 'auth']);

// cetak serti surah bagian staff
$routes->post('staff/Mastersurah/Eserti/(:num)', 'Staff\Mastersurah::Eserti/$1', ['filter' => 'auth']);
$routes->get('staff/Mastersurah/details/(:num)', 'Staff\Mastersurah::details/$1', ['filter' => 'auth']);
$routes->resource('staff/Mastersurah', ['filter' => 'auth']);

$routes->post('staff/Cetakhadits/print/(:num)', 'staff\Cetakhadits::print/$1',  ['filter' => 'auth']);
$routes->resource('staff/Cetakhadits', ['filter' => 'auth']);

// bagian dDoa
$routes->presenter('admin/Ddoa', ['filter' => 'auth']);
$routes->presenter('admin/Datadoa', ['filter' => 'auth']);

// bagian kepala sekolah
$routes->presenter('kepsek', ['filter' => 'auth']);

// bagian staff
$routes->presenter('staff', ['filter' => 'auth']);




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
