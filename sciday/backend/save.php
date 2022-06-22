
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
    use App\Model\Sciday\Showround;
    $showroundObj = new Showround; 

    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    
    $datas = $showroundObj->getAllShowround();
    foreach($datas as $data){
        $data1['showround']='no';
        $data1['id']=$data['id'];
        $ck = $showroundObj->UpdateShowround($data1);
        $data2['date_show']=$_REQUEST['date_show'][$data['id']];
        $data2['id']=$data['id'];
        $ck = $showroundObj->UpdateDateshow($data2);
        $data3['edit_data']='no';
        $data3['id']=$data['id'];
        $ck = $showroundObj->UpdateData($data3);
        $data4['edit_video']='no';
        $data4['id']=$data['id'];
        $ck = $showroundObj->UpdateVideo($data4);
        // echo "<pre>";
        // print_r($data2);
        // echo "</pre>";
        
    }
    if(isset($_REQUEST['showround'])){
        foreach($_REQUEST['showround'] as $id5){
            $data5['showround']='yes';
            $data5['id']=$id5;
            $ck = $showroundObj->UpdateShowround($data5);
            echo "<br>";
            // print_r($data5);
        }
    }
    if(isset($_REQUEST['edit_data'])){
        foreach($_REQUEST['edit_data'] as $id6){
            $data6['edit_data']='yes';
            $data6['id']=$id6;
            $ck = $showroundObj->UpdateData($data6);
            echo "<br>";
            // print_r($data6);
        }
    }
    if(isset($_REQUEST['edit_video'])){
        foreach($_REQUEST['edit_video'] as $id7){
            $data7['edit_video']='yes';
            $data7['id']=$id7;
            $ck = $showroundObj->UpdateVideo($data7);
            echo "<br>";
            // print_r($data7);
        }
    }
     header("location: /science/sciday/pages/declaration.php");

?>
