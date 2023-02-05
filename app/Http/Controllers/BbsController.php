<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bb;

class BbsController extends Controller
{
    //Функиця вывода представления с главной страницей
    public function index(){
        $context = ['bbs'=>Bb::latest()->get()]; //в переменную передаются все Eloquent модели с БД
        return view('index', $context);    
    }
    //Функция возвращает представление страницы с товаром
    public function detail(Bb $bb){
        return view('detail', ['bb' => $bb]);
    }


}
