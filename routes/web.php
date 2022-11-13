<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\allInfocardMaintain;
use App\Http\Controllers\infocardMaintain;
use App\Http\Controllers\adminController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\IEMSWebsite;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [IEMSWebsite::class, 'accessHome']); //access announcement table


// login

//ROUTE FOR Dashboard According to User////////////////////////////////////////////////////////////////////////

//for faculty//
//Route::get('/dashboard', [infocardMaintain::class, 'wildlife'])->name('facultyDashboard');

//for Admin//
//Route::get('/dashboard', [adminController::class, 'adminDashboard'])->name('adminDashboard');


//for student//
Route::get('/dashboard', [studentController::class, 'studentDashboard'])->name('studentDashboard');

//for guest//
Route::get('/dashboardGuest', [guestController::class, 'guestDashboard'])->name('guestDashboard');

//test//
//Route::get('/dashboard', [IEMSWebsite::class, 'accessAnnouncement'])->name('announcement');
//Route::get('/dashboard', [IEMSWebsite::class, 'accessHome'])->name('accessHome');


//for login/////////////////////

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

///////////////////////////
//ROUTE FOR FACULTY////////////////////////////////////////////////////////////////////////////////////////////////
Route::post('/store',[allInfocardMaintain::class,'storeDataWildlife'])->name('store');
Route::post('/storeBone',[allInfocardMaintain::class,'storeDataBone'])->name('storeDataBone');
Route::post('/storeDataRef',[allInfocardMaintain::class,'storeDataRef'])->name('storeDataRef');
Route::post('/storeThesis',[allInfocardMaintain::class,'storeDataThesis'])->name('storeThesis');
Route::post('/storeJournal',[allInfocardMaintain::class,'storeDataJournal'])->name('storeJournal');

//for musuem//////////////////////////////////////////////////////////////////////////
Route::get('/wildlife',[infocardMaintain::class, 'wildlife'])->name('wildlife');
Route::get('/boneCollection',[infocardMaintain::class, 'boneCollection'])->name('boneCollection');
Route::post('/updateBone/{info_ID}',[infocardMaintain::class, 'updateBone'])->name('updateBone');
Route::post('/updateRef/{info_ID}',[infocardMaintain::class, 'updateRef'])->name('updateRef');
Route::get('/refCollection',[infocardMaintain::class, 'refCollection'])->name('refCollection');
////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/showWildlife/{info_ID}',[infocardMaintain::class, 'showWildlife'])->name('showWildlife');
Route::get('/editWildlife/{info_ID}',[infocardMaintain::class, 'editWildlife'])->name('editWildlife');
Route::post('/updateWildlife/{info_ID}',[infocardMaintain::class, 'updateWildlife'])->name('updateWildlife');
Route::get('/deleteWildlife/{info_ID}',[infocardMaintain::class, 'deleteWildlife'])->name('deleteWildlife');
Route::get('/searchWildlife',[infocardMaintain::class, 'searchWildlife'])->name('searchWildlife');
Route::get('/advanceSearchWildlife',[infocardMaintain::class, 'advanceSearchWildlife'])->name('advanceSearchWildlife');

Route::get('/thesis_paper',[infocardMaintain::class, 'thesis'])->name('thesis');
Route::get('/gradThesis_paper',[infocardMaintain::class, 'gradThesis'])->name('gradThesis');
Route::get('/undergradThesis_paper',[infocardMaintain::class, 'undergradThesis'])->name('undergradThesis');
Route::get('/showThesis/{info_ID}',[infocardMaintain::class, 'showThesis'])->name('showThesis');
Route::get('/editThesis/{info_ID}',[infocardMaintain::class, 'editThesis'])->name('editThesis');
Route::post('/updateThesis/{info_ID}',[infocardMaintain::class, 'updateThesis'])->name('updateThesis');
Route::get('/deleteThesis/{info_ID}',[infocardMaintain::class, 'deleteThesis'])->name('deleteThesis');
Route::get('/searchThesis',[infocardMaintain::class, 'searchThesis'])->name('searchThesis');
Route::get('/advanceSearchThesis',[infocardMaintain::class, 'advanceSearchThesis'])->name('advanceSearchThesis');


