<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Certificate;
 $certificateObj = new Certificate; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
    
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <?php
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://scica.science.kmitl.ac.th/eds-external/digital-certificate/list',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{ "studentName": "","certificateName": "นิทรรศการวันวิทยาศาสตร์ Science for every Generation","createDate": "2022-09-13T00:00:00+07:00", "sortBy": "batchId,", "sortDirectionBy": "DESC", "limit": { "pageSize": 1000, "pageNumber": 1 }}',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IlNDSURBWSIsImV4cCI6NDcwNzk0NjQ2NSwianRpIjoiZjJmZTk5NGQtYjZkMy00MGQ0LWI4OTItZDc3NDA5MWI0OTE1IiwiaWF0IjoxNjMyMTA2NDY1LCJpc3MiOiJWeER4bk1ycWhPbzZUbmRmZ3NEdkRYdjVWaklzbWxVNSIsIm5iZiI6MTYzMjEwNjQ2NX0.eYSBC-bLhaf9_cnnpXUBtI26MdpmW9-Qf5ZO3axWnpE',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        // print_r($response);
    ?>
    <div class="card">
        <div class="card-header">
            <a href="/science/sciday/certificate/certificate5.php" class="btn btn-success text-white"> Next >></a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Add</th>
                    <th scope="col">CertificateId</th>
                    <th scope="col">ProcessId</th>
                    <th scope="col">TemplateId</th>
                    <th scope="col">Stuid</th>
                    <th scope="col">Title</th>
                    <th scope="col">StudentName</th>
                    <th scope="col">BatchId</th>
                    <th scope="col">CreateDate</th>
                    <th scope="col">link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data = json_decode($response, true);
                        $i=0;
                        foreach ($data['certificate'] as $key => $value) {
                        $i++;
                        $certificateName=$data["certificate"][$key]["data"]["certificateName"];
                        $certificateId=$data["certificate"][$key]["data"]["id"];
                        $ProcessId=$data["certificate"][$key]["data"]["digitalCertificateProcessId"];
                        $TemplateId=$data["certificate"][$key]["data"]["templateId"];
                        $StudentId=$data["certificate"][$key]["data"]["studentCode"];
                        $Title=$data["certificate"][$key]["data"]["studentTitle"];
                        $StudentName=$data["certificate"][$key]["data"]["studentName"];
                        $BatchId=$data["certificate"][$key]["data"]["processCode"];
                        $dateC=strtotime($data["certificate"][$key]["data"]["createDate"]);
                        $CreateDate=date("Y-m-d h:i:s",$dateC);
                        $certificateLink=$data["certificate"][$key]["info"]["docPublicUrl"];
                        $dataCertificate['certificateId']=$certificateId; 
                        $dataCertificate['certificateName']=$certificateName; 
                        $dataCertificate['certificateProcessId']=$ProcessId; 
                        $dataCertificate['templateId']=$TemplateId; 
                        $dataCertificate['studentCode']=$StudentId; 
                        $dataCertificate['studentTitle']=$Title; 
                        $dataCertificate['studentName']=$StudentName; 
                        $dataCertificate['batchId']=$BatchId; 
                        $dataCertificate['certificateLink']=$certificateLink; 
                        $dataCertificate['certificateCreateDate']=$CreateDate;
                        // insert
                        // $ck=$certificateObj->addCertificate($dataCertificate);
                        $updateLink['certificateLink']=$certificateLink;
                        $updateLink['certificateId']=$certificateId; 
                        $updateLink['studentTitle']=$Title; 
                        $updateLink['studentName']=$StudentName; 
                        $updateLink['certificateProcessId']=$ProcessId;
                        // update
                          $ck=$certificateObj->updateCertificate($updateLink);

                        $show="";
                        if($ck){
                            $show="<i class='bx bxs-check-square text-success'></i>";
                        }else{
                            $show="<i class='bx bxs-no-entry text-danger'></i>";
                        }
                        echo "
                            <tr>
                                <th scope='row'>{$i}</th>
                                <td>{$show}</td>
                                <td>{$certificateId}</td>
                                <td>{$ProcessId}</td>
                                <td>{$TemplateId}</td>
                                <td>{$StudentId}</td>
                                <td>{$Title}</td>
                                <td>{$StudentName}</td>
                                <td>{$BatchId}</td>
                                <td>{$CreateDate}</td>
                                <td><a href='{$certificateLink}'>link</a></td>
                            </tr>
                        ";
                        // echo $i.". ";
                        // echo ." ".$data["certificate"][$key]["data"]["studentTitle"].$data["certificate"][$key]["data"]["studentName"];
                        // $link = $data["certificate"][$key]["info"]["docPublicUrl"];
                        // echo "
                        // <a class='navbar-brand' href='{$link}'> Download</a>
                        // <br>
                        // ";
                        
                        }
                    ?>
                    
                    
                </tbody>
            </table>
        </div>
        
    </div>
    
</body>
</html>