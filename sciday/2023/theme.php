<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
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
<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar2023.php";?>
    <?php //print_r($_SESSION);?>
    <div class="container">
        
        
       
     
    </div>
   
    
</body>
</html>