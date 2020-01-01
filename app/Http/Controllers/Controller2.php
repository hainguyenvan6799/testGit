<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Controller2 extends Controller
{
    public function SayHi($ten)
    {
    	echo "Xin chào " . $ten;
    	return redirect()->route('Myroute');
    }
    public function GetURL(Request $request)
    {
    	return $request->url();
    	// return $request->path();
    }
    public function postForm(Request $request){
    	return 'Xin chào ' . $request->hoten;
    }
    public function setCookie(){
    	$response = new Response();
    	$response->withCookie('KhoaHoc', 'Laravel-KhoaPham', 1);
    	return $response;
    }
    public function getCookie(Request $request){
    	return $request->cookie('KhoaHoc');
    }

    public function uploadImage(Request $request){
    	if($request ->hasFile('myfile'))
    	{
    		$file = $request->file('myfile');
    		if(($file->getClientOriginalExtension('myfile')) == 'jpg')
    		{
    			$filename = $file->getClientOriginalName('myfile');
    			$file->move('image', $filename);
    		}
    		else
    		{
    			echo 'Không được upload.';
    		}
    	}
    	else
    	{
    		echo 'Chưa có file';
    	}
    }


    public function getJson(){
    	$arr = ['Laravel', 'PHP', 'ASP.net', 'HTML','KhoaHoc'=>'Laravel-KhoaPham'];
    	return response()->json($arr); 
    }

    public function myView($t){

    	return view('myview', ['time'=>$t]);
    }

    public function blade($t)
    {
    	$khoahoc = 'Trung tâm Nguyễn Văn Hải';
    	if($t == 'php')
    	{
    		return view('pages.php', ['khoahoc' => $khoahoc]);
    	}
    	elseif($t == 'laravel')
    	{
    		return view('pages.laravel');
    	}
    	elseif($t == 'foreach')
    	{
    		return view('pages.foreach');
    	}
    	else
    	{
    		return view('pages.forelse');
    	}
    }
}
