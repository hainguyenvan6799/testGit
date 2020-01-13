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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('student','StudentController');
Route::get('KhoaHoc',function(){
	return 'Xin chào các bạn';
});
Route::get('KhoaPham/Laravel',function(){
	echo "<h1>Khóa Học - Laravel</h1>";
});
Route::get('HoTen/{ten}', function($ten){
	echo "Xin chao " . $ten;
})->where(['ten'=>'[a-zA-Z]+']);

// ĐỊnh danh route
Route::get('Route1',['as'=>'Myroute', function(){
	return "Xin chào các bạn đến với khóa học Laravel.";
}]);


Route::get('Route2',function(){
	echo 'Đây là route 2.';
})->name('MyRoute2');

Route::get('GoiTen', function(){
	return redirect()->route('Myroute');
});
// lên trang web và nhập http://localhost:88/applaravel/public/GoiTen
Route::get('GoiTen2', function(){
	return redirect()->route('MyRoute2');
});
// lên trang web và nhập http://localhost:88/applaravel/public/GoiTen2

Route::group(['prefix'=>'MyGroup'], function(){
	Route::get('User1', function(){
		echo 'Xin chào User1';
	});
	Route::get('User2', function(){
		echo 'Xin chào User2';
	});
	Route::get('User3', function(){
		echo 'Xin chào User3';
	});
});

Route::get('GoiTenController','MyTestController@myFunction');
Route::get('Controller2/{ten}', 'Controller2@SayHi');

// URL 
Route::get('MyRequest','Controller2@GetURL');

// Gửi nhận dữ liệu lên địa chỉ url và nhận về
Route::get('getForm',function(){
	return view('vendor.postForm');
});

Route::post('postForm',['as'=>'postForm','uses'=>'Controller2@postForm']);

//Cookie
Route::get('setcookie', 'Controller2@setCookie');
Route::get('getcookie','Controller2@getCookie');

Route::get('getFile',function(){
	return view('postFile');
});
Route::post('postFile',['as'=>'postFile','uses'=>'Controller2@uploadImage']);


// đổ dữ liệu dạng json
Route::get('getJson', 'Controller2@getJson');

//view
Route::get('myView/{t}','Controller2@myView');

// dùng chung dữ liệu 
View::share('KhoaHoc', 'Laravel - Nguyễn Văn Hải');

// blade template
Route::get('blade/{t}','Controller2@blade');

//Database
Route::get('database', function(){
	Schema::create('loaisanphamnew', function($table){
		$table->increments('idloai');
		$table->string('tenloai', 200)->nullable();
		$table->string('nsx')->default('Nha san xuat');
	});
	echo 'Complete';
});

//tao lien ket bang
Route::get('linktable', function(){
	Schema::create('sanphamnew1', function($table){
		$table->increments('idsanpham');
		$table->string('tensanpham');
		$table->float('gia');
		$table->integer('soluong')->default(0);
		$table->integer('idloaisanpham')->unsigned();
		$table->foreign('idloaisanpham')->references('idloai')->on('loaisanphamnew');
	});
	echo 'Complete create table sanpham';
});

// drop column on table
Route::get('dropColumnOnTable', function(){
	Schema::table('loaisanphamnew', function($table){
		$table->dropColumn('nsx');
	});
});

//add column to table
Route::get('addColumnOnTable', function(){
	Schema::table('loaisanpham', function($table){
		$table->string('NonameColumn');
	});
	echo 'Add column complete';
});

//rename column
Route::get('renameTable', function(){
	Schema::rename('loaisanphamnew', 'typeProducts');
	echo 'Rename successfully';
});

//drop table
Route::get('dropTable', function(){
Schema::dropIfExists('loaisanpham');
	echo 'Drop successfully';
});

Route::get('qb/get', function(){
	$data = DB::table('students')->get();
	foreach($data as $row)
	{
		foreach($row as $key => $value)
		{
			echo $key . ':' . $value . '<br>';
		}
		echo '<br>';
	}
});

//select * from students where id = 2
Route::get('qb/where', function(){
	$data = DB::table('students')->where('id','=','2')->get();
	foreach($data as $row)
	{
		foreach($row as $key => $value)
		{
			echo $key . ':' . $value . '<br>';
		}
		echo '<br>';
	}
});

// select id, name, age where id = ?
Route::get('qb/select', function(){
	$data = DB::table('students')->select(['id','name','age'])->where('id','=','2')->get();
	foreach($data as $row)
	{
		foreach($row as $key => $value)
		{
			echo $key . ':' . $value . '<br>';
		}
		echo '<br>';
	}
});

