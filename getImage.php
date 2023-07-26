<?php 
    
    include("connection.php");
    include("functions.php");

    if(checkLogin($connection)){

        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM datos WHERE user_id = '$id' limit 1";

        $result = mysqli_query($connection, $query);

        if($result && mysqli_num_rows($result) > 0){

            $userData = mysqli_fetch_assoc($result);
            $idUser = $userData['idUser'];

            $query = "SELECT * FROM images WHERE idUser = '$idUser'";
            $result = mysqli_query($connection, $query);

            $imgData = mysqli_fetch_assoc($result);

            if($imgData){

                ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img width="286" height="200" src="data:<?php echo $imgData['imageType']?>;base64, <?php echo base64_encode($imgData['image']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"> Image of <?php echo $userData['nombre'] ?> </h5>
                            <p class="card-text" id=" <?php echo $imgData['id_image']; ?> "> <?php echo $imgData['texto']; ?> </p>
                            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
                                More options
                            </button>-->
                        </div>
                    </div>    
                </div>
                <?php

                while($imgData = mysqli_fetch_assoc($result)){

                    $id = $imgData['idImage'];

                    ?>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img width="286" height="200" src="data:<?php echo $imgData['imageType']?>;base64, <?php echo base64_encode($imgData['image']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"> Image of <?php echo $userData['nombre'] ?> </h5>
                                <p class="card-text"> <?php echo $imgData['texto']; ?></p>
                                <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
                                    More options
                                </button>-->
                            </div>
                        </div>
                    </div>
                    <?php
                    
                }
            }
            else{
                ?>
                    <center>
                        <h1>You dont have any card image yet.</h1>
                    </center>
                <?php
            }
        }
    }
    else{
        header("Location: login.php");
        die;
    }