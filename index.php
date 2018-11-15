<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'utils/head.php'
  ?>
  <style scoped>
    .body {
      height: calc(100vh - 100px);
    }
    .foot {
      height: 40px;
      width: 100%;
    }
  </style>
</head>
<body>
  <?php
    include 'components/header.php'
  ?>
  <div class="body">
    <?php
      include 'components/sidebar.php'
    ?>
    <div class="main-body">

    </div>
  </div>
  <?php
    include 'components/footer.php'
  ?>
</body>
</html>