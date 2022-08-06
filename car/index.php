<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"; ?>

<?php 
    use App\Model\Car\Statusbook;
    date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองรถ</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/car/components/link.php";?>
</head>
<body class="font-kanit">

<div class="">
<?php 
session_start();
    require $_SERVER['DOCUMENT_ROOT']."/science/car/components/navbar.php";

?>
</div>
    <div class="container mt-2">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h3>ปฏิทินการใช้รถ <?php if($_SESSION['role']=='moderator' OR $_SESSION['role']=='admin'){?></h3>
                        <a href="https://www.itrector.kmitl.ac.th/vehicle/index.php" class="btn btn-warning text-white"  target='_blank'>ขอใช้รถสถาบันฯ</a>
                        <?php }?>

                    </div>
                    <div class="card-body fs-14">
                        <div class="alert alert-success" role="alert">
                            <table class="">
                                <tr>
                                    <td>หมายเหตุ : สถานะรายการขอใช้รถ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <?php
                                        $statusObj = new Statusbook;
                                        $statuss = $statusObj->getAllStatus(); 
                                        $i=0;
                                        foreach($statuss as $status) {
                                            $i++;
                                            echo "
                                                <td><div style='width: 14px; height: 14px; background-color:{$status['color']}'></div></td>
                                                <td>{$status['name']}&nbsp;&nbsp;&nbsp;</td>
                                            ";
                                        }
                                    ?>
                                    <td></td>
                                    <td>รถตู้คณะฯ&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                     
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div style="margin:50px 0 50px 0;" id='calendar'></div>
                                <div style="margin:10px 0 50px 0;" align="center"></div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js'></script> -->
    <script type="text/javascript">
    jQuery(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            eventLimit: true, 
            defaultDate: new Date(),
            timezone: 'Asia/Bangkok',
            events: {
                url: './dataEvents.php',
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            },

            eventClick: function(event) {
                if (event.url) {
                    $.fancybox({
                        'href': event.url,
                        'type': 'iframe',
                        'autoScale': false,
                        'openEffect': 'elastic',
                        'openSpeed': 'fast',
                        'closeEffect': 'elastic',
                        'closeSpeed': 'fast',
                        'closeBtn': true,
                        onClosed: function() {
                            parent.location.reload(true);
                        },
                        helpers: {
                            thumbs: {
                                width: 50,
                                height: 50
                            },

                            overlay: {
                                css: {
                                    'background': 'rgba(49, 176, 213, 0.7)'
                                }
                            }
                        }
                    });
                    return false;
                }
            },
        });
    });
</script>
</body>
</html>