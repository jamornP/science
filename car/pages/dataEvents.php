<?php require $_SERVER['DOCUMENT_ROOT']."/car/vendor/autoload.php"; ?>

<?php
    use App\Model\Book;

    $bookObj = new Book();

    $books = $bookObj->getAllbook();

    $n=0;

    foreach($books as $book) {
        
            
       
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
    $json = json_encode($json_data);
    echo $json;

?>