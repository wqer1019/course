@extends('course.layouts.app')

@section('keywords'){!! $category->getKeywords() !!}@endsection
@section('description'){!! $category->getDescription() !!}@endsection
@section('title'){{ Breadcrumbs::pageTitle(' - ', 'category', $category) }}@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{cdn('course/css/list.css')}}">
@endsection
@section('content')
    @widget('navigation_bar')
    <div class="banner">
        <img src="{{cdn('course/images/thumb.jpg')}}">
    </div>
    <div class="list-contain">
        @widget('navigation_sidebar')
        <div class="list-box">
            <div class="list-box-contain">
                <div class="list-title">
                    <h4>{{$category->cate_name}}</h4>
                    {{ Breadcrumbs::render('category', $category) }}
                </div>
                <div class="list-news">
                    <ul>
                        @forelse($posts as $post)
                            <li class="item">
                                <a class="text_title" href="{!! $post->getPresenter()->url() !!}">{{$post->title}}</a>
                                <span class="time">{!! $post->published_at->format('Y年m月d日')!!}</span>
                            </li>
                        @empty
                            <p class="no_data">暂无数据</p>
                        @endforelse
                    </ul>
                    {!! $posts->fragment('list')->links() !!}
            </div>
        </div>
    </div>
    </div>
    @include('course.layouts.footer')
@endsection