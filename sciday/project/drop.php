<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dropzone</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
  

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Jamorn</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Post</h4>
                <form action="uploader.php" id="my-awesome-dropzone">
                    <div class="form-group">
                        <label>Message</label>
                        <input type="text" name="post" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <div class="dropzone" id="drop"></div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">save</button>
                </form>

            </div>
        </div>
    </div>  
    <script src="js/drop.js"></script>
</body>

</html>