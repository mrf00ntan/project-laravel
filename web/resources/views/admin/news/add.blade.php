@extends('layouts.admin')

@section('content')
<main>
    <div class="content">
        <form action="{{route('news_add_post')}}" method="post" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="callout">
                    @foreach ($errors->all() as $error)
                        <div class="callout small alert error">
                            {!! $error !!}
                        </div>
                    @endforeach
                </div>
            @endif
            <label>
                Аватар новости*
                <div class="upload-file-container-wrap">
                    <input type="file" name="image" accept=".jpg, .jpeg, .png" id="file" onchange="previewFile()">
                    <div class="upload-file-container" style="background-image: url({{asset('image/Upload.png')}})"></div>
                </div>
            </label>
            <label>
                Название*
                <input type="text" name="name" placeholder="Текст новости">
            </label>
            <label>
                Описание*
                <textarea name="desc" cols="30" rows="10" placeholder="Описание новости"></textarea>
            </label>
            <button type="submit" class="button expanded bold">Опубликовать</button>
        </form>
    </div>
</main>
@endsection
