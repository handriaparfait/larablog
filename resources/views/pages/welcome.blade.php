@extends('main')

@section('title', '| Homepage')

@section('content')

    <div class="section no-pad-bot  grey lighten-5" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center red-text">Bienvenue sur to TrockZombi</h1>
            <div class="row center">
                <h5 class="header col s12 light">Plateforme d'echange .....</h5>
            </div>
            <div class="row center">
                <a href="{{ route('posts.create') }}" id="download-button" class="btn-large waves-effect waves-light red">Commencer à Posté</a>
            </div>
            <br><br>

        </div>
    </div>


    <div class="container" style="width: 100%">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m8">
                    <ul class="collection">
                        @foreach($posts as $post)
                        <li class="collection-item avatar">
                            <i class="material-icons circle">folder</i>
                            <b class="title">{{ $post->title }}</b> <small class="blue-text text-darken-2">- Néo-zone: {{ $post->category->name }}</small>
                            <p><i>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</i></p>
                            <a href="{{ route('blog.single', $post->slug) }}" class="secondary-content"><i class="material-icons">send</i></a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col s12 m4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>Catégories</h4></li>
                        <li>
                            <div class="collection">
                                @foreach( $categories as $category)
                                    <a href="#!" class="collection-item">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <br><br>
    </div>

@stop