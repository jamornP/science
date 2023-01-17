<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Repair\Building;
$buildingObj = new Building;
use App\Model\Repair\Floor;
$floorObj = new Floor;
use App\Model\Repair\Room;
$roomObj = new Room;
use App\Model\Repair\Air;
$airObj = new Air;
// $building = $buildingObj->getBuilding();
// print_r($building);
?> 
<?php 
 
// print_r($_REQUEST);
if(isset($_REQUEST['function']) && $_REQUEST['function'] == 'building'){
    $b_id = $_REQUEST['b_id'];
    $dataf = $floorObj->getFloorById($b_id);
    echo "
            <option value='' selected disable>กรุณาเลือก</option>
        ";
    foreach($dataf as $value){
        echo "
            <option value='{$value['f_id']}'>{$value['f_name']}</option>
        ";

    }
    exit();
}
if(isset($_REQUEST['function']) && $_REQUEST['function'] == 'floor'){
    $f_id = $_REQUEST['f_id'];
    $datar = $roomObj->getRoomById($f_id);
    echo "
            <option value='' selected disable>กรุณาเลือก</option>
        ";
    foreach($datar as $value){
        echo "
            <option value='{$value['r_id']}'>{$value['r_name']}</option>
        ";

    }
    exit();
}
if(isset($_REQUEST['function']) && $_REQUEST['function'] == 'room'){
    $r_id = $_REQUEST['r_id'];
    $dataa = $airObj->getAirById($r_id);
    echo "
            <option value='' selected disable>กรุณาเลือก</option>
        ";
    foreach($dataa as $value){
        echo "
            <option value='{$value['a_id']}'>{$value['a_num']}</option>
        ";

    }
    exit();
}

?>