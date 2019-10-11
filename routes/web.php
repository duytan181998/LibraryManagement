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

Route::group(['prefix'=>'/'],function(){

    Route::get('/',['as'=>'admin.getloginadmin','uses'=>'AccountController@getLoginAdmin']);
    Route::post('/dang-nhap',['as'=>'admin.postloginadmin','uses'=>'AccountController@postLoginAdmin']);
    Route::get('/dang-xuat',['as'=>'admin.getlogoutadmin','uses'=>'AccountController@getLogoutAdmin']);
    Route::get('/{id}/thong-tin',['as'=>'admin.account.getprofileadmin','uses'=>'AccountController@getProfileAdmin']);

    Route::get('/trang-chu',['as'=>'admin.getdashboard','uses'=>'HomeController@getDashboard']);

    Route::group(['prefix' => 'the-loai'], function () {
        Route::get('/',['as'=>'admin.category.getall','uses'=>'CategoryController@getAll'] );
        Route::get('/them',['as'=>'admin.category.getadd','uses'=>'CategoryController@getAdd'] );
        Route::post('/them',['as'=>'admin.category.postadd','uses'=>'CategoryController@postAdd'] );
        Route::get('/xoa/{id}',['as'=>'admin.category.getdelete','uses'=>'CategoryController@getDelete'] );
        Route::get('/sua/{id}',['as'=>'admin.category.getedit','uses'=>'CategoryController@getEdit'] );
        Route::post('/sua/{id}',['as'=>'admin.category.postedit','uses'=>'CategoryController@postEdit'] );
    });
    Route::group(['prefix' => 'tac-gia'], function () {
        Route::get('/',['as'=>'admin.author.getall','uses'=>'AuthorController@getAll'] );
        Route::get('/them',['as'=>'admin.author.getadd','uses'=>'AuthorController@getAdd'] );
        Route::post('/them',['as'=>'admin.author.postadd','uses'=>'AuthorController@postAdd'] );
        Route::get('/xoa/{id}',['as'=>'admin.author.getdelete','uses'=>'AuthorController@getDelete'] );
        Route::get('/sua/{id}',['as'=>'admin.author.getedit','uses'=>'AuthorController@getEdit'] );
        Route::post('/sua/{id}',['as'=>'admin.author.postedit','uses'=>'AuthorController@postEdit'] );
    });
    Route::group(['prefix' => 'nha-xuat-ban'], function () {
        Route::get('/',['as'=>'admin.publisher.getall','uses'=>'PublisherController@getAll'] );
        Route::get('/them',['as'=>'admin.publisher.getadd','uses'=>'PublisherController@getAdd'] );
        Route::post('/them',['as'=>'admin.publisher.postadd','uses'=>'PublisherController@postAdd'] );
        Route::get('/xoa/{id}',['as'=>'admin.publisher.getdelete','uses'=>'PublisherController@getDelete'] );
        Route::get('/sua/{id}',['as'=>'admin.publisher.getedit','uses'=>'PublisherController@getEdit'] );
        Route::post('/sua/{id}',['as'=>'admin.publisher.postedit','uses'=>'PublisherController@postEdit'] );
    });
    Route::group(['prefix' => 'sach'], function () {
        Route::get('/',['as'=>'admin.book.getall','uses'=>'BookController@getAll'] );
        Route::get('/them',['as'=>'admin.book.getadd','uses'=>'BookController@getAdd'] );
        Route::post('/them',['as'=>'admin.book.postadd','uses'=>'BookController@postAdd'] );
        Route::get('/xoa/{id}',['as'=>'admin.book.getdelete','uses'=>'BookController@getDelete'] );
        Route::get('/sua/{id}',['as'=>'admin.book.getedit','uses'=>'BookController@getEdit'] );
        Route::post('/sua/xoa-anh',['as'=>'admin.book.getdeleteimage','uses'=>'BookController@getDeleteImage'] );
        Route::post('/sua/them-anh',['as'=>'admin.book.getaddimage','uses'=>'BookController@getAddImage'] );
        Route::post('/sua/{id}',['as'=>'admin.book.postedit','uses'=>'BookController@postEdit'] );
    });
    Route::group(['prefix' => 'doc-gia'], function () {
            Route::get('/',['as'=>'admin.reader.getall','uses'=>'ReaderController@getAll'] );
            Route::get('/them',['as'=>'admin.reader.getadd','uses'=>'ReaderController@getAdd'] );
            Route::post('/them',['as'=>'admin.reader.postadd','uses'=>'ReaderController@postAdd'] );
            Route::get('/xoa/{id}',['as'=>'admin.reader.getdelete','uses'=>'ReaderController@getDelete'] );
            Route::get('/sua/{id}',['as'=>'admin.reader.getedit','uses'=>'ReaderController@getEdit'] );
            Route::post('/sua/{id}',['as'=>'admin.reader.postedit','uses'=>'ReaderController@postEdit'] );
    });
    Route::group(['prefix' => 'the-thu-vien'], function () {
        Route::get('/them/{id}',['as'=>'admin.libarycard.getadd','uses'=>'ReaderController@getCreateLibaryCard'] );
        Route::post('/them/{id}',['as'=>'admin.libarycard.postadd','uses'=>'ReaderController@postCreateLibaryCard'] );

    });
    Route::group(['prefix' => 'muon-tra'], function () {
        Route::get('/',['as'=>'admin.muontra.getall','uses'=>'MuonTraController@getAll'] );
        Route::get('/them',['as'=>'admin.muontra.getadd','uses'=>'MuonTraController@getAdd'] );
        Route::post('/them',['as'=>'admin.muontra.postadd','uses'=>'MuonTraController@postAdd'] );
        Route::get('/xoa/{id}',['as'=>'admin.muontra.getdelete','uses'=>'MuonTraController@getDelete'] );
        Route::get('/cap-nhat-trang-thai/{id}',['as'=>'admin.muontra.getchangestatus','uses'=>'MuonTraController@getChangeStatus'] );
        Route::get('/sua/{id}',['as'=>'admin.muontra.getedit','uses'=>'MuonTraController@getEdit'] );
        Route::post('/sua/{id}',['as'=>'admin.muontra.postedit','uses'=>'MuonTraController@postEdit'] );
    });
    Route::group(['prefix' => 'thong-ke'], function () {
        Route::post('/',['as'=>'admin.pdf.getindex','uses'=>'ReportController@index'] );
        Route::get('/xuat',['as'=>'admin.pdf.getconvert','uses'=>'ReportController@pdf'] );
        Route::get('/sach-ton',['as'=>'admin.pdf.getsachton','uses'=>'ReportController@getSachTon'] );
        Route::get('/sach-ton-pdf',['as'=>'admin.pdf.getsachtonpdf','uses'=>'ReportController@getSachTonPDF'] );
        Route::get('/doc-gia',['as'=>'admin.pdf.getdocgia','uses'=>'ReportController@getDocGia'] );
        Route::get('/doc-gia-pdf',['as'=>'admin.pdf.getdocgiapdf','uses'=>'ReportController@getDocGiaPDF'] );
    });
});
