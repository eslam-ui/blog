@extends('front.inc.master')
@section('slider')
    <header class="masthead" style="background-image: url('{{ asset("front/assets/img/contact-bg.jpg")}}')">
    @section('content')
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as
                            soon as possible!</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST"
                                action="{{ url('/contact-store') }}">
                                @csrf
                                <div >
                                    <input class="form-control" id="name" name="name" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                </div>
                                <div >
                                    <input class="form-control" id="email" name="email" type="email"
                                        placeholder="Enter your email..." data-sb-validations="required,email" />
                                </div>
                                <div >
                                    <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..."
                                        style="height: 12rem" data-sb-validations="required"></textarea>

                                </div>
                                <button class="btn btn-primary" type="submit">send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
