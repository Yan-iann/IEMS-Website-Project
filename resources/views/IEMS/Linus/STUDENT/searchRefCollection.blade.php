@extends('layouts.S_Layout')
@section('content')

    <div class="container-fluid">
        {{-- Page Name, and Burger Icon. AND Search Bar --}}
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-md-6 col-lg-6 order-sm-2 order-md-1">
                <div class="home-content">
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center">
                        <i class='bx bx-menu'></i>
                        <span class="text">Reference Search Results</span>
                    </div>
                </div>
            </div>

                    <div class="col-12 col-md-6 col-lg-6 order-sm-1 order-md-2">
                        <form style="text-align: center;"class="form-inline my-2 my-lg=0" type="get" action="{{ route('S_searchRef') }}">
                            <div class="input-group">
                                <input type="search" name="searchRef" class="form-control mr-sm2"
                                    placeholder="Search Reference Collection">
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
            </div>


        {{-- informationcards --}}
        <div class="container-fluid">
            <div class="row g-5 m-4 p-0 d-flex align-items-stretch">
                @if($wildlifes->count())
                @foreach ($wildlifes as $item)
                    <div class="col-12 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;" data-bs-toggle="modal"
                            data-bs-target="#ModalWildlife{{ $item->info_ID }}">
                            <img class="card-img-top "src="{{ asset($item->wildlife_pic) }}" alt="Card image cap">
                            <div class="card-body bg-light text-primary">
                                <h5 class="card-title text-center fst-italic">{{ $item->wildlife_scientific_name }}</h5>
                                <p class="card-text text-center">{{ $item->wildlife_name }}</p>
                            </div>
                        </div>

                    </div>
                    @include('IEMS.Linus.STUDENT.displayRefCollection')
                @endforeach
                @else
                    <h3>No records found</h3>
                @endif
            </div>
            <!--end of catalog-->
        </div>
        <!--end of class container fluid-->



<!--advance search-->
<form action="{{ route('S_advanceSearchRef') }}" method="GET" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="modal fade" id="ModalSearch" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content  bg-light">

            <div class="modal-header border-0 text-center">
              <h5 class="modal-title  text-center">Advance Search</h5>
              <button type="button" class="btn-close btn-info bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="container-fluid">
                <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">

                {{-- Genus Filter --}}
                <div class="col-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-6">
                            <label class="focus-label">Genus:</label>
                        </div>
                        <div class="col-6">
                            <select class="select floating p-1" id="" name="wildlife_genus">
                                <option></option>
                                @foreach ($searchGenus as $item)
                                    <option value="{{ $item->wildlife_genus }}">{{ $item->wildlife_genus }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                {{--    Date Added
  <div class="col-12">
    <div class="row d-flex justify-content-between">
        <div class="col-6">
  <label class="focus-label">Bone Added Date:</label>
        </div>
        <div class="col-6">
    <select class="select floating" id="" name="date_added">
      <option></option>
      @foreach ($searchDate as $item)
      <option value="{{ $item->date_added }}">{{$item->date_added}}</option>
      @endforeach
    </select>
        </div>
    </div>
  </div> --}}


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
@endsection
