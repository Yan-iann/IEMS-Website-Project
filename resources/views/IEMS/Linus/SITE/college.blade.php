@extends('layouts.IEMS_Layout')
@section('content')
    <section class="mbr-section article"
        style="background-color: #1DA2d8; padding-top: 180px;
padding-bottom: 180px; height:75vh" data-scroll-section>

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6 text-left ">
                    <h1 class=" text-white display-2 subheader">The Institution</h1>
                    <h1 class="lead">The Vision and Mission of what makes IEMS an identity</h1>
                </div>
                <div class="col-12 col-md-6 ">
                    <div class="image-stack">
                        <div class="image-stack__item image-stack__item--top3" data-scroll data-scroll-speed="2">
                            <img src="{{ URL::asset('img/College_header1.jpg') }}" alt="Fish">
                        </div>

                        <div class="image-stack__item image-stack__item--bottom3" data-scroll data-scroll-speed="-1"
                            data-scroll-direction="horizontal">
                            <img src="{{ URL::asset('img/college_header2.jpg') }}" alt="Divers" style="width:60%">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <section class="mbr-section article"
        style="background-color: #FBFBFB; padding-top: 120px; padding-bottom:120px; object-fit:cover;" data-scroll-section>
        <div class="container">
            <div class="row d-flex justify-content-center">

                {{-- Heading --}}
                <div class="col-12 text-center" style="margin-bottom: 100px">
                    <p class=" fw-bold mb-0" style="color: #252525">
                        THE COLLEGE
                    </p>

                    <h1 class="subheader fst-italic fw-light m-0" style="color: #1DA2D8">
                        History
                    </h1>

                </div>


                <div class="col-12" style="margin-bottom: 50px">
                    <div class="row d-flex justify-content-center align-items-center ">

                        <div class="col-12 col-md-6 col-lg-6 mb-5 d-flex justify-content-end order-sm-1">
                            <img src="{{ URL::asset('img/College_desc1.jpg') }}" alt="Divers">
                        </div>



                        <div
                            class="col-12 col-md-6 col-lg-6 d-flex justify-content-start align-items-center order-sm-2 text-justify">
                            <p class="lead">
                                Silliman University Marine Laboratory (SUML) was established as a research facility of the
                                University in 1974,
                                with materials recycled from a torn Science Building in the main campus. Facilities have
                                improved considerably
                                since then, from a one-building unit to four buildings. Today it boasts of a two-storey
                                facility constructed
                                with support from the United States Agency for International Development under its Coastal
                                Resource Management program.
                            </p>
                        </div>

                        <div class="mx-auto">
                        </div>
                    </div>
                </div>


                <div class="col-12" style="margin-bottom: 50px">
                    <div class="row d-flex justify-content-center align-items-center text-justify">

                        <div
                            class="col-12 col-md-6 col-lg-6 d-flex justify-content-start align-items-center order-sm-2 order-lg-1 order-md-1 text-justify">
                            <p class="lead">
                                The new building houses four laboratories: marine botany, biochemistry, and genetics,
                                invertebrate
                                and vertebrate. It has a modest library, herbarium and zoological museum, conference room,
                                visiting
                                scientists’ and administrative offices. There is also a dive shop, flowing
                                seawater/freshwater
                                systems, stand-by generator, experimental ponds and tanks, culture facilities and mangrove
                                garden.
                                IEMS is also equipped with wireless networks available for scientists and students.
                            </p>
                        </div>

                        <div
                            class="col-12 col-md-6 col-lg-6 mb-5 d-flex justify-content-end order-sm-1 order-lg-2 order-md-2">
                            <img src="{{ URL::asset('img/College_desc2.jpg') }}" alt="Divers">
                        </div>

                        <div class="mx-auto">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row d-flex justify-content-center align-items-center ">

                        <div class="col-12 col-md-6 mb-5 d-flex justify-content-end order-sm-1" style="padding:20px">
                            <img src="{{ URL::asset('img/College_desc3.jpg') }}" alt="Divers" style="width: 100%">
                        </div>



                        <div class="col-12 col-md-6 d-flex justify-content-start align-items-center order-sm-2"
                            style="padding:20px">
                            <p class="lead">
                                On August 25, 2009, the buildings and grounds of SUML were renamed Dr. Angel C. Alcala
                                Environment
                                and Marine Science Laboratories. It was in recognition of Dr. Alcala who together with Prof.
                                Rodolfo
                                Gonzales and other faculty of the biology department, established the marine laboratory in
                                1974.
                            </p>
                        </div>

                        <div class="mx-auto">
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>

    {{-- Contact Us Block  --}}
    @include('IEMS.Linus.SITE.contact_block')
@endsection
