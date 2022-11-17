@extends('layouts.S_Layout')
@section('content')

    <div class="container-fluid">
        <div class="col-12">

            <div class="row d-flex justify-content-around">
                <div class="home-content">
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center">
                        <i class='bx bx-menu'></i>
                        <span class="text">Critters Search Results</span>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <form style="text-align: center;"class="form-inline my-2 my-lg=0" type="get"
                            action="{{ route('S_searchWildlife') }}">
                            <div class="input-group">
                                <input type="search" name="searchWildlife" class="form-control mr-sm2"
                                    placeholder="Search Critter Name">
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <div class="dropdown dropdown-lg">
                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalSearch"><i class='bx bx-filter-alt'></i></button>
                                        </div>
                                        <button class="btn btn-info " type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>

        <section class="col-12">
        <div class="container-fluid">
            <div class="row g-5 m-4 p-0 d-flex align-items-stretch g-l">
              @if($wildlife->count())
                @foreach ($wildlife as $item)
                    <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="card border-dark" style="width: 18rem;" data-bs-toggle="modal"
                            data-bs-target="#ModalWildlife{{ $item->info_ID }}">
                            <img class="card-img-top "src="{{ asset($item->wildlife_pic) }}" alt="Card image cap">
                            <div class="card-body bg-light text-primary">
                                <h5 class="card-title text-center">{{ $item->wildlife_name }}</h5>
                                <p class="card-text text-center">({{ $item->wildlife_scientific_name }})</p>
                            </div>
                        </div>
                        
                    </div>
                    @include('IEMS.Linus.STUDENT.displayWildlife')
                @endforeach
                @else
                <h3>No records found</h3>
                @endif
            </div>
            <!--end of catalog-->
        </div>
        <!--end of class container fluid-->
        </section>

       
<!--advance search-->
<form action="{{ route('S_advanceSearchWildlife') }}" method="GET" enctype="multipart/form-data">
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
                <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">

                  <div class="col-12">
                  <label class="focus-label">Critter Class:</label>
                    <select class="select floating" id="" name="wildlife_class">
                      <option></option>
                      @foreach($searchClass as $item)
                      <option value="{{ $item->wildlife_class }}">{{$item->wildlife_class}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-12">
                  <label class="focus-label">Critter Specie:</label>
                    <select class="select floating" id="" name="wildlife_species">
                      <option></option>
                      @foreach($searchSpecie as $item)
                      <option value="{{ $item->wildlife_species }}">{{$item->wildlife_species}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-12">
                  <label class="focus-label">Wildlife Location:</label>
                    <select class="select floating" id="" name="wildlife_location">
                      <option></option>
                      @foreach($searchLoc as $item)
                      <option value="{{ $item->wildlife_location }}">{{$item->wildlife_location}}</option>
                      @endforeach
                    </select>
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
</form><!--end of form-->
    </div>
@endsection