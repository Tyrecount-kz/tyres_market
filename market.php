<?php session_start(); ?>
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
    <section class="market">
        <div class="wrapper__title">
            <h1 class="title">
                Market
            </h1>
        </div>
        <div class="siderbar__filter">
            <form class="filter-search">
                <input name="city" type="text">
                <input name="car_model" type="text">
                <input name="release_year" type="text">
                <input name="mileage" type="text">
                <input name="transmission" type="text">
                <select name="rudder" id="rudder">
                    <option value="слева">слева</option>
                    <option value="справа">справа</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="posts__wrapper">
            <div class="posts">                
<?php 
    
    if(!$_SESSION['user']){
        header('location: login.php');
    }
    else{
        echo 'authorized';
    }
	if (oci_num_rows($result) >  0) {

        $counter = 0;
        while($row = oci_fetch_assoc($result)) {

            $id = $row["id"];
            $photo = $row["image"];
            $car_model = $row['car_model'];
            $release_year = $row['release_year'];
            $rudder = $row['rudder'];
            $gear = $row['gear'];
            $mileage = $row['mileage'];
            $engine_volume = $row['engine_volume'];
            $transmission = $row['transmission'];
            $img_type = "image/jpg";


            $mime = "image/jpeg";

            $counter += 1;  

            echo "<div class='post'>
            <div class='post-img'>
                <img src='./images/default.jpg' alt='#'>
            </div>
            <div class='post-information'>
                <div class='post-information__head'>
                    <h3>Car name</h3>
                    <h4>".$car_model. "/" .$shell. "/" .$release_year. "/" .$rudder. "/" .$gear. "/" .$mileage. "/" .$engine_volume. "/" .$transmission. "/" .$custom_clear. "/" .$color. "</h4>
                </div>
                <div class='post-information__bottom'>
                    <p>Description</p>
                </div>
            </div>
            <div class='post-price'>
                <h3>Price</h3>
                <h5><a href='#'>Comments</a></h4>
            </div>
            </div>;";
            if( $counter == 45) break;
        } 
    }
    else {
        echo "0 results";
    }
?>
                <div class="pagination">
                    <button class="prev"><</button>
                    <button class="page_num">1</button>
                    <button class="page_num">2</button>
                    <button class="page_num">3</button>
                    <button class="next">></button>
                </div>
            </div>
        </div>
</section>