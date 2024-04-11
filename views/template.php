<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <header class="bg-light p-4">
        <nav>
            <a class="btn btn-success" href=".">Home</a>
            <a class="btn btn-success" href="?actionInter=intervenant">Intervenant</a>
            <a class="btn btn-success" href="?actionSemi=semainaire">Semianire</a>
        </nav>
    </header>

    <main class="container-fluid">
        <?php 
            if(isset($content)){
                echo $content;
            }else{
                echo "";
            }
         ?>        
    </main>

    <footer class="text-center text-dark bg-light p-4 mt-5">
        Gestion seminaire
    </footer>
    <?php unset($_SESSION["errors"]) ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>