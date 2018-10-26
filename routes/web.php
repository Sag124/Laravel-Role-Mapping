<?php

use App\User;
use App\Admin;
use App\Post;
use Illuminate\Support\Facades\Input;
Route::get('/', 'PageController@getIndex')->name('pages.welcome');
Route::get('/about', 'PageController@getAbout')->name('pages.about');
Route::get('/contact', 'PageController@getContact')->name('pages.contact');



Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
//Route::get('/home', 'HomeController@index')->name('home');

// Route::prefix('admin')->group(function(){
// Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
// Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
// Route::get('/', 'AdminController@index')->name('admin.dashboard');
// });

Route::any ( '/search', function () {
	$q = Input::get ( 'q' );
	// for users table
	if($q != ""){
	// $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
	// $pagination = $user->appends ( array (
	// 			'q' => Input::get ( 'q' ) 
	// 	) );
	// // for admins table
	// $admin = Admin::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
	// $pagination = $admin->appends ( array (
	// 			'q' => Input::get ( 'q' ) 
	// 	) );
	// for posts, tags, categories table create here..
	$post = Post::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'body', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
	$pagination = $post->appends ( array (
				'q' => Input::get ( 'q' ) 
		) );
	
	// if (count ( $user ) > 0)
	// 	return view ( 'search' )->withDetails ( $user )->withQuery ( $q );

	// if (count ( $admin ) > 0)
	// 	return view ( 'search' )->withDetails ( $admin )->withQuery ( $q );

	if (count ( $post ) > 0)
		return view ( 'search1' )->withDetails ( $post )->withQuery ( $q );

	}

		return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' );
} );

// fb
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('loginfacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');



Route::get('/verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::delete('/admin/{id}', 'AdminController@destroy')->name('users.destroy');


Route::resource('posts', 'PostController');

Route::get('/blog/{slug}',  ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('/blog',	['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);



Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::get('/admin', ['uses' => 'PageController@getAdmin',
					   'as' => 'admin.dashboard',
					'middleware' => 'roles',
          'roles' => ['admin']
			]);


Route::post('/admin/assign-roles', [
        'uses' => 'PageController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['admin']
    ]);

Route::get('/author', ['uses' => 'PageController@getAuthor',
                         'as' => 'author.index',
                         'middleware' => 'roles',
                          'roles' => ['author']  
    ]);
