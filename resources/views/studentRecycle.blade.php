@extends('Layouts.main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Deleted Students</h6>
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
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created By</th>
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
                                                            <p class="text-xs text-secondary mb-0">{{ $student->email }}</p>
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
                                                                @if ($student->creator != null)
                                                                    {{ $student->creator->name }}
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        {{ $student->creator->email }}</p>
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
                                                            class="text-secondary text-xs font-weight-bold">{{ $student->created_at }}
                                                            Created</span>
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $student->deleted_at }}
                                                            Deleted</span>
                                                    </div>

                                                </td>
                                                <td class="align-middle d-flex">

                                                    <a href="{{ route('students.restore', $student->id) }}" style="color: #000">
                                                        <i class="material-icons opacity-10">restore</i>
                                                    </a>
                                                    <a href="{{ route('students.delete', $student->id) }}" style="color: #000">
                                                        <i class="material-icons opacity-10">delete</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td><span
                                                        class="text-secondary text-ls font-weight-bold">student Recycle Bin is Empty</span>
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
@endsection
