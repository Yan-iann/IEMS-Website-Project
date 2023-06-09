@extends('layouts.F_Layout')
@section('content')
<div class="container-fluid">

    <div class="row d-flex justify-content-between">
        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif

        @if (Session::get('sucess'))
        <div class="alert alert-success">
            {{ Session::get('sucess') }}
        </div>
        @endif
        <div class="col-12 col-md-6 col-lg-6 order-sm-2 order-md-1">
            <div class="home-content">
                <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center">
                    <i class='bx bx-menu'></i>
                    <span class="text">Critters</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6  order-sm-1 order-md-2">
            <form style="text-align: center;" class="form-inline my-2 my-lg=0" type="get" action="{{ route('searchWildlife') }}">
                <div class="input-group">
                    <input type="search" name="searchWildlife" class="form-control mr-sm2" placeholder="Search Critter Name">
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <div class="dropdown dropdown-lg">
                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalSearch" title="Filter"><i class='bx bx-filter-alt'></i></button>
                            </div>

                            <div class="dropdown dropdown-lg">
                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalSort" title="Sort"><i class='bx bx-sort'></i></button>
                            </div>


                            <button class="btn btn-info " type="submit">Search</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>




<section class="col-12">
    <div class="container-fluid">
        <div class="row g-5 m-4 p-0 d-flex align-items-stretch g-l">
            @foreach ($wildlifes as $item)
            <div class="col-12 col-md-4 col-lg-3 d-flex align-items-stretch">
                <div class="card " style="width: 18rem;" data-bs-toggle="modal" data-bs-target="#ModalWildlife{{ $item->info_ID }}">
                    <img class="card-img-top " src="{{ asset($item->wildlife_pic) }}" alt="Card image cap">
                    <div class="card-body bg-light text-primary">
                        <h5 class="card-title text-center fst-italic">{{ $item->wildlife_scientific_name }}</h5>
                        <p class="card-text text-center">{{ $item->wildlife_name }}</p>
                    </div>
                </div>
                @include('IEMS.Linus.FACULTY.editWildlife')
            </div>
            @include('IEMS.Linus.FACULTY.displayWildlife')
            @endforeach
        </div>
        <!--end of catalog-->
        <!-- Add Button -->
        <a class="float" data-bs-toggle="modal" data-bs-target="#ModalAddWl">
            <i class="bx bx-plus my-float"></i>
        </a>
    </div>
    <!--end of class container fluid-->
</section>






<!-- Delete Wildlife Modal-->
@foreach ($wildlifes as $item)
<form action="{{ route('deleteWildlife', $item->info_ID) }}" method="get" enctype="multipart/form-data">
    <div class="modal fade" id="ModalDeleteWl{{ $item->info_ID }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        {!! csrf_field() !!}
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content  bg-light">
                <div class="modal-header border-0 text-center">
                    <h5 class="modal-title  text-center">Confirmation</h5>
                    <button type="button" class="btn-close bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <p>Are you sure you want to delete this information card?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

<!-- Add Wildlife Modal-->
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="modal fade" id="ModalAddWl" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content  bg-light">

                <div class="modal-header border-0 text-center">
                    <h5 class="modal-title  text-center">Add Critter Information</h5>
                    <button type="button" class="btn-close btn-info bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">
                            <div class="col-12">
                                <label for="wildlife_pic">Critter Picture:</label>
                                <input type="file" id="wildlife_pic" class="form-control" placeholder="Wildlife Picture" name="wildlife_pic" required>
                            </div>
                            <div class="col-12">
                                <label for="formGroupExampleInput" class="form-label">Common Name</label>
                                <input type="input" class="form-control" placeholder="Enter Critter Name" name="wildlife_name" required>
                            </div>
                            <div class="col-12">
                                <label for="formGroupExampleInput" class="form-label">Scientific Name</label>
                                <input type="input" class="form-control" placeholder="Enter Critter Scientific Name" name="wildlife_scientific_name" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="formGroupExampleInput2" class="form-label">Class</label>
                                <input type="input" placeholder="Enter Critter Class" class="form-control" name="wildlife_class" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="formGroupExampleInput2" class="form-label">Order</label>
                                <input type="input" class="form-control" placeholder="Enter Critter Order" name="wildlife_order" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="formGroupExampleInput2" class="form-label">Family</label>
                                <input type="input" class="form-control" placeholder="Enter Critter Family" name="wildlife_family" required>
                            </div>
                            <div class="-12 col-md-4">
                                <label for="formGroupExampleInput2" class="form-label">Genus</label>
                                <input type="input" class="form-control" placeholder="Enter Critter Genus" name="wildlife_genus" name="wildlife_genus" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="formGroupExampleInput2" class="form-label">Species</label>
                                <input type="input" class="form-control" placeholder="Enter Critter Species" name="wildlife_species" required>
                            </div>
                            <div class="col-12">
                                <label for="formGroupExampleInput2" class="form-label">Location</label>
                                <input type="input" class="form-control" placeholder="Enter Critter Location" name="wildlife_location" required>
                            </div>

                            <div class="col-12">
                                <label for="formGroupExampleInput2" class="form-label">Date Added</label>
                                <input type="date" class="form-control" placeholder="Enter Date Added" name="date_added" required>
                            </div>

                            <!--Hidden Inputs-->
                            <input type="hidden" class="form-control" name="info_type" value="wildlife">
                            <input type="hidden" class="form-control" name="wildlife_type" value="Zoo">
                            <input type="hidden" class="form-control" name="wildlife_status" value="Approved">
                            <div class="col-12">
                                <label for="exampleFormControlinputarea1" class="form-label">Description</label>
                                <textarea class="form-control" name="wildlife_desc" rows="3" placeholder="Enter Critter Description" required></textarea>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="submit" class="btn btn-info text-white">Submit</button>
                                <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!--end of form-->

