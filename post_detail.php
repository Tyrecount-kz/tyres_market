


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="market.css">
</head>

<?php
    ob_start();
    require('connect.php');

    $id = $_GET["id"];

    $sql = "SELECT * FROM queries WHERE id = $id";
    $result = oci_parse($connection, $sql);

    $data = null;

    if (oci_num_rows($result) >  0) {

        while($row = oci_fetch_assoc($result)) {
            $data = $row;
        }
        
    } 

    oci_close($connection);
?>
<body>
    <header>
        <div class="header__wrapper">
            <div class="logo">
                TyreKZ
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sign In/Up</a></li>
                    <li><a href="#">Market</a></li>
                    <li><a href="#">Predict</a></li>
                </ul>
            </nav>

        </div>
    </header>
    <section class="post_detail">
        <div class="wrapper__title">
            <h1 class="title">
                #post name
            </h1>
        </div>
        <div class="post-detail__wrapper">
            <div class="post-detail__content">
                <div class="post-detail__image-wrapper">
                    <img src="./images/default.jpg" alt="#">
                </div>
                <div class="post-detail__information">
                    <div class="post-detail__char-title">
                        <h2 class="post-detail__subtitle character">Characteristics</h2>
                        <h3 class="char_item car_model">Car model</h3>
                        <h3 class="char_item shell">Shell</h3>
                        <h3 class="char_item release_year">Release year</h3>
                        <h3 class="char_item rudder">Rudder</h3>
                        <h3 class="char_item gear">Gear</h3>
                        <h3 class="char_item mileage">Mileage</h3>
                        <h3 class="char_item engine_volume">Engine Volume</h3>
                        <h3 class="char_item transmission">Transmission</h3>
                        <h3 class="char_item custom_clear">Custom clear</h3>
                        <h3 class="char_item color">Color</h3>
                    </div>
                    <div class="post-detail__char-value">
                        <h2 class="post-detail__subtitle price"><?php echo $data["price"]; ?></h2>
                        <h3 class="char_item-value car_model"><?php echo $data["car_model"]; ?></h3>
                        <h3 class="char_item-value shell"><?php echo $data["shell"]; ?></h3>
                        <h3 class="char_item-value release_year"><?php echo $data["release_year"]; ?></h3>
                        <h3 class="char_item-value rudder"><?php echo $data["rudder"]; ?></h3>
                        <h3 class="char_item-value gear"><?php echo $data["gear"]; ?></h3>
                        <h3 class="char_item-value mileage"><?php echo $data["mileage"]; ?></h3>
                        <h3 class="char_item-value engine_volume"><?php echo $data["engine_volume"]; ?></h3>
                        <h3 class="char_item-value transmission"><?php echo $data["transmission"]; ?></h3>
                        <h3 class="char_item-value custom_clear"><?php echo $data["custom_clear"]; ?></h3>
                        <h3 class="char_item-value color"><?php echo $data["color"]; ?></h3>
                    </div>
                </div>
            </div>
            <div class="post-detail__describtion">
                <h2 class="post-detail__subtitle describtion">Describtion</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint molestiae omnis cumque nisi! Id beatae, eveniet laborum ea officiis asperiores totam amet in recusandae, praesentium est perspiciatis alias, quisquam excepturi.
                Fugit saepe tempore ratione dolor omnis quae, rerum optio praesentium voluptatibus quisquam? Deserunt neque odit natus quas expedita impedit commodi, autem explicabo nostrum ad vitae perferendis quod saepe fugit molestiae?
                Placeat eligendi veniam non molestias saepe, fugiat repudiandae odio quod unde incidunt asperiores ab, expedita sed reprehenderit eum porro aspernatur optio sequi mollitia, officia perspiciatis sit. Dolores quibusdam sunt quos.</p>
            </div>
            <hr>
            <div class="post-detail__comments">
                <div class="subtitle__wrapper">
                    <h2 class="post-detail__subtitle comments">Comments</h2>
                </div>
                <div class="comments__wrapper">
                    <div class="comments">
                        <div class="comment">
                            <h3 id="author">#Author</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis autem est veniam doloremque laborum impedit, ullam delectus deserunt tempora? Repudiandae iusto laboriosam ullam necessitatibus nobis asperiores sit a quas?Animi, amet excepturi? At accusamus reprehenderit quasi provident nobis nihil soluta labore culpa iste qui voluptatibus et neque est non dolor facere mollitia officiis sequi similique, natus quibusdam expedita? Vero.</p>
                        </div>
                        <div class="comment">
                            <h3 id="author">#Author</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis autem est veniam doloremque laborum impedit, ullam delectus deserunt tempora? Repudiandae iusto laboriosam ullam necessitatibus nobis asperiores sit a quas?Animi, amet excepturi? At accusamus reprehenderit quasi provident nobis nihil soluta labore culpa iste qui voluptatibus et neque est non dolor facere mollitia officiis sequi similique, natus quibusdam expedita? Vero.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>