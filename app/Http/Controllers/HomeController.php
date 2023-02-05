<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bb;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric'
    ];

    private const BB_ERROR_MESSAGES = [
        'price.required' => 'Товары нельзя раздавать бесплатно',
        'required' => 'Поле обязательео к заполнению',
        'max' => 'Максимальная длина :max символов',
        'numeric' => 'Поле должно быть заполненно цифрами'
    ];



    // Возвращает представление с личным кабинетом пользователя
    // в которое передает контекст со всеми постами пользователя
     public function index()
    {
        return view('home', ['bbs'=>Auth::user()->bbs()->latest()->get()]);
    }
    // Возвращает представление в котором отображается форма для добавления в БД карточки объявления
    public function showAddBbForm(){
        return view('bb_add');
    }


    public function storeBb(Request $request){
        $validated = $request->validate(self::BB_VALIDATOR,
                                        self::BB_ERROR_MESSAGES);
        Auth::user()->bbs()->create(['title'=>$validated['title'],
                                     'content'=>$validated['content'],
                                     'price'=>$validated['price']]);
        return redirect()->route('home');
    }

    // Контроллер выводит представление для изменения данных объявления
    // в которое передается контекст с данными из таблицы по id объявления
    public function showEditBbForm(Bb $bb){
        return view('bb_edit', ['bb'=>$bb]);
    }

    public function updateBb(Request $request, Bb $bb){
        $validated = $request->validate(self::BB_VALIDATOR,
                                        self::BB_ERROR_MESSAGES);
        $bb->fill(['title'=>$validated['title'],
                  'content'=>$validated['content'],
                  'price'=>$validated['price']]);
        $bb->save();
        return redirect()->route('home');
    }

    public function showDeleteBbForm(Bb $bb){
        return view('bb_delete', ['bb'=>$bb]);
    }

    public function destroyBb(Bb $bb){
        $bb->delete();
        return redirect()->route('home');
    }
}
