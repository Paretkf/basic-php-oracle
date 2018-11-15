<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include '../utils/head.php'
  ?>
  <style scoped>
    .body {
      height: calc(100vh - 100px);
    }
  </style>
</head>
<body>
  <?php
    include '../components/header.php'
  ?>
  <div class="body dp-flex">
    <?php
      include '../components/sidebar.php'
    ?>
    <div class="main-body pd-20px w-100pct">
      <div class="f-s-24px f-w-bold pd-vtc-10px dp-flex">
        <div class="w-fit-content">
          จัดการสมาชิก
        </div>
        <div class="w-fit-content">
        <button class="button mg-l-50px is-success">เพิ่ม</button>
        </div>
      </div>
      <div>
        <?php
          include '../utils/connect.php';
          $strSQL = "SELECT * FROM MEMBER LEFT OUTER JOIN MEMBER_TYPE USING(TYPE_ID)";
          $objParse = oci_parse ($objConnect, $strSQL);
          oci_execute ($objParse);
        ?>
        <table class="table is-bordered">
          <tr>
            <th class="t-al-center">รหัสสมาชิก</th>
            <th class="t-al-center">ชื่อ - นามสกุล</th>
            <th class="t-al-center">Email</th>
            <th class="t-al-center">Tel</th>
            <th class="t-al-center">ประเภทสมาชิก</th>
            <th class="t-al-center">รายละเอียด</th>
            <th class="t-al-center">ลบ</th>
          </tr>
          <?php
            while($objResult = oci_fetch_array($objParse,OCI_BOTH)) {
          ?>
          <tr>
            <td class="t-al-center">
              <?php echo $objResult["M_ID"];?>
            </td>
            <td>
              <?php echo $objResult["M_PREFIX"].' '.$objResult["M_NAME"].' '.$objResult["M_LASTNAME"];?>
            </td>
            <td class="t-al-center">
              <?php echo $objResult["M_EMAIL"];?>
            </td>
            <td class="t-al-center">
              <?php echo $objResult["M_TEL"];?>
            </td>
            <td class="t-al-center">
              <?php 
                if (!oci_field_is_null($objParse, 'TYPE_NAME')) {
                  echo $objResult["TYPE_NAME"];
                } else {
                  echo 'ไม่มีประเภท';
                }
              ?>
            </td>
            <td>
              <a class="cl-black">รายละเอียด</a>
            </td>
            <td>
              <button class="button is-small is-danger">ลบ</button>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
  <?php
    include '../components/footer.php';
  ?>
</body>
</html>