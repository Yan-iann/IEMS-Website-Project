@extends('layouts.A_Layout')
@section('content')
    <div class="container-fluid">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Student Accounts</span>
        </div>
    </div>


    @if(Session::get('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail')}}
    </div>
    @endif

    @if(Session::get('sucess'))
        <div class="alert alert-success">
          {{ Session::get('sucess')}}
        </div>
    @endif

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <form style="text-align: center;"class="form-inline my-2 my-lg=0" type="get" action="">
                            <td></td>
                            <td></td>
                            <td><input type="search" name="searchUser" class="form-control mr-sm2"
                                    placeholder="Search User"></td>
                            <td><button class="btn btn-primary btn-sm" type="submit">Search</button></td>
                        </form>
                    </tr>
                </thead>
            </table>
        </div>
        <!--end of search bar-->

        <br>
        <div class="table-responsive">
            <table class="table table-hover mg-b-0 text-center" id="maintables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                        <tr>
                            <td class="align-middle">{{ $user->id }}</td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ $user->password }}</td>
                            <td class="align-middle">{{ $user->user_type }}</td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#ModalEditUser{{ $user->id }}"><i class='bx bxs-edit'></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#ModalDeleteUser{{ $user->id }}"> <i
                                        class='bx bx-trash'></i></button>
                            </td>
                        </tr> <!--end of table row-->
                        
                        <!-- Edit User Modal-->
                        <form action="{{ route('updateUser', $user->id) }}" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="ModalEditUser{{ $user->id }}" tabindex="-1"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                {!! csrf_field() !!}
                                <div class="modal-dialog modal-dialog-centered modUal-dialog-scrollable modal-lg">
                                    <div class="modal-content  bg-light">

                                        <div class="modal-header border-0 text-center">
                                            <h5 class="modal-title  text-center">User Account Details</h5>
                                            <button type="button" class="btn-close btn-info bg-info"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">

                                                    <div class="col-12">
                                                        <label for="formGroupExampleInput" class="form-label">User
                                                            Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $user->name }}">

                                                        <div class="col-12">
                                                            <label for="formGroupExampleInput" class="form-label">User
                                                                Email</label>
                                                            <input type="text" class="form-control" name="email"
                                                                value="{{ $user->email }}">
                                                        </div>

                                                        <div class="col-12 col-lg-4">
                                                            <label for="formGroupExampleInput2" class="form-label">User
                                                                Type</label>
                                                            <input type="text" class="form-control" name="user_type"
                                                                value="{{ $user->user_type }}">
                                                        </div>

                                                        <div class="col-12">
                                                            {{-- Filler Collumn --}}
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="formGroupExampleInput2" class="form-label">User
                                                                Password</label>
                                                            <input type="password" class="form-control" name="password"
                                                                value="{{ $user->password }}">
                                                        </div>

                                                        <div class="modal-footer border-0">
                                                            <button type="submit" class="btn btn-info"
                                                                style="color:white">Update</button>
                                                            <button type="button" class="btn btn-outline-info"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Delete Wildlife Modal-->
                        <form action="{{ route('deleteUser', $user->id) }}" method="get" enctype="multipart/form-data">
                            <div class="modal fade" id="ModalDeleteUser{{ $user->id }}" tabindex="-1"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                {!! csrf_field() !!}
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content  bg-light">
                                        <div class="modal-header border-0 text-center">
                                            <h5 class="modal-title  text-center">Confirmation</h5>
                                            <button type="button" class="btn-close bg-info" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body border-0">
                                            <p>Are you sure you want to delete this User Account?</p>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <button type="button" class="btn btn-outline-info"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end of delete modal-->

                    @endforeach
                </tbody> <!--end of table body-->
            </table> <!--end of table-->
        </div><!--end of container-->
        

        <a class="float" data-bs-toggle="modal" data-bs-target="#ModalAddUser">
            <i class="bx bx-plus my-float"></i>
        </a>


        <!-- Add User Modal-->
        <form action="{{ route('storeUserInfo') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="ModalAddUser" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0 text-center">
                            <h5 class="modal-title  text-center">Add Student Account</h5>
                            <button type="button" class="btn-close btn-info bg-info" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row g-4 m-4 p-0 d-flex align-items-stretch g-l">

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label for="formGroupExampleInput" class="form-label">First Name</label>
                                        <input type="input" class="form-control" placeholder="Enter First Name" name="name" required>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label for="formGroupExampleInput" class="form-label">Middle Name</label>
                                        <input type="input" class="form-control" placeholder="Enter Middle Name"
                                            name="middle_name">
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label for="formGroupExampleInput" class="form-label">Last Name</label>
                                        <input type="input" placeholder="Enter Last Name" class="form-control"
                                            name="last_name" required>
                                    </div>

                                    <div class="col-12">
                                        {{-- Filler --}}
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="formGroupExampleInput" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter email" required>
                                    </div>

                                    <input type="hidden" class="form-control" placeholder="Enter user type "
                                        name="user_type" value="Student">

                                    <div class="col-12">
                                        {{-- Filler --}}
                                    </div>

                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label">Password</label>
                                        <input type="input" name="password" class="form-control"
                                            placeholder="Enter Password " required>
                                    </div>

                                    <div class="modal-footer border-0">
                                        <button type="submit" class="btn btn-info text-white">Create Account</button>
                                        <button type="button" class="btn btn-outline-info"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
            </div>
        </form>
@endsection
