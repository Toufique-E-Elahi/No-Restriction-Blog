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
                            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                            <p>
                                {{$article->excerpt}}
                            </p>
                        </li>
                        <span>
                            <a class="btn btn-block" href="{{ url('/articles/' . $article->id . '/edit') }}">Edit</a>
{{--                            <button class="button text-danger">Delete</button>--}}
                        </span>
                    @empty
                        <p>'Nothing Relevant Yet'</p>
                    @endforelse
                </ul>
            </div>
        </div>
@endsection
