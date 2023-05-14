@extends('Layouts.main')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<div class="container d-flex justify-content-center" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Teacher Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="EditTeacher" method="post">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="id" value="{{ $Teacher['id'] }}">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" value="{{ $Teacher['name'] }}" placeholder="Name" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" value="{{ $Teacher['email'] }}" placeholder="Email" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId" value="{{ $Teacher['address'] }}" placeholder="Address" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" value="{{ $Teacher['phone_number'] }}" placeholder="Phone" required>
            </div>
          </div>

          <h5>Subjects</h5>

          <?php
          $teacherId= $Teacher['id'];
          $subjectIds = $Teacher->teacher_subject()->where('teacher_id', $teacherId)->get();
         // dd($Teacher->subject()->get());
           foreach($subjects as $subject){ // This "$subjects" also known as key or object returned here as a associative array from TeacherController's "ShowTeacherAndSubject" function. 
          ?>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" id="perm_{{ $subject->id }}" 
              @foreach ($subjectIds as $subjectId)
                  
              @if($subject['id']==$subjectId['subject_id']) checked=checked @endif 
              @endforeach
              name="subjects_id[]" value="<?php echo $subject['id']?>">
              <?php echo $subject['name']?>
            </label>
          </div>
          <?php 
            }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
        </div>
      </form>

    </div>
  </div>
</div>
</main>
@endsection
