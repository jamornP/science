<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"; ?>

<?php
    use App\Model\Car\Book;

    $bookObj = new Book();

    $books = $bookObj->getAllbook();

    $n=0;

    foreach($books as $book) {
        
            
       if($book['c_id']==1){
            $json_data[] = [
                'id' => $book['id'],
                'title' =>
                    $book['title'] ,
                'start' => $book['start_date']." ".$book['start_time'] ,
                'end' => $book['end_date']." ".$book['end_time'],
                'url' => 'showEventsData.php?id=' . $book['id'],
                'color' =>  '#3020BE',
            ];
       }else{
            $json_data[] = [
                'id' => $book['id'],
                'title' =>
                    $book['title'] ,
                'start' => $book['start_date']." ".$book['start_time'] ,
                'end' => $book['end_date']." ".$book['end_time'],
                'url' => 'showEventsData.php?id=' . $book['id'],
                'color' =>  $book['color'],
            ];
        }
    }
    $json = json_encode($json_data);
    echo $json;

?>