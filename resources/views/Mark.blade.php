@extends('Layouts.main')

@section('content')
{{-- {{dd($mark)}}; --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Marks table</h6>
                                </div>
                                <div class="col-2">
                                    <form action="{{ route('mark.search') }}" method="GET">
                                        <input type="text" name="keyword" placeholder="Search..." class="form-control">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th  rowspan='2' class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th rowspan='2'
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Subject</th>
                                            <th rowspan='2'
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                FM</th>
                                            <th rowspan='2'
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                PM</th>
                                            <th colspan="4"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                OM
                                            </th>
                                            <th rowspan='2' class="text-secondary opacity-7"></th>
                                        </tr>
                                        <tr>
                                        @foreach ($exam as $ex)
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{$ex->name}}
                                        </th>
                                        @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($students as $student)
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
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <ul style="list-style-type:none">
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
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <ul style="list-style-type:none">
                                                                    @foreach ($student->subjects as $subject)
                                                                        <li>
                                                                            {{ $subject->full_mark }}
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
                                                                            {{ $subject->pass_mark }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0"></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                @foreach($exam as $ex)
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <ul style="list-style-type:none">
                                                                    
                                                                    @foreach ($mark as $num)
                                                                        <li>@if($num->student_id == $student->id  && $num->exam_id == $ex->id)
                                                                            
                                                                            {{$num->obtained_mark}}

                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0"></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endforeach
                                                
                                                <td class="align-middle">
                                                    <a href="{{ route('selectMark', $student->id) }}" style="color: #000000;">
                                                        <i class="material-icons opacity-10">edit</i>
                                                    </a>
                                                </td>
                                                
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{$students->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>


    {{-- model to add student --}}
@endsection
