@extends('layout1')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @auth
            <h1 class="heading has-text-wiight-bold is-size-4">Create New Article</h1>
            <form method="post" action="/articles/{{$article->id}}">
                @csrf
                @method('put');

                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input @if($errors->has('title')) ? is-danger : '' @endif" type="text"  name="title" id="title" value="{{$article->title}}">
                        @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>
                        @error('excerpt')
                        <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body">{{$article->body}}</textarea>
                        @error('body')
                        <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            @endauth
        </div>
    </div>
@endsection

