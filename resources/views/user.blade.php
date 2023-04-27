@extends('Layouts.main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Users table</h6>
                                </div>
                                <div class="col-2">
                                    <a name="recycle" id="recycle" class="btn text-white"
                                        href="http://localhost/php/OOP/student-management-system/pages/userRecycle.php"
                                        role="button" style="background-color: #97214a;">Recycle Bin</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Address</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone Number</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created By</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $user->address }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $user->phone_number }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                @if ($user->creator != null)
                                                                    {{ $user->creator->name }}
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        {{ $user->creator->email }}</p>
                                                                @else
                                                                    null
                                                                @endif
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0"></p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $user->created_at }}
                                                            Created</span>
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $user->updated_at }}
                                                            Updated</span>
                                                    </div>

                                                </td>
                                                <td class="align-middle">
                                                    
                                                    <a href="{{route('users.edit', $user->id)}}" style="color: #000">
                                                        <i class="material-icons opacity-10">edit</i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                        @method('DELETE')
                                                        <button class="border-0 bg-white" type="submit">
                                                            <i class="material-icons opacity-10">delete</i>
                                                        </button>
                                                        @csrf
                                                    </form>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- add button -->
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-toggle="modal"
            data-target="#exampleModalLong">
            <i class="material-icons py-2">add</i>
        </a>
    </div>
    <!-- add button end -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="helpId" placeholder="Name" require_onced>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="helpId" placeholder="Email" require_onced>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" id="address"
                                    aria-describedby="helpId" placeholder="Address" require_onced>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone_number" id="phone"
                                    aria-describedby="helpId" placeholder="Phone" require_onced>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection