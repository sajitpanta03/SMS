@extends('Layouts.main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container d-flex justify-content-center">
            <form class="mt-4 col-6 shadow pt-4" action="EditSubject/" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data['id'] }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Subject Name"
                        value="{{ $data['name'] }}">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="full_mark" id="full_mark"
                        aria-describedby="emailHelpId" placeholder="Full Mark" value="{{ $data['full_mark'] }}">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="pass_mark" id="pass_mark" placeholder="Pass Mark"
                        value="{{ $data['pass_mark'] }}">
                </div>
                <button type="submit" name="submit" class="btn btn-primary"
                    style="position: relative; left: 50%;">Edit</button>
            </form>
        </div>
    </main>
@endsection
