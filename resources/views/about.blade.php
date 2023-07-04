@extends('layouts.main')

@section('content')
    <div class="section-title">about us</div>

    <section class="about">
        <img src="{{asset('partial/images/about-img.png')}}" alt="">
        <div class="box">
            <h3>why choose us?</h3>
            <p>We live in a world where every experience can be highly personalised, so why should job hunting be any different? foundit aims to be the perfect picture of customisation. In a vast sea of opportunities, we can fish out the right ones for you by catering to what you need - be it learning new skills, an inclusive workplace, mentorship, a fast-track career, a place to hustle or somewhere you can keep things flexible.</p>
            <p>At the heart of our success and our future is innovation. We are building some of the best technology to customise our search results, keeping in mind that your job title doesn't define your potential. So much so that two of you from the same field will see completely different results for the same query. Decades of industry insights and new-age technology have come together to bring you the perfect career experience.</p>
            <a href="/contact" class="btn">contact us</a>
        </div>
    </section>
@endsection
