@extends('Layouts.main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <form class="col-6" action="{{ route('users.update', $user->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="phone_number" id="phone" value="{{ $user->phone_number }}"
                        required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </main>
@endsection
