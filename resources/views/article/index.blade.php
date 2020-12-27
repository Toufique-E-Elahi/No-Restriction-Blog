@extends('layout1')
@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <ul>
                    @forelse($articles as $article)
                    <li>

                        <div class="title">
                            <h2><a href="{{$article->path()}}">{{$article->title}}</a></h2>
                        </div>
                        <p><a href=""><img src="/images/banner.jpg" alt="" class="image image-full" /> </a></p>
                        <p>
                            {{$article->excerpt}}
                        </p>
                    </li>
                    @empty
                        <p>'Nothing Relevant Yet'</p>
                    @endforelse
                </ul>
            </div>
        </div>
@endsection
