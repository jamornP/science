<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<?php
    use App\Model\Pr\Work;
    $workObj = new Work();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="">
    <title>ปฏิทินงาน PR</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/pr/components/link.php"; ?>
</head>

<body class="font-sriracha">
<?php 
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/science/pr/components/navbar.php"; 
?>
<div class="container-fluid mt-5">
    <div class="row">
     
    </div>
    
    <div class="row">
    </div>

    <div class="card">
        <h5 class="card-header bg-177 text-white">ปีงบประมาณ 2566</h5>
        <div class="d-flex flex-row-reverse bd-highlight">
            <button type="button" class="btn  text-white mt-2 me-md-2 shadow mb-2 rounded bg-265" data-bs-toggle="modal" data-bs-target="#exampleModal">
                เพิ่มข้อมูล
            </button>
        </div>
        <div class="card-body ">
            <div class="row">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">เรื่อง</th>
                    <th scope="col" width="15%">วันที่เริ่ม</th>
                    <th scope="col" width="15%">วันที่สิ้นสุด</th>
                    <th scope="col" width="10%">action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $data = $workObj->getAllByUser($_SESSION['id']);
                    $i = 0;
                    foreach($data as $work){
                      $i++;
                      $start = datethai($work['start_date'])." เวลา ".$work['start_time'];
                      $end = datethai($work['end_date'])." เวลา ".$work['end_time'];
                      echo "
                        <tr>
                          <td>{$i}</td>
                          <td>{$work['title']}</td>
                          <td>{$start}</td>
                          <td>{$end}</td>
                          <td><a href='/science/pr/pages/work/edit.php?id={$work['staff_id']}'><i class='bx bx-calendar-edit'></i> แก้ไข</a>  </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
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
    $('#exampleModal').on('shown.bs.modal', function () {
            $('#title').focus()
        })
</script>
</body>
</html>