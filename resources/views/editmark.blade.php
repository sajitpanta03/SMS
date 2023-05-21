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
                                    <h6 class="text-white text-capitalize ps-3">Mark sheet</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <form action="{{ route('mark.add') }}" method="POST">
                                    @csrf
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-capitalize font-weight-bolder opacity-12">
                                                {{$student->name}} <br><span class="text-secondary text-xxs">{{$student->email}}</span>
                                            </th>
                                            
                                            <th 
                                            class="text-center text-uppercase text-secondary text-capitalize font-weight-bolder opacity-10">
                                            Exam:
                                            @foreach ($exam as $exam)    
                                            <span><input type="radio" id="exam_{{ $exam->id }}" name="exam_id" value="{{$exam->id}}">
                                            <label for="exam_{{ $exam->id }}">{{$exam->name}}</label></span>
                                            @endforeach
                                            </th>
                                        </tr>
                                        <tr>
                                            <th 
                                                class="text-left text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Subject
                                            </th>
                                            <th 
                                                class="text-left text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Full Mark
                                            </th>
                                            <th 
                                                class="text-left text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Pass Mark
                                            </th>
                                            <th 
                                                class="text-left text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Obtained Marks
                                            </th>
                                    </thead>
                                    <tbody>
                                        <td>
                                            <div class="d-flex px-2 py-1 text-left">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <ul style="list-style-type:none">
                                                            @foreach ($student->subjects as $subject)
                                                                <li>
                                                                    <div class="form-group">
                                                                    {{ $subject->name }}
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1 text-left">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <ul style="list-style-type:none">
                                                            @foreach ($student->subjects as $subject)
                                                                <li>
                                                                    <div class="form-group">
                                                                    {{ $subject->full_mark}}
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1 text-left">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <ul style="list-style-type:none">
                                                            @foreach ($student->subjects as $subject)
                                                                <li>
                                                                    <div class="form-group">
                                                                    {{ $subject->pass_mark }}
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <ul style="list-style-type:none">
                                                            @foreach ($student->subjects as $subject)
                                                            <li>
                                                                <div class="form-group">
                                                                <input type="hidden" name="full_mark[]" value="{{$subject->full_mark}}">
                                                                <input type="hidden" name="pass_mark[]" value="{{$subject->pass_mark}}">
                                                                <input type="hidden" name="subject_id[]" value="{{$subject->id}}">
                                                                <input type="number" name="mark[]" id="mark">
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <input type="hidden" name="student_id" id="student_id" value="{{$student->id}}">
                                            <button 
                                            type="submit" name="submit"  class="btn btn-primary"style="position: relative; left: 28%;">
                                            Submit
                                        </button>
                                        </td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
