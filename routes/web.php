<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPostController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(UserPostController::class)->group(function(){
    Route::get('/','index');
    
    Route::get('/category/{id}', 'category')->name('category');

    Route::get('/post/{id}','viewPost')->name('post');
    
    Route::get('/about', 'about')->name('about');

    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(CommentController::class)->group(function(){
    Route::post('/comment/{post_id}/post', 'addComment')->name('add.comment');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $comments = Comment::where('user_id', '=', $id)->get();
        return view('dashboard', compact('comments'));
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth','isadmin'])->group(function (){
        Route::controller(AdminController::class)->group(function(){
            Route::get('admin/dashboard','index')->name('admin.dashboard');
            Route::get('admin/deleteuser/{id}','deleteUser')->name('admin.deleteuser');
            Route::get('admin/logout','adminLogout')->name('admin.logout');
            Route::get('admin/profile', 'adminProfile')->name('admin.profile');
            Route::post('admin/profile/update', 'adminProfileUpdate')->name('admin.profile.update');
            Route::post('admin/password/update', 'adminPasswordUpdate')->name('admin.password.update');
    });
        Route::controller(CategoryController::class)->group(function(){
            Route::get('admin/category','category')->name('admin.category');
            Route::get('admin/addcategory','addCategory')->name('admin.addcategory');
            Route::post('admin/insertcategory','insertCategory')->name('admin.insertCategory');
            Route::get('admin/editcategory/{id}','editCategory')->name('admin.editcategory');
            Route::get('admin/deletecategory/{id}','deleteCategory')->name('admin.deletecategory');
            Route::post('admin/updatecategory','updateCategory')->name('admin.updatecategory');
    });
        Route::controller(CommentController::class)->group(function(){
            Route::get('admin/comment','comment')->name('admin.comment');
            Route::get('admin/editcomment/{id}','editComment')->name('admin.editcomment');
            Route::get('admin/deletecomment/{id}','deleteComment')->name('admin.deletecomment');
            Route::patch('admin/update/comment/{id}','updateComment')->name('admin.comment.update');
    });
    Route::resource('admin/posts',PostController::class);
});

Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $comments = Comment::where('user_id', '=', $id)->get();
    return view('dashboard', compact('comments'));
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
