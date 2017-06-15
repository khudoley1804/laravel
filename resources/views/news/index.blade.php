@extends('layouts.app') 
@section('content') 
<div class="container"> 
    <div class="row"> 
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default"> 
                <div class="panel-heading">
                    <h1>Новости</h1>  

                    <!-- Link news/create -->
                    <a href="{{ route('news.create') }}">
                        Добавить новость
                    </a>

                </div> 
                <div class="panel-body"> 
                    @foreach($news as $item)
                    <h2>
                        {{ $item->title }}
                    </h2>
                    <p>{!! $item->markdownContent !!}</p>

                    <div>
                        <p>{{$item->created_at}}</p>
                    </div>
                    <hr>
                    <a href="{{ route('news.edit',$item->id) }}">Редактировать</a>

                    
                    <form action="{{ route('news.destroy', $item->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" id="delete-news-{{ $item->id }}" class="btn btn-danger">
                           Удалить
                        </button>
                    </form>

                    @endforeach

                </div> 
            </div> 
        </div> 
    </div> 
</div> 
@endsection