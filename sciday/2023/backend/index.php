<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>
    <style>
        .sbtn-remove,
        .sbtn-remove2,
        .tbtn-remove {
            display: none;
        }

        .div_menu {
            /* width: 50px; */
            height: 700px;
            /* background-color: green; */
            overflow: auto;
        }
    </style>
</head>

<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php
    if($_SESSION['role']=="superadmin"){
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == 'ok') {
                $mes = "บันทึกข้อมูลเรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";
                echo "  
                        <script type='text/javascript'>
                            setTimeout(function(){location.href='/science/sciday/2023/backend/'} , 3000);
                        </script>
                    ";
            } elseif ($_GET['msg'] == 'error') {
                $mes = "บันทึกข้อมูลไม่สำเร็จ";
                echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
            }
        }
    ?>
    <div class="container-fluid mt-5 s-2" style="padding: 25px;">
        <div class="card">
            <h5 class='card-header bg-309 text-white'>Admin</h5>
            <div class='card-body'>
                <div class="d-flex align-items-start bg-302">
                    <div class="nav flex-column nav-pills  text-success " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Setting</button>
                        <button class="nav-link" id="v-pills-news-tab" data-bs-toggle="pill" data-bs-target="#v-pills-news" type="button" role="tab" aria-controls="v-pills-news" aria-selected="false">ข่าว</button>
                        <button class="nav-link" id="v-pills-activity-tab" data-bs-toggle="pill" data-bs-target="#v-pills-activity" type="button" role="tab" aria-controls="v-pills-activity" aria-selected="false">กิจกรรม</button>
                        <button class="nav-link" id="v-pills-document-tab" data-bs-toggle="pill" data-bs-target="#v-pills-document" type="button" role="tab" aria-controls="v-pills-document" aria-selected="false">เอกสารการรับสมัคร</button>
                        <button class="nav-link" id="v-pills-setttings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-setttings" aria-selected="false">หน้าหลัก</button>
                    </div>
                    <div class="tab-content mt-1 w-100 div_menu" id="v-pills-tabContent" style="padding: 25px;">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="card mt-5">
                                <div class="card-header bg-29">
                                    Setting
                                </div>
                                <div class="card-body">
                                    <form action="setting.php" method="post" enctype="multipart/form-data" id="from-post">
                                    <?php
                                        $activitys = $adminObj->getSettingAll();
                                        // print_r($activitys);
                                        foreach($activitys as $ac){
                                            if($ac['register']){
                                                $ck1 = "checked value='1'";
                                            }else{
                                                $ck1 = "";
                                            }
                                            if($ac['round2']){
                                                $ck2 = "checked value='1'";
                                            }else{
                                                $ck2 = "";
                                            }
                                            if($ac['round3']){
                                                $ck3 = "checked value='1'";
                                            }else{
                                                $ck3 = "";
                                            }
                                            if($ac['round4']){
                                                $ck4 = "checked value='1'";
                                            }else{
                                                $ck4 = "";
                                            }
                                            if($ac['bt_register']){
                                                $ck5 = "checked value='1'";
                                            }else{
                                                $ck5 = "";
                                            }
                                            if($ac['bt_regis_show']){
                                                $ck6 = "checked value='1'";
                                            }else{
                                                $ck6 = "";
                                            }
                                            if($ac['bt_edit']){
                                                $ck7 = "checked value='1'";
                                            }else{
                                                $ck7 = "";
                                            }
                                            if($ac['bt_del']){
                                                $ck8 = "checked value='1'";
                                            }else{
                                                $ck8 = "";
                                            }
                                            echo "
                                                <p>กิจกรรม{$ac['name']}</p>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-1' {$ck1} name='{$ac['ac_id']}[register]]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-2'>แสดงรายชื่อโรงเรียนที่สมัครแล้ว</label>
                                                </div>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-2' {$ck2} name='{$ac['ac_id']}[round2]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-2'>แสดงรายชื่อโรงเรียนผ่านรอบแรก</label>
                                                </div>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-3' {$ck3} name='{$ac['ac_id']}[round3]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-3'>แสดงรายชื่อโรงเรียนผ่านรอบสอง</label>
                                                </div>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-4' {$ck4} name='{$ac['ac_id']}[round4]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-4'>แสดงรายชื่อโรงเรียนผ่านรอบตัดสิน</label>
                                                </div>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-5' {$ck5} name='{$ac['ac_id']}[bt_register]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-5'>ปุ่มเปิดรับสมัคร ck จาก login</label>
                                                </div>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-6' {$ck6} name='{$ac['ac_id']}[bt_regis_show]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-6'>ปุ่มเปิดรับสมัคร</label>
                                                </div>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-7' {$ck7} name='{$ac['ac_id']}[bt_edit]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-7'>ปุ่มแก้ไข</label>
                                                </div>
                                                <div class='form-check form-switch'>
                                                    <input class='form-check-input' type='checkbox' id='{$ac['ac_id']}-8' {$ck8} name='{$ac['ac_id']}[bt_del]'>
                                                    <label class='form-check-label' for='{$ac['ac_id']}-8'>ปุ่มลบ</label>
                                                </div>
                                                <hr>
                                            ";
                                        }
                                        
                                    ?>
                                    <button type="submit" class="btn btn-primary" name="update_setting">บันทึก</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ข่าว -->
                        <div class="tab-pane fade" id="v-pills-news" role="tabpanel" aria-labelledby="v-pills-news-tab">
                            <div class="d-flex flex-row-reverse bd-highlight mt-1 me-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModelAddNews">
                                    เพิ่มข่าว
                                </button>
                            </div>
                            <div class="card mt-2">
                                <div class="card-header bg-29">
                                    ข้อมูลข่าวทั้งหมด
                                </div>
                                <div class="card-body">
                                    <table class="table p-2">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">date</th>
                                                <th scope="col">title</th>
                                                <th scope="col">detail</th>
                                                <th scope="col">link</th>
                                                <th scope="col">download</th>
                                                <th scope="col">show</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $news = $adminObj->getNewsAll("data");
                                            $i = 0;
                                            foreach ($news as $n) {
                                                $i++;
                                                echo "
                                                    <tr>
                                                        <td>{$i}</td>
                                                        <td>{$n['n_date']}</td>
                                                        <td>{$n['n_title']}</td>
                                                        <td>{$n['n_detail']}</td>
                                                        <td>{$n['n_link']}</td>
                                                        <td>
                                                    ";
                                                $downlons = $adminObj->getDownloadById("data", $n['d_id']);
                                                $j = 0;
                                                foreach ($downlons as $d) {
                                                    $j++;
                                                    echo "
                                                            <a href='{$d['d_link']}' class='text-primary me-mr-2' style='text-decoration: none;' target='_blank'>{$j}.<i class='bx bx-file' ></i>  {$d['d_name']}</a><br>
                                                        ";
                                                }
                                                // echo  "
                                                //     {$n['n_date']}
                                                // ";
                                                echo  "
                                                        </td>
                                                        <td>{$n['n_show']}</td>
                                                    </tr>
                                                    ";
                                            }


                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- กิจกรรม -->
                        <div class="tab-pane fade" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">
                            <div class="d-flex flex-row-reverse bd-highlight mt-1 me-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activity">
                                    เพิ่มกิจกรรม
                                </button>
                            </div>
                            <div class="card mt-2">
                                <div class="card-header bg-29">
                                    ข้อมูลกิจกรรม
                                </div>
                                <div class="card-body">
                                    <table class="table p-2">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">name</th>
                                                <th scope="col">year</th>
                                                <th scope="col">link</th>

                                                <th scope="col">images</th>
                                                <th scope="col">schedule</th>
                                                <th scope="col">pages</th>
                                                <th scope="col">edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $activitys = $adminObj->getActivityAll("data");
                                            $i = 0;
                                            foreach ($activitys as $ac) {
                                                $i++;
                                                $link = base64_encode($ac['ac_id']);
                                                echo "
                                                        <tr>
                                                            <td>{$i}</td>
                                                            <td>{$ac['name']}</td>
                                                            <td>{$ac['year']}</td>
                                                            <td>{$ac['link']}</td>
                                                           
                                                            <td>{$ac['images']}</td>
                                                            <td>{$ac['schedule']}</td>
                                                            <td>{$ac['pages']}</td>
                                                            <td><a href='edit.php?id={$link}'>แก้ไข</a></td>
                                                            <td>
                                                        </tr>
                                                    ";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="activity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="activityLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-193 text-white">
                                            <h5 class="modal-title " id="activityLabel">กิจกรรม</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- เอกสารรับสมัคร -->
                        <div class="tab-pane fade" id="v-pills-document" role="tabpanel" aria-labelledby="v-pills-document-tab">
                            <div class="card mt-5">
                                <div class="card-header bg-29">
                                    Setting
                                </div>
                                <div class="card-body">
                                    <table class="table p-2">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">กิจกรรม</th>
                                                <th scope="col">เอกสารหลักเกณฑ์</th>
                                                <th scope="col">ใบสมัคร pdf</th>
                                                <th scope="col">ใบสมัคร word</th>
                                                <th scope="col">edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $activitys = $adminObj->getDocumentAll();
                                            $i = 0;
                                            foreach ($activitys as $ac) {
                                                $i++;
                                                $link = base64_encode($ac['ac_id']);
                                                echo "
                                                        <tr>
                                                            <td>{$i}</td>
                                                            <td>{$ac['name']}</td>
                                                            <td>{$ac['doc_spec']}</td>
                                                            <td>{$ac['doc_regis_pdf']}</td>
                                                            <td>{$ac['doc_regis_word']}</td>
                                                            <td><a href='document.php?id={$link}'>แก้ไข</a></td>
                                                            <td>
                                                        </tr>
                                                    ";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div class="card mt-5">
                                <div class="card-header bg-29">
                                    หน้าหลัก
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                        <?php
                                        $indexs = $adminObj->getIndex();
                                        
                                        echo "
                                            <p>header</p>
                                            <div class='text-center'>
                                                <img src='/science/sciday/images/{$indexs[0]['img_head']}' class='img-thumbnail' alt='...'>
                                            </div>
                                            <br>
                                            <p>youtube</p>
                                            {$indexs[0]['youtube']}
                                            <br>
                                            <p>poster</p>
                                            <div class='col-6'>
                                                <img src='/science/sciday/images/{$indexs[0]['img_poster']}' class='img-thumbnail' alt='...'>
                                            </div>
                                            <br>
                                            <a href='/science/sciday/2023/backend/home.php?id={$indexs[0]['id']}' class='btn btn-primary'>แก้ไข</a>
                                        ";
                                    ?>
                                        </div>
                                    </div>
                                    
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <!-- Modal add News-->
    <div class="modal fade" id="ModelAddNews" tabindex="-1" aria-labelledby="ModelAddNewsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="save.php" method="post" enctype="multipart/form-data" id="from-post">
                    <div class="modal-header bg-193 text-white">
                        <h5 class="modal-title " id="ModelAddNewsLabel">รายละเอียดข่าว</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="n_title" class="col-form-label">1. หัวข้อข่าว <font color="red">*</font>: </label>
                            <input type="text" class="form-control" id="n_title" name="n_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="n_detail" class="col-form-label">2. รายละเอียดข่าว <font color="red">*</font>: </label>
                            <textarea type="text" class="form-control" id="n_detail" name="n_detail" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="n_link" class="col-form-label">3. link ไปเว็บอื่น : </label>
                            <input type="text" class="form-control" id="n_link" name="n_link">
                        </div>
                        <div class="mb-3">
                            <label for="n_title" class="col-form-label">4. File Download : </label>
                            <input type="hidden" class="form-control" id="d_id" name="d_id" value="<?php echo "d-" . uniqid(); ?>" required>
                            <ol>
                                <li>
                                    <div class="">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อเอกสาร" name="d_name[]">
                                    </div>
                                    <div class="d-flex mb-2">
                                        <div class="">
                                            <input type="file" class="form-control" id="d_link" name="d_link[]">
                                        </div>
                                        <button type="button" class="btn btn-success mx-2 sbtn-add text-white">เพิ่ม</button>
                                        <button class="btn btn-danger sbtn-remove text-white">ลบ</button>
                                    </div>
                                </li>
                            </ol>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="add_news">บันทึก</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>


    <script>
        $(function() {
            let i = 1;

            $("body").on("click", ".sbtn-add", function(e) {

                
                    i++;
                    e.preventDefault();
                    let ol = $(this).closest("ol")
                    let li = $(this).closest("li").clone()
                    li.appendTo(ol)
                    li.find("input").val("")
                    li.find(".sbtn-remove").show()
                    li.find("[name='sti_id[]']").focus()
                
                console.log(i);
            })

            $("body").on("click", ".sbtn-remove", function(e) {
                i = i - 1;
                e.preventDefault();
                $(this).closest("li").remove()
                console.log(i);
            })

            let j = 1;
            $("body").on("click", ".tbtn-add", function(e) {

                if (j < 2) {
                    j++;
                    e.preventDefault();
                    let ol = $(this).closest("ol")
                    let li = $(this).closest("li").clone()
                    li.appendTo(ol)
                    li.find("input").val("")
                    li.find(".tbtn-remove").show()
                    li.find("[name='tti_id[]']").focus()
                }
                console.log(j);
            })

            $("body").on("click", ".tbtn-remove", function(e) {
                j = j - 1;
                e.preventDefault();
                $(this).closest("li").remove()
                console.log(j);
            })

            let k = 1;

            $("body").on("click", ".sbtn-add2", function(e) {

                if (k < 2) {
                    k++;
                    e.preventDefault();
                    let ol = $(this).closest("ol")
                    let li = $(this).closest("li").clone()
                    li.appendTo(ol)
                    li.find("input").val("")
                    li.find(".sbtn-remove2").show()
                    li.find("[name='sti_id[]']").focus()
                } else {

                }
                console.log(i);
            })

            $("body").on("click", ".sbtn-remove2", function(e) {
                k = k - 1;
                e.preventDefault();
                $(this).closest("li").remove()
                console.log(k);
            })
        })
    </script>
</body>

</html>