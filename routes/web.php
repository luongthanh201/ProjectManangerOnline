<?php

use App\Events\MessageSent;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AprovalCotroller;
use App\Http\Controllers\Client\FeebbackClientController;
use App\Http\Controllers\Client\ProgressClientController;
use App\Http\Controllers\Member\ChatController;
use App\Http\Controllers\Member\DocumentMemberController;
use App\Http\Controllers\Member\InforMemberController;
use App\Http\Controllers\Member\ProgressMemBerController;
use App\Http\Controllers\Member\ReceivedNotifyCotroller;
use App\Http\Controllers\Member\TaskMemberController;
use App\Http\Controllers\ProjectMananger\DocumentController;
use App\Http\Controllers\ProjectMananger\ProgressController;
use App\Http\Controllers\ProjectMananger\ProjectController;
use App\Http\Controllers\ProjectMananger\ReportController;
use App\Http\Controllers\ProjectMananger\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Register
Route::get('/register_nguoidung', [AuthController::class, 'index'])->name('register');
Route::post('/register_nguoidung', [AuthController::class, 'register'])->name('register');
//Login
Route::get('/login_nguoidung', [AuthController::class, 'create'])->name('login_nguoidung');
Route::post('/login_nguoidung', [AuthController::class, 'login'])->name('login_nguoidung');
//logout
Route::post("/logout_acc", [AuthController::class, "logout"]);

//====================PROJECTMANANGER===================================//

//Trang Theo dõi tiến độ dự án
//list
Route::get('/track_progress_pm', [ProgressController::class, 'index'])->name('progress');
//edit
Route::get('/edit_progress/{id}', [ProgressController::class, 'edit'])->name('edit-progress');
Route::post('/edit_progress/{id}', [ProgressController::class, 'update'])->name('edit-progress');
//delete
Route::get('/delete_progress/{id}', [ProgressController::class, 'detroy'])->name('delete-progress');

//Trang quản lý dự án
//list
Route::get('/project_mananger', [ProjectController::class, 'index'])->name('project');
//add
Route::get('/add_project', [ProjectController::class, 'create'])->name('add_project');
Route::post('/add_project', [ProjectController::class, 'store'])->name('add_project');
//edit
Route::get('/edit_project/{id}', [ProjectController::class, 'edit'])->name('edit-project');
Route::post('/edit_project/{id}', [ProjectController::class, 'update'])->name('edit-project');
//delete
Route::get('/delete_project/{id}', [ProjectController::class, 'destroy'])->name('delete-project');

//Trang phân công công việc
//list
Route::get('/assign_work', [TaskController::class, 'index'])->name('assign_work');
//add
Route::get('/add_assign', [TaskController::class, 'create'])->name('add_assign');
Route::post('/add_assign', [TaskController::class, 'store'])->name('add_assign');
//edit
Route::get('/edit_assign/{id}', [TaskController::class, 'edit'])->name('edit-assign');
Route::post('/edit_assign/{id}', [TaskController::class, 'update'])->name('edit-assign');
//delete
Route::get('/delete_assign/{id}', [TaskController::class, 'destroy'])->name('delete-assign');

//Trang quản lý tài liệu
//list
Route::get('/document_mananger', [DocumentController::class, 'index'])->name('document');
//dowload
Route::get('/download_document/{id}', [TaskController::class, 'downloadDocument'])->name('download_document');

//Trang báo cáo
//list
Route::get('/report_mananger', [ReportController::class, 'index'])->name('report');
//add
Route::get('/add_report', [ReportController::class, 'create'])->name('add_report');
Route::post('/add_report', [ReportController::class, 'store'])->name('add_report');
//download
Route::get('/download_report/{id}', [ReportController::class, 'downloadReport'])->name('download_report');
//delete
Route::get('/delete_report/{id}', [ReportController::class, 'destroy'])->name('delete-report');




//====================MEMBER===================================//

//Trang Theo dõi tiến độ dự án
//list
Route::get('/track_progress_member', [ProgressMemBerController::class, 'index'])->name('progress');

