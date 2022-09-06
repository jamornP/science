<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php //header('Location: /science/sciday/pages/'); 
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
  CURLOPT_POSTFIELDS =>'{ "batchName": "sciday2022-AnswerEN","certificateName": "นิทรรศการวันวิทยาศาสตร์ Science for every Generation", "sortBy": "studentName", "sortDirectionBy": "ASC", "limit": { "pageSize": 100, "pageNumber": 1 }}',
  CURLOPT_HTTPHEADER => array(
    'accept: application/json',
    'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IlNDSURBWSIsImV4cCI6NDcwNzk0NjQ2NSwianRpIjoiZjJmZTk5NGQtYjZkMy00MGQ0LWI4OTItZDc3NDA5MWI0OTE1IiwiaWF0IjoxNjMyMTA2NDY1LCJpc3MiOiJWeER4bk1ycWhPbzZUbmRmZ3NEdkRYdjVWaklzbWxVNSIsIm5iZiI6MTYzMjEwNjQ2NX0.eYSBC-bLhaf9_cnnpXUBtI26MdpmW9-Qf5ZO3axWnpE',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
print_r($response);
// $data = json_decode($response, true);
// foreach ($data['certificate'] as $key => $value) {
//   // echo $key."<br>";
//   echo $data["certificate"][$key]["data"]["certificateName"]." ".$data["certificate"][$key]["data"]["studentTitle"].$data["certificate"][$key]["data"]["studentName"]."link:".$data["certificate"][$key]["info"]["docPublicUrl"]."<br>";
// }
// $i=0;
// foreach ($data as $cer) {
//   echo $data["certificate"][0]["data"]["studentName"]."<br>";
//   $i++;
// }

?>
</body>

</html>