<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Auth;

class AdminNewsController extends Controller
{
    /**
     * Show the application news.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $news = News::orderBy('updated_at', 'desc')->paginate(4);
        return view('admin/news/show', [
            'news' => $news
        ]);
    }
    
    /**
     * show add the application news.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addShow()
    {
        return view('admin/news/add');
    }

    /**
     * add the application news.
     * POST
     * @return void 
     */
    public function add(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image',
                'name' => 'required|max:200|min:3',
                'desc' => 'required|max:3000|min:20'
            ],
            [
                'name.required' => 'Поле <span>Название</span> обязательно',
                'name.max' => 'Поле <span>Название</span> больше 200 символов',
                'name.min' => 'Поле <span>Название</span> меньше 3 символов',
                'image.required' => 'Поле <span>Аватар</span> обязательно',
                'image.image' => 'Поле <span>Аватар</span> должно быть изображением',
                'desc.required' => 'Поле <span>Описание</span> обязательно',
                'desc.max' => 'Поле <span>Описание</span> больше 3000 символов',
                'desc.min' => 'Поле <span>Описание</span> меньше 20 символов'
            ]
        );

        $newNews = News::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'image_path' => $request->image->store('images'),
            'desc' => $request->desc,
            'published' => true
        ]);
            
        if($newNews){
            return redirect()->route('news_show');
        } else {
            abort(500);
        }
    }
}
