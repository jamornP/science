<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Pr\User;
$userObj = new User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>ปฏิทินงาน PR</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/pr/components/link.php"; ?>
</head>

<body class="font-sriracha">
<?php 
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/science/pr/components/navbar.php"; 
?>
<?php 
    if(isset($_REQUEST['msg'])){
        if($_REQUEST['msg']=='ok'){
            $mes="บันทึกข้อมูลเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 100000 })</script>";   
        }
        if($_REQUEST['msg']=='edit'){
            $mes="แก้ไขข้อมูลเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 100000 })</script>";   
        }
        
    }
?>
<div class="container-fluid mt-5">
    <div class="row">
        <?php 
            // for($i=1;$i<=300;$i++){
            //     echo "
            //             <div style='width: 40px; height: 20px;' class='bg-{$i}'>{$i}</div>
            //     ";
            // }
        ?>
    </div>
    
    <div class="row">
    <?php 
        // for($j=1;$j<=340;$j++){
        //     $k=$j+1;
        //     echo "
        //         <div class='col '>
        //             <div class='info-box bg-{$j} shadow mb-2 rounded'>
        //                 <span class='info-box-icon bg-{$k} elevation-1'><i class='bx bx-edit-alt'></i></span>
        //                 <div class='info-box-content '>
        //                     <span class='info-box-text'>แจ้งซ่อม</span>
        //                     <span class='info-box-number'>
        //                     {$j}
        //                     <small>งาน</small>
        //                     </span>
        //                 </div>
        //             </div>
        //         </div>
        //     ";
        // }
    ?>
        
        
    </div>

    <div class="card">
        <h5 class="card-header bg-177 text-white">ปีงบประมาณ 2566</h5>
        <div class="d-flex flex-row-reverse bd-highlight">
            <?php
            if($_SESSION['login']){
                echo "
                    <a type='button' class='btn  text-white mt-2 me-md-2 shadow mb-2 rounded bg-265' href='/science/pr/pages/work/index.php'>
                        เพิ่มข้อมูล
                    </a>
                ";
            }
            ?>
            
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div style="margin:50px 0 50px 0;" id='calendar' class="fs-14"></div>
                    <div style="margin:10px 0 50px 0;" align="center"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <div class="row">
            <?php
                $dataUser = $userObj->getAllUser();
                foreach($dataUser as $user){
                    $fullname = $user['name']." ".$user['surname'];
                    echo "
                    <div class='col-6 '>
                        <div class='info-box shadow mb-2 rounded' style='background-color: {$user['color']}'>
                            <span class='info-box-icon elevation-1 text-white'><i class='bx bx-user' ></i></span>
                            <div class='info-box-content '>
                                <span class='info-box-text text-white'>{$fullname}</span>
                                
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="/science/pr/pages/work/save.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลงาน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="title" class="form-label">เรื่อง :</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title">
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">วันที่เริ่ม :</label>
            <input type="text" class="form-control" id="start_date" name="start_date" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">เวลา :</label>
            <input type="time" class="form-control" id="start_time" name="start_time">
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">วันที่สิ้นสุด :</label>
            <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">เวลา :</label>
            <input type="time" class="form-control" id="end_time" name="end_time">
        </div>
        <div class="mb-3">
            <label for="staii_id" class="form-label">งานของ :</label>
            <select class="form-select" aria-label="Default select example" name="staff_id">
                <option selected value="<?php echo $_SESSION['id'];?>"><?php echo $_SESSION['name']." ".$_SESSION['surname'];?></option>
                <option value="99">งาน PR ทุกคน</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Link url :</label>
            <input type="text" class="form-control" id="url" name="url" autocomplete="off">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    jQuery(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            
            eventLimit: true, 
            defaultDate: new Date(),
            timezone: 'Asia/Bangkok',
            
            events: {
                url: './dataEvents.php',
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            },

            eventClick: function(event) {
                if (event.url) {
                    $.fancybox({
                        'href': event.url,
                        'type': 'iframe',
                        'autoScale': false,
                        'openEffect': 'elastic',
                        'openSpeed': 'fast',
                        'closeEffect': 'elastic',
                        'closeSpeed': 'fast',
                        'closeBtn': true,
                        onClosed: function() {
                            parent.location.reload(true);
                        },
                        helpers: {
                            thumbs: {
                                width: 50,
                                height: 50
                            },

                            overlay: {
                                css: {
                                    'background': 'rgba(49, 176, 213, 0.7)'
                                }
                            }
                        }
                    });
                    return false;
                }
            },
        });
    });
</script>
<script>
    $(function(){
        $("#start_date").datepicker({
            language:'th-en',
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $("#end_date").datepicker({
            language:'th-en',
            format:'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>
</body>
</html>