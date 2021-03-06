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
          จัดการหนังสือ
        </div>
        <div class="w-fit-content">
        <button class="button mg-l-50px is-success">เพิ่ม</button>
        </div>
      </div>
      <div>
        <?php
          include '../utils/connect.php';
          $strSQL = "SELECT * FROM BOOK LEFT OUTER JOIN CATEGRORY USING(CAT_ID)";
          $objParse = oci_parse ($objConnect, $strSQL);
          oci_execute ($objParse);
        ?>
        <table class="table is-bordered">
          <tr>
            <th class="t-al-center">รหัสหนังสือ</th>
            <th class="t-al-center">ชื่อหนังสือ</th>
            <th class="t-al-center">ผู้แต่ง</th>
            <th class="t-al-center">ปีที่พิมพ์</th>
            <th class="t-al-center">ค่าปรับ</th>
            <th class="t-al-center">จำนวนหนังสือ</th>
            <th class="t-al-center">ประเภท</th>
            <th class="t-al-center">แก้ไข</th>
            <th class="t-al-center">ลบ</th>
          </tr>
          <?php
            while($objResult = oci_fetch_array($objParse,OCI_BOTH)) {
          ?>
          <tr>
            <td class="t-al-center">
              <?php echo $objResult["BOOK_ID"];?>
            </td>
            <td>
              <?php echo $objResult["BOOK_NAME"];?>
            </td>
            <td>
              <?php echo $objResult["BOOK_AUTHOR"];?>
            </td>
            <td>
              <?php echo $objResult["BOOK_YEAR"];?>
            </td>
            <td>
              <?php echo $objResult["BOOK_ADJUST"];?>
            </td>
            <td>
              <?php echo $objResult["BOOK_AMOUT"];?>
            </td>
            <td>
              <?php 
                if (!oci_field_is_null($objParse, 'CAT_NAME')) {
                  echo $objResult["CAT_NAME"];
                } else {
                  echo 'ไม่มีประเภท';
                }
              ?>
            </td>
            <td>
              <button class="button is-small is-warning">แก้ไข</button>
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
    include '../components/footer.php'
  ?>
</body>
</html>