<?php
include_once(__DIR__ . '/../head.php');
?>

<style>
  .temp {
    color: black
  }
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 mb-3">
      <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <?php
        $stab = 'usuario';
        if (isset($_GET['stab'])) {
          $stab = $_GET['stab'];
        }
        //echo "<HR>stab=" . $stab;
        ?>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "usuario") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=usuario" role="tab" style="color:black">Usuários</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "clientes") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=clientes" role="tab" style="color:black">Clientes</a>
        </li>

    

      </ul>
    </div>
    <div class="col-md-10">
      <?php
          $ssrc = "";

          if ($stab == "usuario") {
            $ssrc = "usuario.php";
          }
          if ($stab == "clientes") {
            $ssrc = "clientes.php";
          }
    

          if ($ssrc !== "") {
            //echo $ssrc;
            include($ssrc);
          }

      ?>

    </div>
  </div>



</div>