//
Route::get('qb/raw', function(){
	$data = DB::table('students')->select(DB::raw('name as ten'))->where('id',2)->get();
	foreach($data as $row)
	{
		foreach($row as $key => $value)
		{
			echo $key . ':' . $value . '<br>';
		}
		echo '<br>';
	}
});

//Order By
Route::get('qb/orderby', function(){
	$data = DB::table('students')->select(['id','name','age'])->where('id','>','0')->orderBy('id','desc')->skip(1)->take(1)->get();
	foreach($data as $row)
	{
		foreach($row as $key => $value)
		{
			echo $key . ':' . $value . '<br>';
		}
		echo '<br>';
	}
});

//update data in table mysql
Route::get('qb/update', function(){
	DB::table('students')->where('id', 1)->update(['name'=>'website', 'age'=>'21']);
	echo 'Update complete';
});

//delete row where id = 1
Route::get('qb/delete', function(){
	DB::table('students')->where('id', 1)->delete();
	echo 'Delete complete';
});

//model
Route::get('qb/save', function(){
	$user = new App\student;
	$user->name = 'Nguyễn Văn Hải';
	$user->age = '20';
	$user->save();
	echo 'Save complete';
});

Route::get('model/query', function(){
	$student = App\student::find(2);
	echo $student->name;
	echo '<br>';
	echo $student->age;
});

// đầu tiên tạo model trước bằng cách mở cmd trên thư mục applaravel, nhập php artisan make:model tenModel -m
Route::get('model/sanpham/save/{ten}', function($ten){
	$sanpham = new App\sanpham;
	$sanpham->tensanpham = $ten;
	$sanpham->gia='20';
	$sanpham->soluong='20';
	$sanpham->idloaisanpham='1';
	$sanpham->save();
	echo 'Add complete';
});

//Lấy tất cả dữ liệu của bảng sanpham và chuyển thành dạng json
Route::get('model/sanpham/all', function(){
	$sanpham = App\sanpham::all()->toJson();
	var_dump($sanpham);
});

//lấy các thông tin của sản phẩm có tên là Iphone11ProMax
Route::get('model/sanpham/ten', function(){
	$sanpham = App\sanpham::where('tensanpham', 'Iphone11ProMax')->get()->toArray();
	var_dump($sanpham);
});

//
Route::get('model/sanpham/delete', function(){
	$sanpham = App\sanpham::where('idsanpham', 4);
	$sanpham->delete();
	echo 'delete complete';
});

//lien kết khóa chính khóa phụ--> chưa ra
Route::get('lienket', function(){
	$data = App\sanpham::where('idsanpham','3')->loaisanpham->toArray();
	var_dump($data);
});

//tạo table phone
Route::get('createPhone', function(){
	Schema::create('Phone', function($table){
		$table->increments('id');
		$table->string('phonename');
	});
	echo 'Create table Phone successfully';
});

//Nhập dữ liệu cho Phone
Route::get('inputforPhone', function(){
	$data = new App\Phone;
	$data->phonename = 'Iphone 11';
	$data->save();
	echo 'Add complete';
});

//tạo table user
Route::get('createUser', function(){
	Schema::create('User', function($table){
		$table->increments('id');
		$table->string('email');
		$table->string('password');
	});
	echo 'Create table User successfully';
});

//Nhập dữ liệu cho User
Route::get('inputforUser', function(){
	$data = new App\User;
	$data->email='hainguyenvan6799@gmail.com';
	$data->password='123456';
	$data->save();
	echo 'Add complete';
});



Route::get('createDetail', function(){
	Schema::create('Details', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('detailcontent');
			$table->foreign('user_id')->references('id')->on('user');
		});
		echo 'Create table Detail successfully';
});

Route::get('relationship', 'Controller2@index');

Route::get('diem', function(){
	echo 'Bạn đã đủ điểm.';
})->middleware('myMiddleware')->name('diem'); // myMiddleware giống trong Kernel.php trong mảng $routeMiddleware
//name('diem') phải trùng với <form action="{{route('diem')}}" method="GET"> trong trang nhapdiem.blade.php trong folder view

Route::get('loi', function(){
	echo 'Bạn chưa có điểm.';
})->name('loi'); // vì ở bên trang myMiddleware.php có return redirect()->route('loi');

Route::get('nhapdiem', function(){
	return view('nhapdiem');
});

Route::get('dangnhap', function(){
	return view('auth.login');
});

Route::post('login', 'AuthController@login')->name('login');