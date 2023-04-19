<?php
require_once '../Models/student.php';
require_once '../Layouts/header.php';
require_once '../Layouts/side_navigation.php';

$deletedStudent = Student::selectDeleted('id, name, email, address, phone_number, created_at, deleted_at');
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <?php require_once '../Layouts/navigation.php'; ?>
    
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Student Recycle Bin</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($deletedStudent as $student) {
                  ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $student['name']; ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $student['email']; ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0"><?php echo $student['address']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $student['phone_number']; ?></span>
                      </td>

                      <td class="align-middle text-center">
                        <div class="d-flex flex-column justify-content-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $student['created_at']; ?> Created</span>
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $student['deleted_at']; ?> Deleted</span>
                        </div>

                      </td>
                      <td class="align-middle">
                        <a href="http://localhost/php/OOP/student-management-system/studentController/restoreStudent.php?id=<?php echo $student['id']; ?>" style="color: #000000;">
                          <i class="material-icons opacity-10">restore</i>
                        </a>

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
    <?php require_once '../Layouts/footer.php'; ?>
  </div>
</div>