
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>

</head>

<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    
    <div class="container mt-5">
    <?php
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    for($i=1;$i<8;$i++){
        if(isset($_POST[$i])){
            $data['ac_id']=$i; 
            if(isset($_POST[$i]['register'])){
                $data['register']=1;
            }else{
                $data['register']=0;
            }
            if(isset($_POST[$i]['round2'])){
                $data['round2']=1;
            }else{
                $data['round2']=0;
            }
            if(isset($_POST[$i]['round3'])){
                $data['round3']=1;
            }else{
                $data['round3']=0;
            }
            if(isset($_POST[$i]['round4'])){
                $data['round4']=1;
            }else{
                $data['round4']=0;
            }
            if(isset($_POST[$i]['bt_register'])){
                $data['bt_register']=1;
            }else{
                $data['bt_register']=0;
            }
            if(isset($_POST[$i]['bt_regis_show'])){
                $data['bt_regis_show']=1;
            }else{
                $data['bt_regis_show']=0;
            }
            if(isset($_POST[$i]['bt_edit'])){
                $data['bt_edit']=1;
            }else{
                $data['bt_edit']=0;
            }            
            if(isset($_POST[$i]['bt_del'])){
                $data['bt_del']=1;
            }else{
                $data['bt_del']=0;
            }
        }else{
            $data['ac_id'] = $i;
            $data['register'] = 0;
            $data['round2'] = 0;
            $data['round3'] = 0;
            $data['round4'] = 0;
            $data['bt_register'] = 0;
            $data['bt_regis_show'] = 0;
            $data['bt_edit'] = 0;
            $data['bt_del'] = 0;
        }
        $ckUpdate = $adminObj->updateSetting($data);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    }
    if($ckUpdate){
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1000);
            </script>
        ";
    }
?>
    </div>
<br>
<br>
<br>
<br>
<br>

</body>

</html>