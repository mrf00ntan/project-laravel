@extends('layouts.admin')

@section('content')
<main>
    <div class="content">
        <div class="news-container">
            @foreach ($news as $n)
                <div class="news-item">
                    <div class="card">
                        <div class="card-divider">
                            <small>{{$n->updated_at->format('d-m-Y H:m')}}</small>
                        </div>
                        <div class="card-divider bold">
                            {{$n->name}}
                        </div>
                        <img src="/storage/{{$n->image_path}}">
                        <div class="card-section">
                            {!! $n->desc !!}
                        </div>
                        <div>
                            <ul class="menu align-right">
                                <li>
                                    <a href="" class="button bold small">Редактировать</a>
                                </li>
                                <li>
                                    <button class="button alert bold small">Удалить</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>           
                <br>
            @endforeach
        </div>
        <div class="paginate">
            {{$news->links()}}
        </div>
    </div>
</main>
@endsection
