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
    <?php //print_r($_SESSION);
    ?>
    <div class="container mt-5">

        <div class="card">
            <h5 class="card-header bg-187 text-white">ข่าวประชาสัมพันธ์</h5>
            <div class="card-body">
                <div class="row ">
                            
                    <div class="col-lg-12 col-md-12 ">
                        <div class="div_news">
                            <?php
                               $news = $adminObj->getNewsAll("data");
                               $i=0;
                               foreach($news as $n){
                                   $i++;
                                   
                                       echo "
                                           <div class='card card_news mt-1'>
                                               <div class='card-header  bg-29'>
                                                   {$n['n_title']} <i class='fs-10'>({$n['n_date']})</i>
                                               </div>
                                               <div class='card-body fs-14'>
                                                   <p class='mb-0'>{$n['n_detail']}</p>
                                       ";
                                       $downlons = $adminObj->getDownloadById("data",$n['d_id']);
                                       $j=0;
                                       foreach($downlons as $d){
                                           $j++;
                                           echo "
                                               <a href='{$d['d_link']}' class='text-primary me-mr-2' style='text-decoration: none;' target='_blank'><i class='bx bx-file' ></i> {$j}. {$d['d_name']}</a>
                                           ";
                                       }
                                       if($n['n_link']=="-"){
                                           echo "
                                               </div>
                                           </div>
                                           ";
                                       }else{
                                       echo"            
                                                   
                                                   <br>
                                                   <a href='{$n['n_link']}' class='btn btn-sm btn-warning fs-12' target='_blank'>รายละเอียด...</a>    
                                                   
                                               </div>
                                           </div>
                                       ";
                                       }
                                  
                               }
                               
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


</body>

</html>