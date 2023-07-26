<?php 
    
    include("connection.php");
    include("links.php");



    $query = "SELECT * FROM images";
    $result = mysqli_query($connection, $query);

    while($imgData = mysqli_fetch_assoc($result)){
           
        $idUser = $imgData['idUser'];
        $query2 = "SELECT * FROM datos WHERE idUser = '$idUser'";   
        $result2 = mysqli_query($connection, $query2);

        $userData = mysqli_fetch_assoc($result2);

        ?> 
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img width="286" height="200" src="data:<?php echo $imgData['imageType']?>;base64, <?php echo base64_encode($imgData['image']); ?>">
                    <div class="card-body">
                        <h5 class="card-title">  
                            Image of 
                            <?php  
                                echo $userData['nombre'];
                            ?>
                        </h5>
                        <p class="card-text"><?php echo $imgData['texto']; ?></p>
                    </div>
                </div>
            </div>
        <?php
    }

                    
?>