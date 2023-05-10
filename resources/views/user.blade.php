@extends('Layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ url('/') }}/css/trashbutton.css">
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Super Users</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 pb-2">
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
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($super_users as $super_user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $super_user->name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $super_user->email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $super_user->address }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $super_user->phone_number }}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $super_user->created_at }}
                                                            Created</span>
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $super_user->updated_at }}
                                                            Updated</span>
                                                    </div>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Users</h6>
                                </div>

                                @if (session()->has('super_user'))
                                    <div class="col-2 text-right">
                                        <a href="{{ route('users.trash') }}" class="icon-container">
                                            <i class="material-icons opacity-10"
                                                style="color: #fff; font-size: 30px">restore_from_trash</i>
                                            <div class="tooltip">Trash</div>
                                        </a>
                                    </div>
                                @endif


                            </div>
                        </div>
                        <div class="card-body p-0 pb-2">
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($users as $user)
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

                                                @if (session()->has('super_user'))
                                                    <td class="align-middle d-flex">

                                                        <a href="{{ route('users.edit', $user->id) }}" style="color: #000">
                                                            <i class="material-icons opacity-10">edit</i>
                                                        </a>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            <button class="border-0 bg-white" type="submit">
                                                                <i class="material-icons opacity-10">delete</i>
                                                            </button>
                                                            @csrf
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @empty
                                            <tr>
                                                <td><span class="text-secondary text-ls font-weight-bold">User Recycle Bin
                                                        is Empty</span>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @if (session()->get('super_user') == 1)
        <!-- add button -->
        <div class="fixed-plugin ">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-toggle="modal"
                data-target="#exampleModalLong">
                <i class="material-icons py-2">add</i>
            </a>
        </div>
        <!-- add button end -->
    @endif

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
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                    aria-describedby="helpId" placeholder="Name" required>
                                <small class="form-text text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                    aria-describedby="helpId" placeholder="Email" required>

                                <small class="form-text text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"
                                    aria-describedby="helpId" placeholder="Address" required>

                                <small class="form-text text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone_number" id="phone" value="{{ old('phone_number') }}"
                                    aria-describedby="helpId" placeholder="Phone" required>

                                <small class="form-text text-danger">
                                    @error('phone_number')
                                        {{ $message }}
                                    @enderror
                                </small>
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

@section('script')
    @if ($errors->all())
        <script>
            $('#exampleModalLong').modal('show');
        </script>
    @endif
@endsection
