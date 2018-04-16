<?php
//make connection met database
$conn = new mysqli('localhost','root','','lol champions');

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql='SELECT * FROM lanes';


$comment = array();

if ($resource = mysqli_query($conn,$sql))
{
    while($result = mysqli_fetch_assoc($resource))
    {
        $lanes[] = $result;
    }
}
if ( isset($_GET['lanes'])) {

    if ($_GET['lanes'] == 0 || $_GET['lanes'] == 1 || $_GET['lanes'] == 2 || $_GET['lanes'] == 3 || $_GET['lanes'] == 4) {

        $sql = " SELECT * FROM champions WHERE laneid = '{$_GET['lanes']}'";
        if ($resource = mysqli_query($conn, $sql)) // Makes an value from mysqli query.
        {
            while ($result = mysqli_fetch_assoc($resource))
            {
                $champions[$result['id']] = $result;
            }
        } else {
            echo "There is a problem:"; // Message says that there is a problem.
            die(mysqli_error($conn)); // Shows the $connect variable.
        }
        echo '<style>.containerSerie' . $_GET['lanes'] . '{background-color: #d3d3d3 !important;}</style>';
    }
}
else{
    //echo "<script>alert('welkom op mijn site');</script>";
}


if (isset($_GET['champions'])){
    if ($resource = mysqli_query($conn, "SELECT * FROM champions where id = " . $_GET['champions'] ))
    {
        while ($result = mysqli_fetch_assoc($resource))
        {
            $gekozenChampion[$result['id']] = $result;
        }
    } else {
        echo "There is a problem:"; // Message says that there is a problem.
        die(mysqli_error($conn)); // Shows the $connect variable.
    }

}
//setcookie("lanes", "appelmoes", +1, "/");
//echo '<pre>'; print_r( $lanes );  echo '</pre>';
if (isset($_POST['username'])){
  $showusers = "select * FROM 'users'";

}
if (isset($_POST['first_name'])) {

    $champions_id = $_GET['champions'];
    $Name = $_POST['first_name'];
    $comment = $_POST['Comment'];
    $rating = $_POST['rating'];

    $sql4 = "INSERT INTO comments ( Name, comment ,rating, champions_id) VALUES ('$Name', '$comment', $rating ,'$champions_id')";

    if(!mysqli_query($conn, $sql4))
    {
        echo"Connection lost";
    }
    else
    {
        header("location: index.php?lanes=".$_GET['lanes']."&champions=".$champions_id);
    }
}

