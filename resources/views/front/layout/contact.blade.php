@extends('front.layout.app')
@section('content')
    <header class="masthead" style="background-image: url('{{'front'}}/assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                    <div class="my-5">

                        <form action="{{route('front.sendMessage')}}" method="POST">
                            @csrf
                            @include('front.layout.message')
                            <div class="form-floating">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." />
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                                <label for="email">Email address</label>

                            </div>
                            <div class="form-floating">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                                <label for="phone">Phone Number</label>

                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="message" id="message" placeholder="Enter your message here..." style="height: 12rem"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <br />

                            <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
