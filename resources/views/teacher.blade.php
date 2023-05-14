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
                                    <h6 class="text-white text-capitalize ps-3">Teachers table</h6>
                                </div>
                                <div class="col-2">
                                  <a name="recycle" id="recycle" class="btn text-white" href="http://localhost/php/OOP/student-management-system/pages/teacherRecycle.php" role="button" style="background-color: #97214a;">Recycle Bin</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ADDRESS</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PHONE</th>
                                            
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Subjects</th>
                                            
                                            <th
                                                class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>

                                                <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td >
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $teacher['name'] }}</h6>
                                                            <p class="text-xs text-secondary mb-0"> {{ $teacher['email'] }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    <p class="text-xs text-secondary mb-0"> {{ $teacher['address'] }}</p>
                                                </td>
                                                <td>

                                                    <p class="text-xs text-secondary mb-0">{{ $teacher['phone_number'] }}</p>
                                                </td>

                                                <td>
                                                <?php
                                                $teacherId= $teacher['id'];
                                                $subjectIds= $teacher->teacher_subject()->where('teacher_id', $teacherId)->get();
                                                foreach($subjects as $subject){
                                                ?>
                                                 @foreach ($subjectIds as $subjectId)
                                                 @if($subject['id']==$subjectId['subject_id']) 
                                                 
                                                 <p class="text-xs text-secondary mb-0">{{ $subject['name'] }}</p>
                                                 
                                                 @endif 

                                                    @endforeach

                                                    <?php 
                                                }
                                                ?>
                                                </td>


                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <span class="text-secondary text-xs font-weight-bold">
                                                            {{ $teacher['created_at'] }} Created</span>
                                                        <span class="text-secondary text-xs font-weight-bold">
                                                            {{ $teacher['updated_at'] }} Updated</span>
                                                    </div>

                                                </td>
                                                <td class="align-middle">
                                                    <a href={{'EditTeacher/' . $teacher['id']}}
                                                        style="color: #000000;">
                                                        <i class="material-icons opacity-10">edit</i>
                                                    </a>
                                                    <a href={{ 'DeleteTeacher/' . $teacher['id'] }} style="color: #000000;">
                                                        <i class="material-icons opacity-10">delete</i>
                                                    </a>

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


    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href={{ 'AddTeacher' }}>
            <i class="material-icons py-2">add</i>
        </a>
    </div>
@endsection
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>



</body>

</html>
