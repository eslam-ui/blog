@extends('front.inc.master')
@section('slider')
<header class="masthead" style="background-image: url('{{ asset("front/assets/img/post-bg.jpg")}}')">
    @endsection
    @section('content')
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        Title :{{ $blog->title }}<br>
                        Category : {{ $cat->name }}<br>
                        publisher : {{ $blog->author }}<br>
                        <?php
                            $o =wordwrap($blog->article, 8, "\n", false);
                        ?>
                        {{ "$o\n";}}<br>
                    </div>
                </div>
            </div>
        </article>
@endsection
