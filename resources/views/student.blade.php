@extends('Layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ url('/') }}/css/trashbutton.css">
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Student table</h6>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="{{ route('students.trash') }}" class="icon-container">
                                        <i class="material-icons opacity-10"
                                            style="color: #fff; font-size: 30px">restore_from_trash</i>
                                        <div class="tooltip">Trash</div>
                                    </a>
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
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Added By</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Subjects</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($students as $student)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $student->name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $student->email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $student->address }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $student->phone_number }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{ $student?->creator?->name }}
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0"></p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <ul>
                                                                    @foreach ($student->subjects as $subject)
                                                                        <li>
                                                                            {{ $subject->name }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0"></p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $student->created_at }}
                                                            Created</span>
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $student->updated_at }}
                                                            Updated</span>
                                                    </div>

                                                </td>
                                                <td class="align-middle d-flex">
                                                    <a href="{{ route('students.edit', $student->id) }}"
                                                        style="color: #000000;">
                                                        <i class="material-icons opacity-10">edit</i>
                                                    </a>
                                                    <form action="{{ route('students.destroy', $student->id) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        <button class="border-0 bg-white" type="submit">
                                                            <i class="material-icons opacity-10">delete</i>
                                                        </button>
                                                        @csrf
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td><span class="text-secondary text-ls font-weight-bold">Student not
                                                        registered yet</span>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-toggle="modal"
            data-target="#exampleModalLong">
            <i class="material-icons py-2">add</i>
        </a>
    </div>

    {{-- model to add student --}}
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Student Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('students.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}" aria-describedby="helpId" placeholder="Name" require_onced>
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
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email') }}" aria-describedby="helpId" placeholder="Email"
                                    require_onced>
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
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{ old('address') }}" aria-describedby="helpId" placeholder="Address"
                                    require_onced>
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
                                <input type="number" class="form-control" name="phone_number" id="phone"
                                    value="{{ old('phone_number') }}" aria-describedby="helpId" placeholder="Phone"
                                    require_onced>

                                <small class="form-text text-danger">
                                    @error('phone_number')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <h5>Subjects</h5>

                        @foreach ($subjects as $subject)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="subjects_id[]"
                                        value="<?php echo $subject['id']; ?>">
                                    <?php echo $subject['name']; ?>
                                </label>
                            </div>
                        @endforeach
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
