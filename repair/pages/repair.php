<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Repair\Repair;
$repairObj = new Repair;
use App\Model\Repair\Building;
$buildingObj = new Building;
use App\Model\Repair\Department;
$departmentObj = new Department;
use App\Model\Repair\Type;
$typeObj = new Type;
use App\Model\Repair\Nature;
$natureObj = new Nature;
use App\Model\Repair\Status;
$statusObj = new Status;
// $building = $buildingObj->getBuilding();
// print_r($building);
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งซ่อม</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/repair/components/link.php"; ?>
    
</head>

<body class="font-sriracha">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/repair/components/navbar.php"; ?>
<?php
    $perpage = 10;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start = ($page - 1) * $perpage;
    $total_record = $repairObj->getRowsRepairByYear(yearterm(date('Y-m-d')));
    $total_page = ceil($total_record / $perpage);
    // echo $total_record;
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
            //                     <span class='info-box-text text-white'>แจ้งซ่อม</span>
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
            <p>
                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                   รายงานแยกประเภท
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body bg-12">
                    <div class='row g-4'>
                    <?php 
                        $datat = $typeObj->getType();
                        foreach($datat as $type){
                            $typeR = $repairObj->getRowsRepairByType(yearterm(date('Y-m-d')),$type['t_id']);
                            // <i class='bx bxl-ok-ru'></i> {$type['t_name']} จำนวน {$typeR} งาน
                            $per = number_format(($typeR*100/$total_record),2);
                            echo "
                            
                                <div class='col-sm-12 col-md-4 col-lg-3 col-xl-3 text-primary'>
                                    <div class='card text-white bg-primary mb-3' style='max-width: 18rem;'>
                                        <div class='card-header text-center'>{$type['t_name']}</div>
                                        <div class='card-body bg-white'>
                                            <h5 class='card-title text-center fs-35 text-primary'>{$typeR}</h5>
                                            <p class='card-text text-center text-danger'>{$per} %</p>
                                        </div>
                                        <div class='card-footer bg-transparent border-success'>
                                            <div class='row g-1'>
                            ";
                            $status = $statusObj->getStatus();
                            foreach($status as $datas){
                                $color = statusRepair($datas['s_id']);
                                $srow = $repairObj->getRowsRepairByTypeStatus(yearterm(date('Y-m-d')),$type['t_id'],$datas['s_id']);
                                            echo "
                                                <div class='col-8'>
                                                    <div class='d-grid gap-2'>
                                                        <button class='btn btn-sm btn-success text-white ' type='button'>{$datas['s_name']}</button>
                                                    </div>
                                                </div>
                                                <div class='col-4'>
                                                    <div class='d-grid gap-2'>
                                                        <button class='btn btn-sm btn-warning text-white ' type='button'>{$srow}</button>
                                                    </div>
                                                </div>
                                            ";
                            }
                            echo "
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class='d-grid gap-2'>
                                       
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                    </div>  
                </div>
            </div> 

            
        </div>
        <br>
        
        <div class="card">
            <form id="add" action="save.php" method="post">
                <h5 class="card-header bg-primary text-white"><i class='bx bxs-devices bx-rotate-90 bx-tada' style='color:#ffffff'  ></i> ฟอร์มข้อมูลแจ้งซ่อมไฟฟ้าและประปา </h5>
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button type="button" class="btn btn-danger text-white mt-2 me-md-2 shadow mb-2 rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class='bx bxs-wrench bx-burst bx-flip-horizontal' > </i> แจ้งซ่อม
                    </button>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="4%" scope="col">#</th>
                            <th width="5%" scope="col">วันที่แจ้ง</th>
                            <th width="" scope="col">รายละเอียด</th>
                            <th width="5%" scope="col">ห้อง</th>
                            <th width="10%" scope="col">อาคาร</th>
                            <th width="8%" scope="col">ประเถท</th>
                            <th width="8%" scope="col">ลักษณะงาน</th>
                            <th width="10%" scope="col">ผู้แจ้ง</th>
                            <th width="10%" scope="col">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $year_term = yearterm(date('Y-m-d'));
                            $datar = $repairObj->getRepairByYear($year_term,$start,$perpage);
                            $i = $start;
                            foreach($datar as $data){
                                $i++;
                                $date_add = datethai($data['date_add']);
                                $color = statusRepair($data['s_id']);
                                echo "
                                    <tr>
                                        <th scope='row'>{$i}</th>
                                        <td class='fs-10'>{$data['date_add']}</td>
                                        <td>{$data['r_remark']}</td>
                                        <td class='fs-14'>{$data['room']}</td>
                                        <td class='fs-12'>{$data['b_name']}</td>
                                        <td class='fs-14'>{$data['t_name']}</td>
                                        <td class='fs-14'>{$data['n_name']}</td>
                                        <td class='fs-14'>{$data['fullname']}</td>
                                        <td class='fs-14'><i class='bx bx-chevron-right-square bx-flip-horizontal bx-tada bg-{$color} text-white' ></i> {$data['s_name']}</td>
                                    
                                    </tr>
                                ";
                            }
                            ?>
                            
                            
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <div class="col-sm-12 col-md-5">
                            <?php 
                            $scount = $start+1;
                                echo "แสดงข้อมูล {$scount} ถึง {$i} จากทั้งหมด {$total_record} รายการ"
                            ?>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <nav aria-label="Page navigation example ">
                                <ul class="pagination justify-content-end">
                                    <?php 
                                        if($page ==1){
                                            $d = "disabled";
                                        }else{
                                            $d="";
                                        }
                                    ?>
                                    <li class="page-item <?php echo $d;?>">
                                        <a class="page-link" href="repair.php?page=<?php echo $page-1;?>" aria-label="Previous">
                                            Previous
                                        </a>
                                    </li>
                                    <?php 
                                    if($total_page > 5){
                                        if($page < 5){
                                            for($i=1;$i<=5;$i++){ 
                                                if($i==$page){
                                                    $a = "active";
                                                }else{
                                                    $a = "";
                                                }
                                                
                                                echo "
                                                    <li class='page-item {$a}'>
                                                        <a class='page-link ' href='repair.php?page={$i}'>
                                                            {$i}
                                                        </a>
                                                    </li>
                                                ";
                                            
                                            } 
                                            echo "
                                                <li class='page-item disabled'>
                                                    <a class='page-link ' href=''>
                                                        ...
                                                    </a>
                                                </li>
                                            ";
                                            echo "
                                                <li class='page-item '>
                                                    <a class='page-link ' href='repair.php?page={$total_page}'>
                                                        {$total_page}
                                                    </a>
                                                </li>
                                            ";
                                        }elseif($page > 4 && $page < ($total_page-3)){
                                            echo "
                                                <li class='page-item '>
                                                    <a class='page-link ' href='repair.php?page=1'>
                                                        1
                                                    </a>
                                                </li>
                                            ";
                                            echo "
                                                <li class='page-item disabled'>
                                                    <a class='page-link ' href=''>
                                                        ...
                                                    </a>
                                                </li>
                                            ";
                                            for($i=$page-1;$i<=$page+1;$i++){ 
                                                if($i==$page){
                                                    $a = "active";
                                                }else{
                                                    $a = "";
                                                }
                                                
                                                echo "
                                                    <li class='page-item {$a}'>
                                                        <a class='page-link ' href='repair.php?page={$i}'>
                                                            {$i}
                                                        </a>
                                                    </li>
                                                ";
                                            
                                            } 
                                            echo "
                                                <li class='page-item disabled'>
                                                    <a class='page-link ' href=''>
                                                        ...
                                                    </a>
                                                </li>
                                            ";
                                            echo "
                                                <li class='page-item '>
                                                    <a class='page-link ' href='repair.php?page={$total_page}'>
                                                        {$total_page}
                                                    </a>
                                                </li>
                                            ";
                                        }else{
                                            echo "
                                                <li class='page-item '>
                                                    <a class='page-link ' href='repair.php?page=1'>
                                                        1
                                                    </a>
                                                </li>
                                            ";
                                            echo "
                                                <li class='page-item disabled'>
                                                    <a class='page-link ' href=''>
                                                        ...
                                                    </a>
                                                </li>
                                            ";
                                            for($i=$total_page-4;$i<=$total_page;$i++){ 
                                                if($i==$page){
                                                    $a = "active";
                                                }else{
                                                    $a = "";
                                                }
                                                
                                                echo "
                                                    <li class='page-item {$a}'>
                                                        <a class='page-link ' href='repair.php?page={$i}'>
                                                            {$i}
                                                        </a>
                                                    </li>
                                                ";
                                            
                                            } 
                                        }
                                        

                                    }else{
                                        for($i=1;$i<=$total_page;$i++){ 
                                            if($i==$page){
                                                $a = "active";
                                            }else{
                                                $a = "";
                                            }
                                            
                                            echo "
                                                <li class='page-item {$a}'>
                                                    <a class='page-link ' href='repair.php?page={$i}'>
                                                        {$i}
                                                    </a>
                                                </li>
                                            ";
                                        
                                        } 
                                    }
                                   
                                    ?>
                                    <?php 
                                        if($page ==$total_page){
                                            $d = "disabled";
                                        }else{
                                            $d="";
                                        }
                                    ?>
                                    <li class="page-item <?php echo $d;?>">
                                        <a class="page-link" href="repair.php?page=<?php echo $page+1;?>" aria-label="Next">
                                            Next
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลแจ้งซ่อม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add" action="save.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="year_term" class="form-label">ปีงบประมาณ</label>
                            <input type="text" class="form-control" id="year_term" value="<?php echo yearterm(date('Y-m-d'));?>" name="year_term" required readonly>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="year_term" class="form-label">ปีงบประมาณ</label> -->
                            <input type="hidden" class="form-control" id="s_id" value="1" name="s_id" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">ชื่อ - สกุล</label>
                            <input type="text" class="form-control" id="fullname" placeholder="" name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="d_id" class="form-label">หน่วยงาน</label>
                            <select class="form-select" aria-label="Default select example" id="d_id"  name="d_id" required>
                                <option selected disable>กรุณาเลือก</option>
                                    <?php
                                        $datad = $departmentObj->getDepartment();
                                        foreach($datad as $depart){
                                            echo "
                                                <option value='{$depart['d_id']}'>{$depart['d_name']}</option>
                                            ";
                                        }
                                    ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tel" class="form-label">เบอร์ติดต่อ</label>
                            <input type="text" class="form-control" id="tel" placeholder="" name="tel" required>
                        </div>
                        <div class="mb-3">
                            <label for="room" class="form-label">ห้อง</label>
                            <input type="text" class="form-control" id="room" placeholder="" name="room" required>
                        </div>
                        <div class="mb-3">
                            <label for="b_id" class="form-label">อาคาร</label>
                            <select class="form-select" aria-label="Default select example" id="b_id"  name="b_id" required>
                                <option selected disable >กรุณาเลือก</option>
                                    <?php
                                        $building = $buildingObj->getBuilding();
                                        foreach($building as $datab){
                                            echo "
                                                <option value='{$datab['b_id']}'>{$datab['b_name']}</option>
                                            ";
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t_id" class="form-label">ประเภท</label>
                            <select class="form-select" aria-label="Default select example" id="t_id"  name="t_id" required>
                                <option selected disable>กรุณาเลือก</option>
                                    <?php
                                        $datat = $typeObj->getType();
                                        foreach($datat as $type){
                                            echo "
                                                <option value='{$type['t_id']}'>{$type['t_name']}</option>
                                            ";
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="n_id" class="form-label">ลักษณะงาน</label>
                            <select class="form-select" aria-label="Default select example" id="n_id"  name="n_id" required>
                                <option selected disable>กรุณาเลือก</option>
                                    <?php
                                        $datan = $natureObj->getNature();
                                        foreach($datan as $nature){
                                            echo "
                                                <option value='{$nature['n_id']}'>{$nature['n_name']}</option>
                                            ";
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="r_remark" class="form-label">รายละเอียดแจ้งซ่อม</label>
                            <textarea class="form-control" id="r_remark" rows="3" name="r_remark" required></textarea>
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
    </div>

<script>
    $('#exampleModal').on('shown.bs.modal', function () {
        $('#fullname').focus()
    })
    
</script>
</body>
</html>