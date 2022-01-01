<?php
    //check if logged in
    require_once 'check-session.php';
    
    //check if need reset password (check if password and username are the same)
    require_once 'check-password.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<?php
    if ($_SESSION['permission'] === "Nhân viên") {
        ?>
            <div class="d-flex min-vh-100 flex-column align-items-center justify-content-center px-4">
                <h5 class="text-secondary text-center mb-4">Bạn không có quyền truy cập vào trang này</h5>
                <a href="index.php" class="btn btn-primary text-center">Quay về trang chủ</a>   
            </div>
        <?php

        die();
    }
?>

<body>
    <div id="wrapper">
        <?php include 'navbar.php'; ?>

        <div class="container">


            <div class="row">
                <div class="col">
                    <div class="border p-3 rounded bg-white">
                        <h5>Danh sách yêu cầu nghỉ phép</h5>
                        <hr class="mt-2 ">
                        <div class="text-muted mb-2"><b>Phòng ban: <?= $_SESSION['department-name']?></b></div>

                        <div class=" mb-2 request-container">
    

                        </div>


                    </div>

                </div>
            </div>

        </div>

        <div id="department-id" style="display:none"><?= $_SESSION['department-id']?></div>

        <?php include_once 'footer.php'; ?> 
    </div>


    <!-- modal -->
    <div class="modal" tabindex="-1" >
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Duyệt yêu cầu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body  ">
                <div class="d-flex flex-wrap justify-content-between align-items-center px-1">
                    <div class="d-flex flex-column ">
                        <h5 id="hoten" class=" mb-0">Khoa Lê</h5>
                        <div id="employeeid" class="text-muted">51900753</div>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="">
                            Trạng thái:<span id="status" class="badge ml-2"></span >
                        </div>
                        <div class="">
                            Số ngày yêu cầu:<span id="songay" class="ml-1"></span>
                        </div>
                    </div>
                </div>

                <hr class="mt-1 mb-2">
                <div id="reason" class="px-2" style="min-height:5rem"></div>
                <hr class="mt-1 mb-2">

                <div class="px-2">
                    File đính kèm:<a href="#" id="file" class="ml-2" download></a>
                </div>

                <div class="btn-group float-right">
                    <button type="button" class="btn btn-danger" onclick="refuse()">Refuse</button>
                    <button type="button" class="btn btn-success" onclick="approve()" >Approve</button>
                </div>
            </div>

        </div>
    </div>
</body>

<script src="main.js"></script>
</html>