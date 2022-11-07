<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
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
<div class="container-fluid mt-5">
    <div class="row">
        <?php 
            for($i=1;$i<=300;$i++){
                echo "
                        <div style='width: 40px; height: 20px;' class='bg-{$i}'>{$i}</div>
                ";
            }
        ?>
    </div>
    
    <div class="row">
    <?php 
        for($j=1;$j<=340;$j++){
            $k=$j+1;
            echo "
                <div class='col '>
                    <div class='info-box bg-{$j} shadow mb-2 rounded'>
                        <span class='info-box-icon bg-{$k} elevation-1'><i class='bx bx-edit-alt'></i></span>
                        <div class='info-box-content '>
                            <span class='info-box-text text-white'>แจ้งซ่อม</span>
                            <span class='info-box-number'>
                            {$j}
                            <small>งาน</small>
                            </span>
                        </div>
                    </div>
                </div>
            ";
        }
    ?>
        
        
    </div>

    <div class="card">
        <form id="add" action="save.php" method="post">
            <h5 class="card-header bg-primary text-white">ฟอร์มข้อมูลแจ้งซ่อมไฟฟ้าและประปา</h5>
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="button" class="btn btn-danger text-white mt-2 me-md-2 shadow mb-2 rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    แจ้งซ่อม
                </button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

</body>
</html>