
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
        echo "<pre>";
        print_r($data2);
        echo "</pre>";
        
    }
    foreach($_REQUEST['showround'] as $id){
        $data3['showround']='yes';
        $data3['id']=$id;
        $ck = $showroundObj->UpdateShowround($data3);
    }
    header("location: /science/sciday/pages/declaration.php");

?>
