@extends('general.layouts.general')
@section('pageTitle')
Home
@stop
@section('pageContent')
<div class="container">

</div>
<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image:  url({{asset('general/images/slider/stay-home.jpg')}});">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <h2>
                                <i class="icon-home" style="font-size: 88px;"></i>
                            </h2>
                            <h2>STAY HOME</h2>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image:  url({{asset('general/images/slider/stay-safe.jpg')}});">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <h2>
                                <i class="icon-happy"
                                    style="font-weight: 800; font-size: 88px; color: rgb(0, 89, 255);"></i>
                            </h2>
                            <h2 style="color:  rgb(0, 89, 255);">STAY SAFE</h2>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url({{asset('general/images/slider/save-lives.jpg')}});">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <h2>
                                <i class="icon-heart text-danger" style="font-size: 88px;"></i>
                            </h2>
                            <h2 style="color: #a94442;">SAVE LIVES</h2>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
<div id="fh5co-services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
                <h2>What is Coronavirus?</h2>
                <p>Coronaviruses are a family of viruses that cause illness such as respiratory diseases or
                    gastrointestinal diseases </p>
                    <p>
                        Coronaviruses got their name from the way that they look under a microscope. The virus consists of a core of genetic material surrounded by an envelope with protein spikes. This gives it the appearance of a crown. The word Corona means “crown” in Latin. 
                    </p>
                    <a href="#" class="btn btn-primary btn-outline with-arrow">Read More About COVID-19 <i
                        class="icon-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div id="fh5co-work-section" class="fh5co-light-grey-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
                <h2>What are Coronavirus Symptoms?</h2>
                <p>Typically Coronaviruses present with respiratory symptoms. Among those who will become
                    infected, some will show no symptoms. Those who do develop symptoms may have a mild to
                    moderate, but self-limiting disease with symptoms similar to the seasonal flu.
                <p>
                <div class="text-left">
                    <h3>Symptoms may include</h3>
                    <ul>
                        <li>Respiratory symptoms</li>
                        <li>Fever</li>
                        <li>Cough</li>
                        <li>Shortness of breath</li>
                        <li>Breathing difficulties</li>
                        <li>Fatigue</li>
                        <li>Sore throat</li>
                    </ul>
                </div>
                <a href="#" class="btn btn-primary btn-outline with-arrow">Read More About Symptoms <i
                    class="icon-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="fh5co-cta" style="background-image: url({{asset('general/images/banners/vaccine-banner.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="col-md-12 text-center animate-box">
            <h3>WE ARE TYING TO SAVE WORLD FORM COVID-19</h3>
            <p><a href="#" class="btn btn-primary btn-outline with-arrow">GET VACCINATED NOW <i
                        class="icon-arrow-right"></i></a></p>
        </div>
    </div>
</div>
@stop
