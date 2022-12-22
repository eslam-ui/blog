@extends('front.inc.master')
@section('slider')
    <header class="masthead" style="background-image: url('{{ asset('front/assets/img/home-bg.jpg') }}')">
    @endsection
    @section('content')
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach ($blog as $b)
                        <div class="post-preview">
                            <a href="/post/{{ $b->id }}/{{ $b->cat_id }}">
                                <h2 class="post-title">{{ $b->title }}</h2>
                                <h3 class="post-subtitle">
                                    <p class="ArticleBody">{{ substr(strip_tags($b->article), 0, 50) }}
                                        {{ strlen(strip_tags($b->article)) > 50 ? '...ReadMore' : '' }}
                                    </p>
                                </h3>
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="#!">{{ $b->author }}</a>
                                on {{ $b->created_at }}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @endforeach



                </div>
            </div>
        </div>
    @endsection
