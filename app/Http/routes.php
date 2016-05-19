<?php


Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);

Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);

Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);

Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);

Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);

Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);

Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

Route::put('cart/update/{id}', ['as' => 'cart.update', 'uses' => 'CartController@update']);


//Route::get('checkout/placeOrder', ['as'=>'store.checkout.place', 'uses'=>'CheckoutController@place']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>['auth', 'area_admin'], 'where' => ['id' => '[0-9]+']] , function()
{

    Route::group(['prefix'=>'products', 'as' => 'products.'], function(){

        Route::get('',['as'=>'index', 'uses'=>'AdminProductsController@index']);

        Route::post('',['as'=>'store', 'uses'=> 'AdminProductsController@store']);

        Route::get('{id}/show', ['as' => 'show', 'uses' => 'AdminProductsController@show']);

        Route::get('create',['as'=>'create', 'uses'=>'AdminProductsController@create']);

        Route::get('{id}/edit', ['as'=>'edit', 'uses'=>'AdminProductsController@edit']);

        Route::put('{id}/update', ['as'=>'update', 'uses'=>'AdminProductsController@update']);

        Route::get('{id}/destroy',['as'=>'destroy', 'uses'=> 'AdminProductsController@destroy']);

        Route::group(['prefix'=>'images', 'as'=>'images.'], function(){

            Route::get('{id}/product', ['as'=>'index', 'uses'=>'AdminProductsController@images']);

            Route::get('create/{id}/product', ['as'=>'create', 'uses'=>'AdminProductsController@createImage']);

            Route::post('store/{id}/product', ['as'=>'store', 'uses'=>'AdminProductsController@storeImage']);

            Route::get('destroy/{id}/product', ['as'=>'destroy', 'uses'=>'AdminProductsController@destroyImage']);
        });
    });


    Route::group(['prefix'=>'categories', 'as' => 'categories.'], function(){

        Route::get('',['as'=>'index', 'uses'=>'AdminCategoriesController@index']);

        Route::post('',['as'=>'store', 'uses'=> 'AdminCategoriesController@store']);

        Route::get('create',['as'=>'create', 'uses'=>'AdminCategoriesController@create']);

        Route::get('{id}/edit', ['as'=>'edit', 'uses'=>'AdminCategoriesController@edit']);

        Route::put('{id}/update', ['as'=>'update', 'uses'=>'AdminCategoriesController@update']);

        Route::get('{id}/destroy',['as'=>'destroy', 'uses'=> 'AdminCategoriesController@destroy']);
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function() {

        Route::get('', ['as' => 'users', 'uses' => 'AdminUsersController@index']);

        Route::post('', ['as' => 'store', 'uses' => 'AdminUsersController@store']);

        Route::get('create', ['as' => 'create', 'uses' => 'AdminUsersController@create']);

        Route::get('{id}/destroy', ['as' => 'destroy', 'uses' => 'AdminUsersController@destroy']);

        Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'AdminUsersController@edit']);

        Route::put('{id}/update', ['as' => 'update', 'uses' => 'AdminUsersController@update']);
    });

    Route::group(['prefix'=> 'orders', 'as' => 'orders.'],function(){

        Route::get('', ['as' => 'index', 'uses' => 'AdminOrdersController@index']);

        Route::get('{id}/show', ['as' => 'show', 'uses' => 'AdminOrdersController@show']);

        Route::get('create', ['as' => 'create', 'uses' => 'AdminOrdersController@create']);

        Route::post('store', ['as' => 'store', 'uses' => 'AdminOrdersController@store']);

        Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'AdminOrdersController@edit']);

        Route::put('{id}/update', ['as' => 'update', 'uses' => 'AdminOrdersController@update']);

        Route::get('{id}/destroy', ['as' => 'destroy', 'uses' => 'AdminOrdersController@destroy']);
    });

});


Route::get('test', 'CheckoutController@test');

Route::get('checkout/end', ['as' => 'store.checkout.end', 'uses' => 'CheckoutController@end']);
Route::get('pagseguro/notification}', ['as' => 'store.pagseguro.notification', 'uses' => 'CheckoutController@end']);

Route::group(['middleware'=>'auth'], function(){

    Route::get('checkout/placeorder', ['as' => 'store.checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    
]);


Route::group(['prefix'=>'register', 'as'=>'register.'], function(){
    Route::get('', ['as' => 'index', 'uses'=>'RegisterController@index']);
    Route::post('store', ['as' => 'store', 'uses'=>'RegisterController@store']);
    Route::post('address', ['as' => 'address', 'uses'=>'RegisterController@address']);
});