<?php
require_once '../Models/subject.php';
require_once '../Layouts/header.php';
$_SESSION['active'] = 'subject';
require_once '../Layouts/side_navigation.php';


$subjects = Subject::select();

// echo '<pre>';
// print_r($subjects);
// echo '</pre>';
// $subject = new Subject();

// $subject->insert([
//   'name' =>  'david',
//   'full_mark' => '100',
//   'pass_mark' => '40'
// ]);
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <?php require_once '../Layouts/navigation.php'; ?>

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <div class="col-10">
                <h6 class="text-white text-capitalize ps-3">Subject table</h6>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full Marks</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pass Marks</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($subjects as $subject){
                  ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $subject['name']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        
                        <p class="text-xs text-secondary mb-0"><?php echo $subject['full_mark']; ?></p>
                      </td>
                      <td>
                        
                        <p class="text-xs text-secondary mb-0"><?php echo $subject['pass_mark']; ?></p>
                      </td>
                   

                      <td class="align-middle text-center">
                        <div class="d-flex flex-column justify-content-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $subject['created_at']; ?> Created</span>
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $subject['updated_at']; ?> Updated</span>
                        </div>

                      </td>
                      <td class="align-middle">
                        <a href="../forms/subjectedit.php?id=<?php echo $subject['id']; ?>" style="color: #000000;">
                          <i class="material-icons opacity-10">edit</i>
                        </a>
                        <a href="../subjectController/deleteSubject.php?id=<?php echo $subject['id']; ?>" style="color: #000000;">
                          <i class="material-icons opacity-10">delete</i>
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
</main>


<div class="fixed-plugin">
  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="http://localhost/php/OOP/student-management-system/forms/subjectAdd.php">
    <i class="material-icons py-2">add</i>
  </a>
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