Route::get('/journal_article',[infocardMaintain::class, 'journal'])->name('journal');
Route::get('/showJournal/{info_ID}',[infocardMaintain::class, 'showJournal'])->name('showJournal');
Route::get('/editJournal/{info_ID}',[infocardMaintain::class, 'editJournal'])->name('editJournal');
Route::post('/updateJournal/{info_ID}',[infocardMaintain::class, 'updateJournal'])->name('updateJournal');
Route::get('/deleteJournal/{info_ID}',[infocardMaintain::class, 'deleteJournal'])->name('deleteJournal');
Route::get('/searchJournal',[infocardMaintain::class, 'searchJournal'])->name('searchJournal');
Route::get('/advanceSearchJournal',[infocardMaintain::class, 'advanceSearchJournal'])->name('advanceSearchJournal');


Route::get('/profile',[infocardMaintain::class, 'Fprofile'])->name('Fprofile');
Route::get('/analytics',[infocardMaintain::class, 'analysis'])->name('analysis');


Route::get('/requestValidation',[infocardMaintain::class, 'request'])->name('Faculty_request');
Route::post('/updateAnnouncementF/{id}',[infocardMaintain::class, 'updateAnnoF'])->name('updateAnnoF');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//ROUTE FOR Admin////////////////////////////////////////////////////////////////////////////////////////////////
//for storing user information
Route::post('/storeUser',[adminController::class, 'storeUserInfo'])->name('storeUserInfo');
//for editing user information
Route::post('/updateUser/{id}',[adminController::class, 'updateUser'])->name('updateUser');
//for deleting user information
Route::get('/deleteUser/{id}',[adminController::class, 'deleteUser'])->name('deleteUser');
//for returning admin view
Route::get('/AdminAccounts', [adminController::class, 'adminAccounts'])->name('adminAccounts');
//for returning faculty view
Route::get('/facultyAccounts', [adminController::class, 'adminFacultyAccounts'])->name('adminFacultyAccounts');
//for returning Student view
Route::get('/studentAccounts', [adminController::class, 'adminStudentAccounts'])->name('adminStudentAccounts');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//FOR STUDENTS/////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/S_boneCollection',[studentController::class, 'boneCollection'])->name('S_boneCollection');
Route::get('/S_refCollection',[studentController::class, 'refCollection'])->name('S_refCollection');
Route::get('/thesis_papers',[studentController::class, 'thesis'])->name('Student_thesis');
Route::get('/S_gradThesis_paper',[studentController::class, 'gradThesis'])->name('S_gradThesis');
Route::get('/S_undergradThesis_paper',[studentController::class, 'undergradThesis'])->name('S_undergradThesis');
Route::get('/journal_articles',[studentController::class, 'journal'])->name('Student_journal');
Route::get('/request',[studentController::class, 'request'])->name('Student_request');
Route::post('/storeRequest',[studentController::class, 'storeAnno'])->name('storeAnno');
Route::post('/updateAnnouncement/{id}',[studentController::class, 'updateAnno'])->name('updateAnno');
//for deleting announcement information
Route::get('/deleteAnnouncement/{id}',[studentController::class, 'deleteAnno'])->name('deleteAnno');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//FOR GUEST///////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/G_thesis_papers',[guestController::class, 'thesis'])->name('Guest_thesis');
Route::get('/G_gradThesis_paper',[guestController::class, 'gradThesis'])->name('G_gradThesis');
Route::get('/G_undergradThesis_paper',[guestController::class, 'undergradThesis'])->name('G_undergradThesis');
Route::get('/G_journal_articles',[guestController::class, 'journal'])->name('Guest_journal');
Route::get('/G_boneCollection',[guestController::class, 'boneCollection'])->name('G_boneCollection');
Route::get('/G_refCollection',[guestController::class, 'refCollection'])->name('G_refCollection');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//FOR SITE /////////////////////////////////////////
Route::get('/college',[IEMSWebsite::class, 'accessCollege']);
Route::get('/enrollment',[IEMSWebsite::class, 'accessEnrollment']);
Route::get('/facilities',[IEMSWebsite::class, 'accessFacilities']);
Route::get('/linus',[IEMSWebsite::class, 'accessLinus']);
Route::get('/rates',[IEMSWebsite::class, 'accessRates']);

Route::get('/facultystaff',[IEMSWebsite::class, 'accessFacultyStaff']); //access faculty table
Route::get('/announcement',[IEMSWebsite::class, 'accessAnnouncement']); //access announcement table
Route::get('/announcementDisplay/{anno_ID}',[IEMSWebsite::class, 'accessAnnouncementDisplay'])->name('accessAnnouncementDisplay'); // access announcement

Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact-us.store');

require __DIR__.'/auth.php';