if (isset($_GET['champions'])) {


    $showDataQuery = "SELECT * FROM `comments` WHERE `champions_id` = " . $_GET['champions'];

    $ratingSQL = "select avg(rating) as champion_average from comments where champions_id =  " . $_GET['champions'];

    $resource = mysqli_query($conn, $ratingSQL);
    $championAVG = mysqli_fetch_assoc($resource);
    //die($championAVG['champion_average']);

    if ($resource = mysqli_query($conn, $showDataQuery)) {//Shows array that you need as result
        while ($result = mysqli_fetch_assoc($resource)) {
            $comment[] = $result;
        }
    } else //Echo an error message
    {
        echo "Er is een fout: ";
        die(mysqli_error($conn));
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css"/>
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <title>Hello, world!</title>
</head>

<header class="header">
    <h1 style="margin-top: 0px; width: 1500px">
        <a href="index.php"><img style="width: 340px;height: 130px" src="Images/League-of-Legends-Logo.png" alt="Mountain View"></a>
        <div style="float:right;height: 100px">
            <form>
                <h6>
            <label>Naam</label>
            <input id="input-first-name" type="text" name="username" required="required" />
            <label>wachtwoord</label>
            <input id="input-Comment" type="text" name="password"</input>
            <input class="fifth" type="submit" name="submit" value="submit">
                </h6>
            </form>
        </div>
    </h1>

</header>

<body>


    <div class="content">
        <div class="left">
            <nav>

                <?php
                $counter = 0;
                foreach ($lanes as $id => $lanesValue){$counter++; ?>

                <div class="containerserie'.$id.'" id="containerLeftTop" style="background-size: contain; background-image: url('Images/<?php echo ($counter % 2 == 0 ? "good" : "none" ) ?>.jpg') ">
                    <a class="name" style="float:right" href="index.php?lanes=<?=$id?>"><?=$lanesValue['name']?></a>
                    <p class="imageLeft" style=""><img style="height: 99%; width:145px;" src="<?=$lanesValue['url']?>"</p>
                </div>

                <?php
                }
                ?>
            </nav>
        </div> <!--Einde div left-->

        <div class="center">
            <?php
         if (isset($_GET['lanes'])) {
                if (isset($champions)) {
                    $counter = 0;
                    echo '<nav>';
                    foreach ($champions as $id => $players) {
                        $counter++;
                        ?>
                        <div id="containerKaart" class="card kaart<?= $players['name'] ?> " style="background-size: contain; background-image: url('Images/<?php echo ($counter % 2 == 0 ? "good" : "none" ) ?>.jpg') "
                             data-kaart="<?= $players['name'] ?>">
                            <div  id="containerAfbeelding">
                              <p style="
    margin-top: 0px;
    margin-bottom: 0px;
"><img style="height: 144%; width: 157px;" src="<?=$players['url']?>"</p>
                            </div>
                            <div style="font-weight: bolder; text-align: center;" id="containerNaam">

                          </div>
                            <div id="containerOmschrijving">
                                    <?php


                                ?>
                                <h2 class="Namecenter" href="index.php?lanes=<?=$_GET['lanes']?>&champions=<?=$players['id']?>"><?=$players['name']?></h2>
                                <br>
                                <a class="ButtonMoreInfo"  href="index.php?lanes=<?=$_GET['lanes']?>&champions=<?=$players['id']?>">Klik hier voor meer info</a>
                                <p style="padding: 8px;padding: 8px;padding: 8px;margin-bottom: 0px;margin-top: 0px; padding: 8px;">
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
                echo '</nav>';
            }
            if (empty($champions)){
                echo 'geen champions gevonden';
            }
            ?>
        </div>

        <div class="right">
            <div class="boxcomment">
            <?php
                if (isset($_GET['champions'])){
                    foreach ($gekozenChampion as $id => $players) {
                        ?>
                        <p><img class="imageLast" src="<?=$players['url']?>"</p>
                        <?php
                        '<div>';
                        echo '<p><b></b> ' .$players['name']. '</p>';
                        echo "Current rating : " . $championAVG['champion_average'];
                        echo '<p><b>Omschrijving:</b>  ' .$players['discription']. '</p>';
                        '</div>';
                        ?>
                        <div class="Comment">

                            <form id="js-save-td-db" method="POST">
                                <ul style="list-style-type: none;">
                                    <label>Rate your hero :</label>
                                    <li>
                                        <div class="rate">
                                            <input type="radio" id="rating10" name="rating" value="10" /><label class="lblRating" for="rating10" title="10stars"></label>
                                            <input type="radio" id="rating9" name="rating" value="9" /><label class="lblRating half" for="rating9" title="9 stars"></label>
                                            <input type="radio" id="rating8" name="rating" value=px;"8" /><label class="lblRating" for="rating8" title="8 stars"></label>
                                            <input type="radio" id="rating7" name="rating" value="7" /><label class="lblRating half" for="rating7" title="7 stars"></label>
                                            <input type="radio" id="rating6" name="rating" value="6" /><label class="lblRating" for="rating6" title="6 stars"></label>
                                            <input type="radio" id="rating5" name="rating" value="5" /><label class="lblRating half" for="rating5" title="5 stars"></label>
                                            <input type="radio" id="rating4" name="rating" value="4" /><label class="lblRating" for="rating4" title="4 stars"></label>
                                            <input type="radio" id="rating3" name="rating" value="3" /><label class="lblRating half" for="rating3" title="3 stars"></label>
                                            <input type="radio" id="rating2" name="rating" value="2" /><label class="lblRating" for="rating2" title="2 star"></label>
                                            <input type="radio" id="rating1" name="rating" value="1" /><label class="lblRating half" for="rating1" title="1 star"></label>
                                            <input type="radio" id="rating0" name="rating" value="0" /><label class="lblRating" for="rating0" title="No star"></label>
                                        </div>
                                    </li>
                                    <li>
                                        <label>Naam</label>
                                        <input id="input-first-name" type="text" name="first_name" required="required" />
                                    </li>
                                    <li>
                                        <label>Comment</label>
                                        <textarea id="input-Comment" type="text" name="Comment"></textarea>
                                    </li>

                                    <li>
                                        <input class="submit"type="submit" name="submit" value="submit">
                                        <input type="hidden" name="" value="<?php echo $players['id']; ?>">
                                    </li>
                                </ul>
                            </form>
                                <div class="commentsection">
                                        <?php
                                        if (isset($_GET['champions'])){
                                            foreach ($comment as $key => $value) {
                                                if ($value['champions_id'] == $_GET['champions']) {
                                                    echo '<div class="customerContainer">';
                                                    echo '<div class="customerData">';
                                                    echo '<b> first-name: </b> </br>';
                                                    echo $value['Name'];
                                                    echo '</br></br>';
                                                    echo '</div>';

                                                    echo '<div class="customerMessage">';
                                                    echo '<b> het bericht van de klant: </b> </br>';
                                                    echo $value['comment'];
                                                    echo '</div>';
                                                    echo '<hr/>';
                                                    echo '</div>';
                                                }
                                            }
                                        }
                                        ?>

                                    </div>
                        </div>

            </div>


            <?php
                    }
                }

            ?>

        </div>

</body>
</html>