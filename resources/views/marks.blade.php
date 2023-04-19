<?php
require '../Models/student.php';
require '../Layouts/header.php';
$_SESSION['active'] = 'marks';
require '../Layouts/side_navigation.php';
require_once '../Models/subject.php';


$Students = Student::select("id, name" );
$subjects = Subject::select("id, name");


?>

<main class="main-content position-relative max-height-vh-100 h-100  border-radius-lg ">

  <?php require '../Layouts/navigation.php'; ?>

  <div class="container-fluid py-4 w-70">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <div class="col-10">
                <h6 class="text-white text-capitalize ps-3">Students</h6>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                   
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($Students as $Student) {
                  ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <?php $student_id=  $Student['id'];?>
                            <label for="student_id"> <a href="../marksController/fetchMarks.php?id=<?php echo $student_id?>"><h6 class="mb-0 text-sm"><?php echo $Student['name']; ?></h6></a></label>
                            
                          </div>
                        </div>
                      </td>
                    </tr>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require '../Layouts/footer.php'; ?>
  </div>
</main>

<div class="fixed-plugin">
  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-toggle="modal" data-target="#exampleModalLong">
    <i class="material-icons py-2">add</i>
  </a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Student Mark</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../marksController/addMark.php" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="sname" class="col-sm-2 col-form-label">Name</label>
            <select class="form-control col-sm-8" name="sname" id="sname" aria-describedby="helpId">
              <?php foreach($Students as $student){?>
              <option value="<?php echo $student['id']  ?>"><?php echo $student['name']  ?></option>
              <?php } ?>
            </select>
          </div>
         
          <div class="form-group row">
            <label for="subject" class="col-sm-2 col-form-label" >subject</label>
            <select class="form-control col-sm-8" name="subject" id="subject" aria-describedby="helpId" >
          <?php
          foreach($subjects as $subject){?>
              <option value="<?php echo $subject['id']?>"> <?php echo $subject['name']?></option>
          <?php } ?>
            </select>
          </div>

          <div class="form-group row">
            <label for="Full_mark" class="col-sm-2 col-form-label">Full Mark</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="Full_mark" id="Full_mark" aria-describedby="helpId" placeholder="Full mark" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="Pass_Mark" class="col-sm-2 col-form-label">Pass Mark</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="Pass_Mark" id="Pass_Mark" aria-describedby="helpId" placeholder="Pass Mark" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="Obtained_Mark" class="col-sm-2 col-form-label">Obtained Mark</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="Obtained_Mark" id="Obtained_Mark" aria-describedby="helpId" placeholder="Obtained Mark" required>
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