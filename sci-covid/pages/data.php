<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";
require($_SERVER['DOCUMENT_ROOT'].'/science/function/function.php');?>
<?php
    use App\Model\Covid\Magor;
    $magorObj = new Magor;
    use App\Model\Covid\Cl;
    $clObj = new Cl;
    use App\Model\Covid\Data;
    $dataObj = new Data;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sci-covid</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sci-covid/components/link.php";?>
</head>

<body class="font-sriracha">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sci-covid/components/navbar.php";?>
<div class="container">
    <div class="card mt-5 shadow">
      <h5 class="card-header bg-primary text-white">ข้อมูลผู้ติดเชื้อ</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-md-8">
            <form class="d-flex" action="" method="post">
              <label for="datepicker"class="form-label"><b class="">เลือกวันที่ต้องการ</b></label>
              <input type="text" id="datepicker" class="form-control me-2" required autocomplete="off" name="datesearch">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
        <hr>
        <?php
          if(isset($_REQUEST['datesearch'])){
            $datenow = datethai($_REQUEST['datesearch']);
            $date1 = $_REQUEST['datesearch']." 00:00:00";
            $date2 = $_REQUEST['datesearch']." 23:59:59";
            $ldate = $date1." - ".$date2;
            echo "
              <h5 class='card-title mt-5 text-center text-primary'>รายงานวันที่ {$datenow}</h5>
              <p class='text-center'>{$ldate}</p>
              <a href='/science/certificate/pdf/sci_covid.php?date={$datenow}&date1={$date1}&date2={$date2}' target='_blank'>Export PDF <i class='bx bxs-file-pdf'></i></a>
            ";
          }else{
            $datenow = datethai(date('Y-m-d'));
            $date1 = date("Y-m-d 00:00:00");
            $date2 = date("Y-m-d 23:59:59");
            $ldate = $date1." - ".$date2;
            echo "
            <h5 class='card-title mt-5 text-center text-primary'>รายงานวันที่ {$datenow}</h5>
            <p class='text-center'>{$ldate}</p>
            <a href='/science/certificate/pdf/sci_covid.php?date={$datenow}&date1={$date1}&date2={$date2}' target='_blank'>Export PDF <i class='bx bxs-file-pdf'></i></a>
            ";
          }
        ?>
       

          
      </div>
    </div>
    <?php
        $department = $magorObj->getDepartment();
        $color = "";
        $num = 0;
        foreach($department as $de){
            $num++;
            switch ( $num) {
                case 1:
                  $color="primary";
                  break;
                case 2:
                  $color="secondary";
                  break;
                case 3:
                  $color="success";
                  break;
                case 4:
                  $color="danger";
                  break;
                case 5:
                  $color="warning";
                  break;
                case 6:
                  $color="info";
                  break;
                case 7:
                  $color="light";
                  break;
                case 8:
                  $color="dark";
                  break;
                default:
                    $color="";
              }

            echo "
                <div class='card mt-2 border-primary '>
                    <h5 class='card-header bg-warning'>{$de['department']}</h5>
                    <div class='card-body table-responsive'>
                    <table class='table  table-hover  table-{$color}'>
                        <thead class='table-light'>
                            <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>รหัสนักศึกษา</th>
                            <th scope='col'>ชื่อ-สกุล</th>
                            <th scope='col'>เบอร์โทร</th>
                            <th scope='col'>สาขา</th>
                            <th scope='col'>ภาควิชา</th>
                            <th scope='col'>ปี</th>
                            <th scope='col'>วันที่ทราบผล</th>
                            <th scope='col'>ATK</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
                    $stus = $dataObj->getAllDataByDepart($de['d_id'],$date1,$date2);
                    $i=0;
                    // print_r($stus);
                    foreach($stus as $stu){
                        $i++;
                        $name = $stu['name']." ".$stu['surname'];
                        // $date_covid = date_format(date_create($stu['date_covid']),"d-m-Y");
                        $date_covid =datethai($stu['date_covid']);
                        echo "
                            <tr class='fs-14'>
                                <th scope='row'>{$i}</th>
                                <td>{$stu['stu_num']}</td>
                                <td>{$name}</td>
                                <td>{$stu['tel']}</td>
                                <td>{$stu['magor']}</td>
                                <td>{$stu['department']}</td>
                                <td>{$stu['class']}</td>
                                <td>{$date_covid}</td>
                                <td>
                                <a class=' btn btn-sm text-white btn-primary' href='/science/sci-covid/pages/show-img.php?imges_id={$stu['images_id']}&name={$name}&date_covid={$stu['date_covid']}' target='_blank'>ATK</a>
                                
                                </td>
                            </tr>
                        ";
                    }




            echo "
                        </tbody>
                    </table>
                    </div>
                </div>
            ";
            ?>
            <?php
            
        }
    ?>
    
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

    
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = exampleModal.querySelector('.modal-title')
    var modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = 'New message to ' + recipient
    modalBodyInput.value = recipient
})
</script>

<script type="text/javascript">
        $(function(){
            $("#datepicker").datepicker({
                language:'th-en',
                format: 'yyyy-mm-dd',
                minDate: 0,
                autoclose: true
                
            });
        });
    </script>
</body>

</html>