<!--advance search-->
<form action="{{ route('advanceSearchWildlife') }}" method="GET" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="modal fade" id="ModalSearch" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content  bg-light">

                <div class="modal-header border-0 text-center">
                    <h5 class="modal-title  text-center">Advance Search</h5>
                    <button type="button" class="btn-close btn-info bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row g-4 m-4 p-0 d-flex align-items-stretch">


                            {{-- Class Filter --}}
                            <div class="col-12">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6">
                                        <label class="focus-label">Class:</label>
                                    </div>
                                    <div class="col-6">
                                        <select class="select floating" id="" name="wildlife_class">
                                            <option></option>
                                            @foreach ($searchClass as $item)
                                            <option value="{{ $item->wildlife_class }}">{{ $item->wildlife_class }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            {{-- Species Filter --}}
                            <div class="col-12">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6">
                                        <label class="focus-label">Species:</label>
                                    </div>
                                    <div class="col-6">
                                        <select class="select floating p-1" id="" name="wildlife_species">
                                            <option></option>
                                            @foreach ($searchSpecie as $item)
                                            <option value="{{ $item->wildlife_species }}">
                                                {{ $item->wildlife_species }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            {{-- Critter Location Filter --}}
                            <div class="col-12">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6">
                                        <label class="focus-label">Location:</label>
                                    </div>

                                    <div class="col-6">
                                        <select class="select floating p-1" id="" name="wildlife_location">
                                            <option></option>
                                            @foreach ($searchLoc as $item)
                                            <option value="{{ $item->wildlife_location }}">
                                                {{ $item->wildlife_location }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer border-0">
                                <button type="submit" class="btn btn-info text-white">Search</button>
                                <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!--end of form-->

<div class="modal fade" id="ModalSort" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content  bg-light">

            <div class="modal-header border-0 text-center">
                <h5 class="modal-title  text-center">Sort Options</h5>
                <button type="button" class="btn-close btn-info bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">



                        {{-- Sort Options --}}

                        {{-- Alphabetical --}}
                        <div class="col-12">
                            <div class="row d-flex justify-content-between">
                                {{-- Label --}}
                                <div class="col-6">
                                    <label class="focus-label">Sort By Name:</label>
                                </div>
                                {{-- Options --}}
                                <div class="col-6">
                                    <div class="input-group-btn">
                                        <div class="btn-group" role="group">
                                            <div class="dropdown dropdown-lg">
                                                <a href="{{ route('sortNameDesc') }}">
                                                    <button type="button" class="btn btn-outline-dark" title="Descending">
                                                        <i class='bx bx-sort-a-z'></i> Desc
                                                    </button>
                                                </a>
                                            </div>

                                            <div class="dropdown dropdown-lg">
                                                <a href="{{ route('sortNameAsc') }}">
                                                    <button type="button" class="btn btn-outline-dark" title="Ascending">
                                                        <i class='bx bx-sort-z-a'></i> Asc
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        {{-- Date --}}
                        <div class="col-12">
                            <div class="row d-flex justify-content-between">
                                {{-- Label --}}
                                <div class="col-6">
                                    <label class="focus-label">Sort By Date Added:</label>
                                </div>
                                {{-- Options --}}
                                <div class="col-6 d-flex align-items-center">
                                    <div class="input-group-btn">
                                        <div class="btn-group" role="group">
                                            <div class="dropdown dropdown-lg">
                                                <a href="{{ route('dateAddedDesc') }}">
                                                    <button type="button" class="btn btn-outline-dark" title="Descending">
                                                        <i class='bx bx-sort-down'></i> Desc
                                                    </button>
                                                </a>
                                            </div>

                                            <div class="dropdown dropdown-lg">
                                                <a href="{{ route('dateAddedAsc') }}">
                                                    <button type="button" class="btn btn-outline-dark" title="Ascending">
                                                        <i class='bx bx-sort-up'></i> Asc
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection