<?php include "../php/database.php" ?>
<?php include "../php/patient.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init_patient.php') ?>
<?php require_login_patient(); ?>
<?php    $id_patient = $session_patient->get_id();

  if(!$id_patient) {
    redirect_to('index.php');
  }?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient</title>
    <link rel="stylesheet" href="../ressources/css/style_patient.css">
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
  <body>
    <?php
    include'../html/patient/navbar.php'
      ?>
      <section>

        <div class="container-fluid ">
          <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
              <div class="row pt-md-5 mt-md-3 mb-5">
                <div class="col-md-12">

                  <div class="font-weight-bold ml-2">
                    <h3 class="text-info"><i class="far fa-calendar-check fa-lg pb-1"></i> Mes Rendez-Vous: </h3>
                  </div>
              </div>
              <div class="col-md-5">
                <table class="table table-striped table-bordered text-center table-responsive-md">
                  <thead>
                    <tr>
                      <th scope="col">#Id RV</th>
                      <th scope="col">Date du rendez vous</th>
                      <th scope="col">heure debut</th>
                      <th scope="col">heure fin</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = Patient::find_all_patient();
                    ?>
                    <?php   while($row = $result->fetch_assoc())
                    { if ($id_patient == $row['id_patient']) {
                      // code...
                      ?>
                      <tr>
                      <th scope="row"> <?php echo h($row['id_rendez_vous']) ?> </th>
                      <td><?php echo h($row['date_rendez_vous']); ?></td>
                      <td><?php echo h($row['heure_d']); ?></td>
                      <td><?php echo h($row['heure_fin']); ?></td>
                    <?php } }?>
                      </tr>
                  </tbody>
               </table>
               <a  class="btn btn-info btn-lg" href="ajouterRendezVous.php">Ajouter un RendezVous</a>

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
