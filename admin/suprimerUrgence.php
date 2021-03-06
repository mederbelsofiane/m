<?php include "../php/database.php" ?>
<?php include "../php/urgence.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>

<?php
  if(!isset($_GET['id_urgence'])){
    redirect_to('profile.php');
  }
  $id_urgence = $_GET['id_urgence'];
  $urgence = Urgence::find_by_id($id_urgence);
  if($urgence == false) {
    redirect_to('index.php');
  }
  if(is_post_request()) {


    $result = $urgence->delete();

    $_SESSION['message'] = 'lurgence a était Suprimer.';
    redirect_to('urgence.php');

  } else {
    // display the form
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../ressources/css/style_admin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../fontawesome/js/all.js"></script>
    <style media="screen">
    @media (max-width: 768px) {
      .sidebar {
        position: static;
        height: auto;
      }
      .top-navbar {
        position: static;
      }
    }
    </style>
  </head>
  <body >
    <?php
    include'../html/admin/navbar.php'
      ?>
      <section>
      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col-md-5 ml-3">
                <div class=" text-danger mb-3">
                  <a href="<?php echo ('urgence.php'); ?>">&laquo; Back to urgences</a><br>
                  <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">suprimer une Urgence</h3>
                </div>
                <div class="">
                  <div class="alert alert-danger position-static">
                  <h5>Voulez vous Suprimer cette urgence ?</h5>
                  <p class="pt-1"> <?php echo h($urgence->name()); ?></p>
                  </div>
                <form action="<?php echo ('suprimerUrgence.php?id_urgence=' . h(u($id_urgence))); ?>" method="post" class=" ">
                  <button type="submit" class="btn btn-danger">Suprimer l' urgence</button>
                </form>
                </div>
              </div>
          <div class="col-md-2">
          </div>
          <div class="col-md-5">
          </div>
        </div>
          </div>
        </div>
      </div>
    </section>
       <script src="../bootstrap/js/jquery.min.js" ></script>
       <script src="../bootstrap/js/popper.min.js"></script>
       <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
