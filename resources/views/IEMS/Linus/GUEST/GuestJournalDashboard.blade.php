@extends('layouts.G_Layout')
@section('content')
    <div class="container-fluid">
        {{-- Page Name, and Burger Icon. AND Search Bar --}}
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-md-6 col-lg-6 order-sm-2 order-md-1">
                <div class="home-content">
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center">
                        <i class='bx bx-menu'></i>
                        <span class="text">Journal Articles</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 order-sm-1 order-md-2">
                <form style="text-align: center;"class="form-inline my-2 my-lg=0" type="get"
                    action="{{ route('G_searchJournal') }}">
                    {{-- uhm di pani sure ?? --}}
                    <div class="input-group">
                        <input type="search" name="searchJournal" class="form-control mr-sm2"
                            placeholder="Search Journal Article Title">
                        <div class="input-group-btn">
                            <div class="btn-group" role="group">
                                <div class="dropdown dropdown-lg">
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                        data-bs-target="#ModalSearch"><i class='bx bx-filter-alt'></i></button>
                                </div>
                                <button class="btn btn-info " type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        {{-- Information Cards --}}
        <section class="col-12">
            <div class="container-fluid">
                <div class="row g-5 m-4 p-0 d-flex align-items-stretch">
                    @foreach ($journal as $item)
                        <div class="col-12 col-md-4 col-lg-3 d-flex align-items-stretch" data-bs-toggle="modal"
                            data-bs-target="#ModalJournal{{ $item->info_ID }}">
                            <div class="card " style="width: 18rem;">
                                <div class="card-body bg-light ">
                                    <p class="text-muted fst-italic">{{ $item->date_published }}</p>
                                    <h4 class="card-title">{{ $item->journal_title }}</h4>
                                    <br>
                                    <p class="card-subtitle mb-2 text-muted">{{ $item->journal_author }}</p>
                                </div>
                                <div class="card-footer border-0"></div>
                            </div>
                        </div>
                        @include('IEMS.Linus.GUEST.displayJournal')
                    @endforeach
                </div>
            </div>
        </section>


        <!--advance search-->
        <form action="{{ route('G_advanceSearchJournal') }}" method="GET" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="modal fade" id="ModalSearch" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content  bg-light">

                        <div class="modal-header border-0 text-center">
                            <h5 class="modal-title  text-center">Advance Search</h5>
                            <button type="button" class="btn-close btn-info bg-info" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">

                                    {{-- Refernce Filter --}}
                                    <div class="col-12">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-6">
                                                <label class="focus-label">Reference:</label>
                                            </div>
                                            <div class="col-6">
                                                <select class="select floating p-1" id="" name="journal_reference">
                                                    <option></option>
                                                    @foreach ($searchRef as $item)
                                                        <option value="{{ $item->journal_reference }}">
                                                            {{ $item->journal_reference }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Published Filter --}}
                                    <div class="col-12">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-6">
                                                <label class="focus-label">Date Published:</label>
                                            </div>
                                            <div class="col-6">
                                                <select class="select floating p-1" id="" name="date_published">
                                                    <option></option>
                                                    @foreach ($searchDate as $item)
                                                        <option value="{{ $item->date_published }}">
                                                            {{ $item->date_published }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-0">
                                        <button type="submit" class="btn btn-info text-white">Search</button>
                                        <button type="button" class="btn btn-outline-info"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end of form-->
    </div>
@endsection
