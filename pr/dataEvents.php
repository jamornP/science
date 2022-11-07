<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"; ?>

<?php
    use App\Model\Pr\Work;

    $workObj = new Work();

    $works = $workObj->getAllWork();

    $n=0;

    foreach($works as $work) {
        $json_data[] = [
            'id' => $work['id'],
            'title' =>
                $work['title'] ,
            'start' => $work['start_date']." ".$work['start_time'] ,
            'end' => $work['end_date']." ".$work['end_time'],
            'url' => 'showEventsData.php?date='.$work['start_date'],
            'color' =>  $work['color'],
            'allDay' => true,
            'editable' => true
        ];
    }
    
    $json = json_encode($json_data);
    echo $json;

?>