//Trang quản lý công việc
//list
Route::get('/work_manager', [TaskMemberController::class, 'index'])->name('work');
//edit
Route::get('/edit_work/{id}', [TaskMemberController::class, 'edit'])->name('edit_work');
Route::post('/edit_work/{id}', [TaskMemberController::class, 'update'])->name('edit_work');

// Trang gửi tài liệu
//list
Route::get('/document_submitted', [DocumentMemberController::class, 'index'])->name('document');
//add
Route::get('/add_document', [DocumentMemberController::class, 'create'])->name('add_document');
Route::post('/add_document', [DocumentMemberController::class, 'store'])->name('add_document');
//delete
Route::get('/delete_document/{id}', [DocumentMemberController::class, 'destroy'])->name('delete-document');
// Trang thông tin cá nhân
//update
Route::get('/update_infor', [InforMemberController::class, 'index'])->name('update_infor');
Route::post('/update_infor', [InforMemberController::class, 'update'])->name('update_infor');

//Trang nhận thông báo
//list
Route::get('/received_notify', [ReceivedNotifyCotroller::class, 'index'])->name('received_notify');
//detail
Route::get('/detail_notify/{id}', [ReceivedNotifyCotroller::class, 'show'])->name('detail_notify');

//Trang Chat
Route::get('/message', [ChatController::class, 'index'])->name('messages');
Route::post('/message', [ChatController::class, 'send'])->name('message.send');



//=======================CLIENT=========================//

//Trang Theo dõi tiến độ dự án
//list
Route::get('/track_progress_client', [ProgressClientController::class, 'index'])->name('progress');

// Trang gửi phản hồi 
//send
Route::get('/send_feedback', [FeebbackClientController::class, 'create'])->name('send_feedback');
Route::post('/send_feedback', [FeebbackClientController::class, 'store'])->name('send_feedback');

// Trang Duyệt sản phẩm
//list
Route::get('/aproval_project', [AprovalCotroller::class, 'index'])->name('aproval_project');
// duyệt
Route::post('/approve_project/{id}', [AprovalCotroller::class, 'approveProject']);



//=======================ADMIN=========================//
Auth::routes();

Route::group([
    'middleware' => ['admin']
], function () {
    //Trang DashBoard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Trang Quản lý tài khoản
    //list
    Route::get('/user_mananger', [UserController::class, 'index'])->name('user');
    //edit
    Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::post('/edit_user/{id}', [UserController::class, 'update'])->name('edit-user');
    //delete
    Route::get('/delete_user/{id}', [UserController::class, 'destroy'])->name('delete-user');

    // Trang Quản lý danh mục
    //list
    Route::get('/cate_mananger', [CategoriesController::class, 'index'])->name('cate');
    //add
    Route::get('/add_cate', [CategoriesController::class, 'create'])->name('add_cate');
    Route::post('/add_cate', [CategoriesController::class, 'store'])->name('add_cate');
    //edit
    Route::get('/edit_cate/{id}', [CategoriesController::class, 'edit'])->name('edit_cate');
    Route::post('/edit_cate/{id}', [CategoriesController::class, 'update'])->name('edit_cate');
    //delete
    Route::get('/delete_cate/{id}', [CategoriesController::class, 'destroy'])->name('delete-cate');

    // Trang Quản lý thông tin phản hồi
    //list
    Route::get('/feedback_mananger', [FeedbackController::class, 'index'])->name('feedback');
    //export
    Route::get('/export-feedbacks', [FeedbackController::class, 'export']);
    //detail
    Route::get('/detail_feedback/{id}', [FeedbackController::class, 'show'])->name('detail_feedback');


    // Trang Quản lý thông báo hệ thống
    //list
    Route::get('/notify_mananger', [NotificationController::class, 'index'])->name('notify');
    //add
    Route::get('/add_notify', [NotificationController::class, 'create'])->name('add_notify');
    Route::post('/add_notify', [NotificationController::class, 'store'])->name('add_notify');
    //edit
    Route::get('/edit_notify/{id}', [NotificationController::class, 'edit'])->name('edit_notify');
    Route::post('/edit_notify/{id}', [NotificationController::class, 'update'])->name('edit_notify');



});
