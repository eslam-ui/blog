@extends('front.inc.master')
@section('slider')
<header class="masthead" style="background-image: url('{{ asset("front/assets/img/about-bg.jpg")}}')">@endsection
@section('content')
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7"><?php
                        $o =wordwrap($about, 8, "\n", false);
                    ?>
                    {{ "$o\n";}}<br></div>
                </div>
            </div>
        </main>
@endsection
