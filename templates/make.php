<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/make.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgs/webfav.png">
</head>

<body>

    <div class="container-fluid p-0">

        <?php 
    session_start();
    $qno=$_SESSION['qno'];
    $qno=$qno;
    echo("nmm,,".$qno);
        echo('<input  value="'.$qno.'" id="qno">');
        
        ?>
        <!-- <form> -->
        <div class="content p-4">
            <label for="question">Question</label>
            <input type="text" required class="form-control" id="question" placeholder="Your Question" value="">
            <label for="ranswer">Right Answer</label>
            <input type="text" required class="form-control" id="ranswer" placeholder="Right Answer" value="">
            <div class="row mt-5">
                <div class="col-sm-6">
                    <label for="option_1">Option 1</label>
                    <input type="text" id="option_1" required class="form-control" placeholder="Option 1" value="">
                    <label for="option_2">Option 2</label>
                    <input type="text" id="option_2" required class="form-control" placeholder="Option 2" value="">
                </div>
                <div class="col-sm-6">
                    <label for="option_3">Option 3</label>
                    <input type="text" id="option_3" required class="form-control" placeholder="Option 3" value="">
                    <label for="option_4">Option 4</label>
                    <input type="text" id="option_4" required class="form-control" placeholder="Option 4" value="">
                </div>
            </div>
        </div>
        <center><button id="nextbtn" onclick="data_sent()" class="btn btn-success" style="display: block;">Next</button></center>
        <center><button id="submitbtn" onclick="data_sent()" class="btn btn-success" style="display: none;">Submit</button></center>
        <!-- </form> -->
        <div class="dropdown-divider"></div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/make.js" async defer></script>
</body>

</html>