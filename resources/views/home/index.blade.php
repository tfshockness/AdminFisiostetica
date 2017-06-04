@extends('layouts.site.layout')

@section('content')

@include('layouts.site.partials._navigation')

<!-- END - NAV -->
<section class="home" id="home">
@include('layouts.site.partials._home')
</section>

<section class="offer" id="offer">
@include('layouts.site.partials._offer')
</section><!--END - OFFER -->

<section class="free" id="free">
@include('layouts.site.partials._free')
</section><!-- END - FREE  -->

<section class="services">
@include('layouts.site.partials._services')
</section>

<section class="contact" id="contact">
@include('layouts.site.partials._contact')
</section>
<!-- END - CONTACT -->
<section class="about" id="about">
@include('layouts.site.partials._about')
</section>
<!-- END ABOUT -->
<section class="pictures" id="pictures">
@include('layouts.site.partials._pictures')
</section>


@endsection