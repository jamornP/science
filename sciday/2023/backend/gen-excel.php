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

        <div class="card">
            <h5 class="card-header bg-170">หน้าหลัก</h5>
            <div class="card-body">
                <form action="data-certificate.php" method="post" enctype="multipart/form-data" id="from-post">
                    <div class="mb-3">
                        <label for="sql" class="form-label">SQL :</label>
                        <br>
                        <?php 
                            $sql = "
                                select ti.name as title,stu.stu_name,stu.stu_surname,stu.school,p.p_name,p.tea_id,ac.name as activity ,le.name as level,g.round
                                from tb_group as g
                                left join tb_project as p on p.pro_id = g.pro_id
                                left join tb_student as stu on stu.stu_id = p.stu_id
                                left join tb_title as ti on ti.ti_id = stu.ti_id
                                left join tb_activity as ac on ac.ac_id = g.ac_id
                                left join tb_level as le on le.le_id = g.le_id
                                where g.round = 'doc' AND ac.ac_id = 1
                                ORDER BY ac.name
                            ";
                        ?>
                        <textarea rows="10" class="form-control" id="sql" name="sql" ><?php echo $sql;?></textarea>
                    </div>
                    
                    
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-danger text-white" name="answer">Auto Answer</button>
                        <button type="submit" class="btn btn-primary" name="project">Run SQL</button>
                    </div>
                    
                </form>
            </div>
        </div>


    </div>


</body>

</html>