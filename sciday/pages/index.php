<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
    <style>
        .center
        {
            position : absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            text-align: center;
            font-weight: 800;
        }
        #clock
        {
            display: flex;
            width: 490px;
            margin: 0 auto;
        }
        #clock div
        {
            position: relative;
            
            width:120px;
            padding:20px;
            margin: 0 5px;
            background: #262626;
            color: #fff;
            border: 2px solid #000;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.50) !important;
        }
        #clock div:last-child
        {
            background: #e91e63;
            
        }
        #clock div:before
        {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: rgba(255,255,255,.2);
        }
        #clock div span
        {
            display: block;
            text-align: center;
        }
        #clock div span:nth-child(1)
        {
            font-size: 48px;
            font-weight: 800;
        }
        #clock div span:nth-child(2)
        {
            font-size: 18px;
            font-weight: 800;
            margin-top: -10px;
        }
    </style> 
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <?php //print_r($_SESSION);?>
    <div class="container">
        
        
        <div class="card shadow mt-1">
            <div class="card-body">
                <div class="row">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <img src="/science/sciday/images/news00.png" class="d-block w-100" alt="...">
                            </div>
                            <!-- <div class="carousel-item" data-bs-interval="5000"> -->
                                <!-- <iframe width="100%" height="720" class="embed-responsive-item" src="https://www.youtube.com/embed/SbVQsw4y6zk?autoplay=1" allowfullscreen></iframe> -->
                    
                            <!-- </div> -->
                                                        
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- <iframe width="800" height="620" src="https://www.youtube.com/embed/SbVQsw4y6zk?autoplay=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <!-- <h1>Science for every Generation</h1> -->
            <!-- <div class="texe-center"> -->
                <div id="clock"></div>
            <!-- </div> -->
        </div>
        <br>
        <div class="card  shadow">
            <div class="card-header bg-info">
                <h2 class="card-title text-white">
                    <b>ประกาศรายชื่อผู้ที่ได้รับรางวัล และรูปภาพกิจกรรมนิทรรศการวันวิทยาศาสตร์</b>
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="/science/sciday/images/sciday.jpg" class="d-block w-100 shadow" alt="...">
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow">
                            <p class="card-header bg-primary text-white">
                                ประกาศรายชื่อผู้ที่ได้รับรางวัลการแข่งขันโครงการนิทรรศการวันวิทยาศาสตร์<br> 
                                หัวข้อเรื่อง Science for every Generation ประจำปี 2565 </p>
                            <div class="card-body">           
                                <a type="button" href="/science/sciday/document/รายชื่อผู้ได้รับรางวัล230856.pdf" class="btn btn-outline-warning position-relative" target='_blank'>
                                    กิจกรรมวันที่ 23 สิงหาคม 2565
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        New
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>  
                                <br>                  
                                <a type="button" href="/science/sciday/document/รายชื่อผู้ได้รับรางวัล240856.pdf" class="btn btn-outline-warning position-relative mt-2" target='_blank'>
                                    กิจกรรมวันที่ 24 สิงหาคม 2565
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        New
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a> 
                            </div>
                        </div>
                        <div class="card shadow mt-2">
                            <p class="card-header bg-success text-white">
                                รูปภาพกิจกรรมนิทรรศการวันวิทยาศาสตร์ ประจำปี 2565 <br>
                                ระหว่างวันที่ 23-24 สิงหาคม 2565
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1oKeflhMSyj-7ob6NxMTTBFR8j9HJUTCX?fbclid=IwAR1JoM4_9en1DeTxqDSNFe52fOdTIgxnyag7AwSzMzSNQjN2P36OX6tkqrI" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 1 </a>
                                    </div>
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1S-rls4dDLk6OdMPU2xjSgURa1kyVlP02?fbclid=IwAR06WZxZBqCNnxgG3lTFc9Y0oRnXXHqm4DovE_xbh_h-zSZn7h6AlUsuVpo" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 2 </a>
                                    </div>
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1QRJ7oLo9DUDdHEmONKHG99iLB1Maleck?fbclid=IwAR1JoM4_9en1DeTxqDSNFe52fOdTIgxnyag7AwSzMzSNQjN2P36OX6tkqrI" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 3 </a>
                                    </div>
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1HKPB4NOf8SEsJXTikKfWfUB26UZzRR9a?fbclid=IwAR3CCGinddFKvLYlAJheneByVkmOrqfb9MNAxXxxdS2ff_XmHmrkxshb7Yc" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 4 </a>
                                    </div>
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1SfOP0Slns_MflNLyy9vWRwyZNxNO4yMy?fbclid=IwAR302-5Irhgai3GRSfWjTkhQ-vpW9wvTINAaXEyDB71FSqnG_KqkX0i_0o0" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 5 </a>
                                    </div>
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1JVsgeQmOAmGEesfUylLDqhYkYDXmFIej?fbclid=IwAR1v5NHqNQMLmmi6qBMrC5uDl8cxdkWHG676yRcZ519PLiC-SF8CQW0iJN0" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 6 </a>
                                    </div>
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1aYapbYBXzlE1s6zoHRgM1gQMjdyoQ_NO?fbclid=IwAR0NqboMVzOlsDtR7HNp0KvE8yMEFU7yyZsB0n4CO8CYI3QmvFLxMeOY4fY" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 7 </a>
                                    </div>
                                    <div class="col-6">
                                        <a  href="https://drive.google.com/drive/folders/1Muut1I4QijX9XgKF82RS32obYQclYTto?fbclid=IwAR0el6CgJz8jZqX724J9LLZuadY7VHUNcq5vjigokW1AUIX93A6bRZG7c-s" class="text-decoration-none" target='_blank'><i class='bx bx-image'></i> ชุดที่ 8 </a>
                                    </div>
                                    <!-- <div class="col-6">
                                        <a  href="#" class="text-decoration-none"><i class='bx bx-image'></i> ชุดที่ 9 </a>
                                    </div> -->
                                    
                                </div>           
                                                                
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <!-- <div class="card  shadow">
            <div class="card-header bg-success">
                <h2 class="card-title text-white">
                    
                    <b>หนังสือขอเชิญเข้าร่วมรอบตัดสิน Sciday@KMITL</b>
                   
                </h2>
            </div>
            <div class="card-body text-center">
                <a href="/science/sciday/document/หนังสือเชิญโรงเรียนที่เข้าร่วมการแข่งขัน.pdf" class="btn btn-primary position-relative mt-3">
                    <h4>หนังสือขอเชิญเข้าร่วมการประกวดแข่งขันรอบตัดสิน ณ คณะวิทยาศาสตร์ สจล.</h4>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        New
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <a href="/science/sciday/document/รายชื่อผู้ผ่านเข้ารอบตัดสินการประกวดแข่ง.pdf" class="btn btn-warning position-relative text-white mt-3">
                    <h4>รายชื่อผู้ผ่านเข้ารอบตัดสินการประกวดแข่งขันทางวิทยาศาสตรและเทคโนโลยี</h4>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        New
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <br>
                <br>
                
            </div>
        </div> -->
        <br>
        <div class="card  shadow">
            <div class="card-header bg-info">
                <h2 class="card-title text-white">
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <b> ข่าวประชาสัมพันธ์ </b>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </h2>
            </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 ">
                        <!-- <div class="alert alert-warning" role="alert">
                            <h5 class="card-title"><b>การแข่งขันรอบสุดท้าย Micro:bit งานวันวิทยาศาสตร์ สจล 2565</b></h5>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                <span class="visually-hidden">New alerts</span>  
                            </span>
                            <p class="card-text">
                                จัดส่ง link zoom ผ่านทางระบบแล้ว ให้ผู้แข่งขันรอบสุดท้ายเข้าสู่ระบบเหมือนแนบ video เพื่อตรวจสอบการได้รับ link zoom ถ้าไม่ได้รับ link zoom กรุณาแจ้งผ่านช่องทางแชทของ facebook ก่อนวันที่ 22 สิงหาคม 2565 เวลา 16.30 น.
                            </p>
                            <img src="/science/sciday/images/microbit.jpg" class="img-thumbnail" alt="...">
                            <a href="/science/sciday/document/คู่มืออัพลิงค์ video.pdf" class="btn btn-sm btn-primary mt-2" target='_blank'>รายละเอียดเพิ่มเติม</a>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <h5 class="card-title"><b>คณะวิทยาศาสตร์ ขอแสดงความยินดีกับอาจารย์ บุคลากร และนักศึกษาของคณะวิทยาศาสตร์ 
                                ที่ได้รับรางวัลต่างๆในงานนิทรรศการวันวิทยาศาสตร์  ✨🏆🎉</b></h5>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                <span class="visually-hidden">New alerts</span>  
                            </span>
                            <p class="card-text">คณะวิทยาศาสตร์ ขอแสดงความยินดีกับอาจารย์ บุคลากร และนักศึกษาของคณะวิทยาศาสตร์ 
                                ที่ได้รับรางวัลต่างๆในงานนิทรรศการวันวิทยาศาสตร์  ✨🏆🎉<br>“Science for every Generation” 
                                ในวันที่ 23-24 สิงหาคม 2565 
                                ดังรายชื่อต่อไปนี้
                            </p>
                            <a href="/science/sciday/pages/nwes.php" class="btn btn-sm btn-primary" target='_blank'>รายละเอียดเพิ่มเติม</a>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <h5 class="card-title"><b>เรียนผู้เข้าร่วมงานนิทรรศการวันวิทยาศาสตร์ ประจำปี 2565 ทุกท่าน</b></h5>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                <span class="visually-hidden">New alerts</span>  
                            </span>
                            <p class="card-text">เพื่อเป็นการป้องกันการแพร่ระบาดของเชื้อ Covid-19  ทางผู้จัดงานขอให้ทุกท่านที่จะเข้าร่วมงานนิทรรศการวันวิทยาศาสตร์ ประจำปี 2565  ณ หอประชุมจุฬาภรณวลัยลักษณ์ คณะวิทยาศาสตร์ สจล. ในวันที่ 23 และ 24 สิงหาคม 2565
                                ต้องแสดงผลการตรวจ ATK ที่ตรวจไว้ไม่เกิน 24 ชั่วโมง ก่อนเข้าร่วมกิจกรรม โดยสามารถแสดงผลการตรวจ ATK ได้ที่จุดลงทะเบียนก่อนเข้าร่วมกิจกรรม
                            </p>
                            <a href="/science/sciday/images/ATK.jpg" class="btn btn-sm btn-primary" target='_blank'>ตัวอย่างภาพที่ต้องแสดง</a>
                        </div> -->
                        <div class="alert alert-warning" role="alert">
                            <h5 class="card-title"><b>เอกสารแนะแนวการศึกษาและแนะนำหลักสูตรอบรม</b></h5>
                            <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                <span class="visually-hidden">New alerts</span>   -->
                            </span>
                            <p class="card-text">
                                ดาวน์โหลดเอกสารแนะนำหลักสูตร
                            </p>
                            <a href="/science/sciday/document/แนะนำ/งานบริการวิชาการ.pdf" class="btn btn-sm btn-primary mt-2" target='_blank'>งานบริการวิชาการ</a>
                            <a href="/science/sciday/document/แนะนำ/นำเสนอหลักสูตรคณิตศาสตร์ประยุกต์.pdf" class="btn btn-sm btn-primary mt-2" target='_blank'>คณิตศาสตร์ประยุกต์</a>
                            <a href="/science/sciday/document/แนะนำ/หลักสูตรสถิติประยุกต์และการวิเคราะห์ข้อมูล.pdf" class="btn btn-sm btn-primary mt-2" target='_blank'>สถิติประยุกต์และการวิเคราะห์ข้อมูล</a>
                            <a href="/science/sciday/document/แนะนำ/นำเสนอหลักสูตรวิทยาการคอมพิวเตอร์.pptx" class="btn btn-sm btn-primary mt-2" target='_blank'>วิทยาการคอมพิวเตอร์</a>
                            <a href="/science/sciday/document/แนะนำ/นำเสนอหลักสูตรฟิสิกส์ประยุกต์.pdf" class="btn btn-sm btn-primary mt-2" target='_blank'>ฟิสิกส์อุตสาหกรรม</a>
                            <a href="/science/sciday/document/แนะนำ/นำเสนอหลักสูตรเทคโนโลยีสิ่งแวดล้อม.pdf" class="btn btn-sm btn-primary mt-2" target='_blank'>เทคโนโลยีสิ่งแวดล้อมและการจัดการอย่างยั่งยืน</a>
                            <a href="/science/sciday/document/แนะนำ/นำเสนอหลักสูตรเทคโนโลยีชีภาพ.pptx" class="btn btn-sm btn-primary mt-2" target='_blank'>เทคโนโลยีชีวภาพอุตสาหกรรม จุลชีววิทยาอุตสาหกรรม</a>
                            
                        </div>
                        <!-- <div class="alert alert-danger" role="alert">
                            <h5 class="card-title"><b>ขอให้ทุกทีม ยืนยันความถูกต้องของข้อมูล เพื่อออกใบประกาศนียบัตร</b></h5>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        ด่วน    
                                <span class="visually-hidden">New alerts</span>  
                            </span>
                            <p class="card-text">
                                ขอให้ทุกทีมตรวจสอบความถูกต้องของ คำนำหน้า ชื่อ-นามสกุล(ของผู้แข่งขันและอาจารย์ที่ปรึกษา) ชื่อโรงเรียน(ต้องมี โรงเรียน นำหน้า) และคลิก ยืนยันข้อมูลถูกต้อง เพื่อที่ระบบจะนำข้อมูลมาจัดทำใบประกาศนียบัตร ยืนยันข้อมูลภายใน <b class="text-danger">วันศุกร์ที่ 26 สิงหาคม 2565</b><br>
                                <b class="text-danger">หมายเหตุ ถ้าระบบออกใบประกาศนียบัตรมาแล้วจะไม่สามารถแก้ไขได้ครับ </b>
                            </p>
                            <a href="/science/sciday/document/คู่มือแก้ไข.pdf" class="btn btn-sm btn-primary" target='_blank'>คู่มือ</a>
                        </div> -->
                        <!-- <div class="alert alert-success" role="alert">
                            <h5 class="card-title">สำหรับโรงเรียนที่จะนำยานพาหนะเพื่อขน-ส่งอุปกรณ์ต่างๆสำหรับการแข่งขัน</h5>
                            
                            <p class="card-text">ให้ท่านทำการ Login และกรอกข้อมูลใน google form เพื่อทางผู้จัดงานจะได้จัดเตรียมพื้นที่จอดยานพาหนะให้แก่ท่าน หรือ คลิกที่ รายละเอียด</p>
                            <a href="https://forms.gle/f8scZiGarkHMrPRy7" class="btn btn-sm btn-primary" target='_blank'>รายละเอียด...</a>
                        </div>
                    
                        <div class="alert alert-success" role="alert">
                            <h5 class="card-title">การประกวดโครงงาน IoT</h5>
                           
                            <p class="card-text">ประกาศรายชื่อผู้ที่ผ่านเข้ารอบสุดท้ายการประกวดโครงงาน IoT</p>
                            <a href="/science/sciday/pages/iot.php?activity=Mw==" class="btn btn-sm btn-primary">รายละเอียด...</a>
                        </div>
                    
                        <div class="alert alert-success" role="alert">
                            <h5 class="card-title">การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์</h5>
                            
                            <p class="card-text">ประกาศรายชื่อผู้ที่ผ่านเข้ารอบสุดท้ายการประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์</p>
                            <a href="/science/sciday/pages/artifact.php?activity=MQ==" class="btn btn-sm btn-primary">รายละเอียด...</a>
                        </div>
                   
                        <div class="alert alert-success" role="alert">
                            <h5 class="card-title">การประกวดโครงงานวิทยาศาสตร์</h5>
                           
                            <p class="card-text">ประกาศรายชื่อผู้ที่ผ่านเข้ารอบสุดท้ายการประกวดโครงงานวิทยาศาสตร์</p>
                            <a href="/science/sciday/pages/project.php?activity=Mg==" class="btn btn-sm btn-primary">รายละเอียด...</a>
                        </div> -->
                    </div>
                    <div class="col-lg-6 col-md-6 ">
                        <iframe width="100%" height="400" class="embed-responsive-item mt-2" src="https://www.youtube.com/embed/SbVQsw4y6zk?autoplay=1" allowfullscreen></iframe>
                    </div>
                  
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            
                            <div class="card-body">
                            <img src="/science/sciday/images/news10.png" class="card-img-top shadow" alt="...">
                               
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 8 ส.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news_answer03.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">การแข่งขันตอบปัญหาฯ ออนไลน์</h5>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                    <span class="visually-hidden">New alerts</span>  
                                    </span>
                                </button>
                                <a class="dropdown-item text-primary mt-3" aria-current="page" href="/science/sciday/document/กำหนดการแข่งขันตอบปัญหาฯ 090865 -2565.pdf" target='_blank'><i class='bx bx-download' ></i> เอกสารกำหนดการแข่งขัน</a>
                                <a class="dropdown-item text-primary" aria-current="page" href="/science/sciday/document/รายชื่อกลุ่มการแข่งขันตอบปัญหาTH.pdf" target='_blank'><i class='bx bx-download' ></i> รายชื่อกลุ่มการแข่งขันตอบปัญหา ภาษาไทย</a>
                                <a class="dropdown-item text-primary" aria-current="page" href="/science/sciday/document/รายชื่อกลุมการแข่งขันตอบปัญหาEN.pdf" target='_blank'><i class='bx bx-download' ></i> รายชื่อกลุ่มการแข่งขันตอบปัญหา ภาษาอังกฤษ</a>
                                <div class="embed-responsive embed-responsive-16by9 text-center">
                                    <iframe width="80%" height="150" class="embed-responsive-item mt-2" src="/science/sciday/images/การเตรียมตัวแข่งขันตอบปัญหา คณะวิทยาศาสร.mp4" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 4 ส.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news05.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">ประกาศรายชื่อผู้ที่ผ่านเข้ารอบ</h5>
                                   
                                   
                                </button>
                                <p class="card-text mt-2">
                                    คลิกดูรายละเอียดที่กิจกรรมได้เลยครับผม
                                </p>
                                <p class="card-text mt-4 text-primary">
                                1. <a href="/science/sciday/pages/artifact.php?activity=MQ==" class="text-primary">การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์</a> <br>
                                2. <a href="/science/sciday/pages/iot.php?activity=Mw==" class="text-primary">การประกวดโครงงาน IoT</a> <br>
                                3. <a href="/science/sciday/pages/answer.php?activity=NA==" class="text-primary">การแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์</a> <br>
                                4. <a href="/science/sciday/pages/micro.php?activity=Ng==" class="text-primary">การแข่งขัน micro:bit</a> <br>
                                5. <a href="/science/sciday/pages/project.php?activity=Mg==" class="text-primary">การประกวดโครงงานวิทยาศาสตร์</a> <br>
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 31 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news08.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">รายละเอียดการแนบ Link file Hex</h5>
                                    
                                   
                                </button>
                                <p class="card-text mt-2" style="text-align: justify">
                                    ทีมที่ผ่านเข้ารอบ 2 <br>&nbsp;&nbsp;&nbsp;การแข่งขันที่ต้องแนบ link file Hex สามารถทำตามคู่มือที่แนบมาด้านล่างนี้ โดยท่านต้อง upload file Hex ของท่านผ่าน Google Drive และแชร์ให้คนที่มี link ดูได้ จากนั้นให้นำ link มาแนบในระบบ
                                </p>
                                <p class="card-text mt-4 text-primary">
                               
                                <a href="/science/sciday/document/คู่มืออัพลิงค์ file Hex.pdf" class="text-primary" target='_blank'>คู่มือแนบ link file Hex</a> <br>
                               
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 27 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news07.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">เลื่อนการประกาศผล micro:bit</h5>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                    <span class="visually-hidden">New alerts</span>
                                    </span>
                                </button>
                                <p class="card-text mt-2" style="text-align: justify">
                                &nbsp;&nbsp;&nbsp;เนื่องจากมีทีมสมัครเข้ามาจำนวนมาก ทางคณะกรรมการจัดการแข่งขันจึงขอขยายเวลาในการประกาศผลทีมที่ผ่านเข้ารอบ เป็นภายในวันที่ 27 ก.ค. 2565 เวลา 18.00 น. เป็นต้นไป
                                </p>
                                <p class="card-text mt-4 text-primary">
                                    ประกาศผล
                                    <a href="/science/sciday/pages/micro.php?activity=Ng==" class="text-primary">การแข่งขัน micro:bit</a> <br>
                               
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 27 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news06.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">รายละเอียดการแนบ Link video</h5>
                                    
                                </button>
                                <p class="card-text mt-2" style="text-align: justify">
                                    ทีมที่ผ่านเข้ารอบ 2 <br>&nbsp;&nbsp;&nbsp;การแข่งขันที่ต้องแนบ link video สามารถทำตามคู่มือที่แนบมาด้านล่างนี้ โดยท่านต้อง upload video ของท่านผ่านเว็บ Youtube จากนั้นให้นำ link มาแนบในระบบ
                                </p>
                                <p class="card-text mt-4 text-primary">
                               
                                <a href="/science/sciday/document/คู่มืออัพลิงค์ video.pdf" class="text-primary" target='_blank'>คู่มือแนบ link video</a> <br>
                                <a href="/science/sciday/document/คู่มืออัพลิงค์ file Hex.pdf" class="text-primary" target='_blank'>คู่มือแนบ link file Hex</a> <br>
                               
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 27 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    
                    
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news04.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">เลื่อนการปิดรับสมัคร</h5>
                                   
                                    </span>
                                </button>
                                <p class="card-text mt-4 text-primary">
                                1. <a href="/science/sciday/pages/artifact.php?activity=MQ==" class="text-primary">กิจกรรมการประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์</a> <br>
                                2. <a href="/science/sciday/pages/iot.php?activity=Mw==" class="text-primary">กิจกรรมการประกวดโครงงาน IoT</a> <br>
                                3. <a href="/science/sciday/pages/answer.php?activity=NA==" class="text-primary">กิจกรรมการแข่งขันตอบปัญหาฯ ภาษาอังกฤษ</a> <br>
                                4. <a href="/science/sciday/pages/micro.php?activity=Ng==" class="text-primary">กิจกรรมการแข่งขัน micro:bit</a> <br>
                                </p>
                                <p class="card-text">
                                    จากเดิม วันที่ 12 ก.ค. 2565 เป็น <b class="text-danger">วันที่ 22 ก.ค. 2565</b> รีบๆสมัครกันเข้ามานะครับผม
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 12 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news01.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                
                                
                                    <button type="button" class="btn btn-primary position-relative">
                                        <h5 class="card-title">ชิงถ้วยพระราชทาน</h5>
                                        
                                        </span>
                                    </button>
                                
                                <p class="card-text mt-4">
                                
                                    โค้งสุดท้ายสำหรับรับสมัครกิจกรรมงานวันวิทยาศาสตร์<br>
                                    &nbsp;&nbsp;&nbsp;1. กิจกรรมการประกวดโครงงานวิทยาศาสตร์<br>
                                    &nbsp;&nbsp;&nbsp;2. กิจกรรมการประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์<br>
                                    <b class="text-primary fs-18">&nbsp;&nbsp;&nbsp;ชิงถ้วยพระราชทาน สมเด็จพระกนิษฐาธิราชเจ้า กรมสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี</b><br>
                                    และยังมีกิจกรรมอื่นๆอีกมากมายให้ได้ชิงเงินรางวัลพร้อมเกียรติบัตร ติดตามรายละเอียดได้ที่หัวข้อกิจกรรมได้เลยครับน้องๆ<br>
                                    รีบๆสมัครกันเข้ามานะครับผม...
                                    
                                    
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 8 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news02.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                
                                <a href="/science/sciday/pages/project.php?activity=Mg==" class="">
                                    <button type="button" class="btn btn-primary position-relative">
                                        <h5 class="card-title">เลื่อนการปิดรับสมัคร</h5>
                                        
                                        </span>
                                    </button>
                                </a>
                                <p class="card-text mt-4">
                                    กิจกรรมการประกวดโครงงานวิทยาศาสตร์<br>
                                    จากเดิม วันที่ 8 ก.ค. 2565 เป็น <b class="text-primary">วันที่ 20 ก.ค. 2565</b> 
                                </p>
                                <div class="text-end">
                                    <a href="/science/sciday/pages/project.php?activity=Mg==" class="">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 8 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <br>
        <div class="card  shadow">
            <div class="card-header bg-primary">
                <h2 class="card-title text-center text-white"><b>ขอเชิญร่วมงาน</b></h2>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-2">
                    <a href="/science/sciday/images/0.png" target="_blank"> <img src="/science/sciday/images/0.png" class="img-fluid rounded shadow" alt="..."></a>
                </div>
                <div class="col-md">
                    <p class="card-text fs-16" style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยในวันที่ ๑๘ สิงหาคม ของทุกปีเป็นวันวิทยาศาสตร์แห่งชาติ คณะวิทยาศาสตร์ สจล. จึงได้จัดงานนิทรรศการ
                        วันวิทยาศาสตร์ ประจำปี ๒๕๖๕ ในหัวข้อ <b>“Science for every Generation”</b> เพื่อเป็นการเทิดพระเกียรติพระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว รัชกาลที่ ๔ ผู้ทรงเป็นพระบิดาแห่งวิทยาศาสตร์ไทย และเพื่อกระตุ้นให้นักเรียนนักศึกษา ประชาชนทั่วไปได้ตระหนักถึงความสำคัญของวิทยาศาสตร์และเทคโนโลยีที่มีต่อการพัฒนาคุณภาพชีวิตและการพัฒนาประเทศ โดยได้จัดกิจกรรมเพื่อให้นักเรียน นักศึกษา และคณาจารย์ได้มีส่วนร่วมในการทำกิจกรรมด้าน
                        วิทยาศาสตร์ เช่น การประกวดโครงงานวิทยาศาสตร์ การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์ การแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ และการเสวนาแนะนำหลักสูตรของคณะวิทยาศาสตร์ สจล. 
                    </p>
                </div>
            </div>
                
                
                
                <!-- <div class="text-center mt-3">
                    <a href="/science/sciday/document/รายละเอียดนิทรรศการวันวิทยาศาสตร์  2565.pdf" class="btn btn-primary text-center">ดาวน์โหลดเอกสารเชิญชวน</a>
                </div> -->
                
        </div>
        <div class="card-footer text-center">
            <a href="/science/sciday/document/รายละเอียดนิทรรศการวันวิทยาศาสตร์  2565.pdf" class="btn btn-primary text-center fs-20" target='_blank'>ดาวน์โหลดเอกสารเชิญชวน</a>
        </div>
    </div>
    <div class="">
        <div class="card bg-poster mt-5" >
            <div class="container">
                <span class="badge rounded-pill bg-primary mt-3 shadow text-truncate">
                    <h4 class=""><b>&nbsp;&nbsp;&nbspกิจกรรมงานวันวิทยาศาสตร์ ปี 2565&nbsp;&nbsp;</b></h4>
                </span>
                <div class="row mt-3 text-center">
                    <?php
                    $activitys = $activityObj->getActivityByYear('2022');
                    foreach($activitys AS $activity){
                        $activity_id=base64_encode($activity['id']);
                        echo "
                            <div class='col-md-4 mt-4'>
                                <a href='{$activity['link']}?activity={$activity_id}'>
                                    <img src='/science/sciday/images/{$activity['id']}.png' class='d-block w-100 img-thumbnail' alt='{$activity['name']}'>
                                </a>
                            </div>
                        ";
                    }
                    ?>
                    <div class='col-md-4 mt-4'>
                        <img src="/science/sciday/images/news10.png" class='d-block w-100 img-thumbnail' alt="...">
                    </div>
                </div>
            </div>
            <div class="mt5">
                <br>
                <br>
                <br>
            </div>
        </div>
        
    </div>
    <script type="text/javascript">
        function countDown(){
            var timeA = new Date(); // วันเวลาปัจจุบัน
            // var timeB = new Date("Febriaru 24,2012 00:00:01"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
             var timeB = new Date(2022,7,23,9,0,0,0); 
            // วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
            // เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
            var timeDifference = timeB.getTime()-timeA.getTime();    
            if(timeDifference>=0){
                timeDifference=timeDifference/1000;
                timeDifference=Math.floor(timeDifference);
                var wan=Math.floor(timeDifference/86400);
                var l_wan=timeDifference%86400;
                var hour=Math.floor(l_wan/3600);
                var l_hour=l_wan%3600;
                var minute=Math.floor(l_hour/60);
                var second=l_hour%60;
                var showPart=document.getElementById('clock');
                // var showDate=document.getElementById('showDate');
                // var btn=document.getElementById("clock");
                // showDate.innerHTML=timeA;
                showPart.innerHTML=" "
                +'<div><span>'+wan+'</span><span>Days</span></div>'
                +'<div><span>'+hour+'</span><span>Hr</span></div>'
                +'<div><span>'+minute+'</span><span>Min</span></div>'
                +'<div><span>'+second+'</span><span>Sec</span></div>'
                ; 
                    if(wan==0 && hour==0 && minute==0 && second==0){
                        // btn.hidden;
                        clearInterval(iCountDown);
                        location.reload();
                         // ยกเลิกการนับถอยหลังเมื่อครบ
                        // เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
                    }
            }
        }
        // การเรียกใช้
        var iCountDown=setInterval("countDown()",1000); 
    </script>
</body>
</html>