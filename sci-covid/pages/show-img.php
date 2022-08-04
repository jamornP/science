<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
    use App\Model\Covid\Imagespath;
    $imagespathObj = new Imagespath; 
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sci-covid</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
</head>

<body class="font-sriracha">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sci-covid/components/navbar.php";?>
    <div class="container mt-5">
        <h5></h5>
        <div class="card text-center">
            <div class="card-header">
                ผลตรวจ ATK
            </div>
            <div class="card-body">
                <h5 class="card-title">ชื่อ <?php echo $_REQUEST['name'];?></h5>
                <?php
                    if(isset($_REQUEST['imges_id'])){
                    
                        $images=$imagespathObj->getImagesById($_REQUEST['imges_id']);
                        foreach($images as $image){
                            echo "
                                <img src='{$image['images_path']}' class='rounded mx-auto d-block' alt='...'>
                            ";
                        }
                    }
                ?>
            </div>
            <div class="card-footer text-muted">
                วันที่ทราบผล <?php echo $_REQUEST['date_covid'];?>
            </div>
        </div>
       
    </div>
</body>

</html>