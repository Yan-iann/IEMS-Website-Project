@extends('layouts.F_Layout')
@section('content')
<body>
<div class="home-section">
<div class="home-content">
    <span class="text">Critters</span>
</div>
</div>


<div class="table-responsive">
                        <table class="table">
                             <thead>
                                <tr>
                                  <form style="text-align: center;"class="form-inline my-2 my-lg=0" type="get" action="{{ route('searchWildlife') }}">
                                    <td></td>
                                    <td><a data-bs-toggle="modal" data-bs-target="#ModalSearch"><i class='bx bx-filter-alt'></i></a></td>
                                    <td><input type="search" name="searchWildlife" class="form-control mr-sm2" placeholder="Search Critter Name"></td>
                                    <td><button class="btn btn-info btn-sm" type="submit" style="color: white">Search</button></td>
                                  </form>
                                </tr>
                              </thead>
                       </table><!--end of table-->
    </div> <!--end of table-->

      <div class="container-fluid">
        <div class="row g-5 m-4 p-0 d-flex align-items-stretch g-l">
          @foreach($wildlifes as $item)
          <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch">
            <div class="card border-dark" style="width: 18rem;" data-bs-toggle="modal" data-bs-target="#ModalWildlife{{$item->info_ID}}">
              <img class="card-img-top "src="{{ asset($item->wildlife_pic) }}" alt="Card image cap">
                <div class="card-body bg-light text-primary">
                  <h5 class="card-title text-center fst-italic">{{$item->wildlife_scientific_name}}</h5>
                  <p class="card-text text-center">>{{$item->wildlife_name}}</p>
                </div>
            </div>
            @include('IEMS.Linus.FACULTY.editWildlife')
          </div>
          @include('IEMS.Linus.FACULTY.displayWildlife')
          @endforeach
        </div><!--end of catalog-->
        <!-- Add Button -->
        <a class="float" data-bs-toggle="modal" data-bs-target="#ModalAddWl">
          <i class="bx bx-plus my-float"></i>
        </a>
      </div><!--end of class container fluid-->
<!-- Delete Wildlife Modal-->
@foreach($wildlifes as $item)
<form action="{{ route('deleteWildlife',$item->info_ID) }}" method="get" enctype="multipart/form-data">
      <div class="modal fade" id="ModalDeleteWl{{$item->info_ID}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
              <h5 class="modal-title  text-center">Add Wildlife Information</h5>
              <button type="button" class="btn-close btn-info bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="container-fluid">
                <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">
                  <div class="col-12">
                    <label for="wildlife_pic">Wildlife Picture:</label>
                    <input type="file" id="wildlife_pic" class="form-control"  placeholder="Wildlife Picture" name="wildlife_pic">
                  </div>
                  <div class="col-12">
                    <label for="formGroupExampleInput" class="form-label">Wildlife Name</label>
                    <input type="input" class="form-control"  placeholder="Enter Wildlife Name" name="wildlife_name">
                  </div>
                  <div class="col-12">
                    <label for="formGroupExampleInput" class="form-label">Scientific Name</label>
                    <input type="input" class="form-control" placeholder="Enter Wildlife Scientific Name" name="wildlife_scientific_name" >
                  </div>
                  <div class="col-12 col-md-4">
                    <label for="formGroupExampleInput2" class="form-label">Class</label>
                    <input type="input" placeholder="Enter Wildlife Class" class="form-control" name="wildlife_class" >
                  </div>
                  <div class="col-12 col-md-4">
                    <label for="formGroupExampleInput2" class="form-label">Order</label>
                    <input type="input" class="form-control"  placeholder="Enter Wildlife Order" name="wildlife_order" >
                  </div>
                  <div class="col-12 col-md-4">
                    <label for="formGroupExampleInput2" class="form-label">Family</label>
                    <input type="input" class="form-control" placeholder="Enter Wildlife Family" name="wildlife_family" >
                  </div>
                  <div class="-12 col-md-4">
                    <label for="formGroupExampleInput2" class="form-label">Genus</label>
                    <input type="input" class="form-control" placeholder="Enter Wildlife Genus"  name="wildlife_genus"  name="wildlife_genus" >
                  </div>
                  <div class="col-12 col-md-4">
                    <label for="formGroupExampleInput2" class="form-label">Specie</label>
                    <input type="input" class="form-control" placeholder="Enter Wildlife Species"  name="wildlife_species" >
                  </div>
                  <div class="col-12">
                    <label for="formGroupExampleInput2" class="form-label">Location</label>
                    <input type="input" class="form-control"  placeholder="Enter Wildlife Location" name="wildlife_location" >
                  </div>

                  <div class="col-12">
                    <label for="formGroupExampleInput2" class="form-label">Date Added</label>
                    <input type="date" class="form-control"  placeholder="Enter Date" name="date_added" >
                  </div>

                    <!--Hidden Inputs-->
                    <input type="hidden" class="form-control" name="info_type" value="wildlife">
                    <input type="hidden" class="form-control" name="wildlife_type" value="Zoo">
                    <input type="hidden" class="form-control"  name="wildlife_status" value="Approved">
                  <div class="col-12">
                    <label for="exampleFormControlinputarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="wildlife_desc" rows="3" placeholder="Enter Wildlife Description"></textarea>
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
</form><!--end of form-->

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
</body>
@endsection


