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
        <div class="col-lg-4">

        </div>
    <div class="col-lg-4">
        
    <div class="card">
        <form action="/science/pr/pages/work/save.php" method="post">
            <div class="card-header">
                แก้ไข
            </div>
            <div class="card-body">
                <?php 
                    $data = $workObj->getWorkById($_REQUEST['id']);
                    // print_r($data);
                ?>
                <div class="mb-3">
                        <label for="title" class="form-label">เรื่อง :</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title'];?>" autofocus>
                        <input type="text" class="form-control" id="edit" name="edit" value="edit" >
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $_REQUEST['id'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">วันที่เริ่ม :</label>
                        <input type="text" class="form-control" id="start_date" name="start_date" autocomplete="off" value="<?php echo $data['start_date'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">เวลา :</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $data['start_time'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">วันที่สิ้นสุด :</label>
                        <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off" value="<?php echo $data['end_date'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">เวลา :</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $data['end_time'];?>">
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
                        <input type="text" class="form-control" id="url" name="url" autocomplete="off" value="<?php echo $data['url'];?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="col-lg-4">

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