@extends('Layouts.main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <form class="col-6" action="{{ route('students.update', $student->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}"
                        require_onced>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $student->email }}"
                        require_onced>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" id="address" value="{{ $student->address }}"
                        require_onced>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="phone_number" id="phone"
                        value="{{ $student->phone_number }}" require_onced>
                </div>
            </div>

            <h5>Subjects</h5>

            @foreach ($subjects as $subject)
                <div class="form-check">
                    <label class="form-check-label">
                        @php
                            $checked = false;
                        @endphp
                        @foreach ($student->subjects as $sub)
                            @if ($sub->name == $subject->name)
                                <input type="checkbox" class="form-check-input" name="subjects_id[]"
                                    value="{{ $subject->id }}" checked>
                                @php
                                    $checked = true;
                                @endphp
                            @endif
                        @endforeach

                        @if (!$checked)
                            <input type="checkbox" class="form-check-input" name="subjects_id[]"
                                value="{{ $subject->id }}">
                        @endif
                        {{ $subject->name }}
                    </label>
                </div>
            @endforeach

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </main>
@endsection
