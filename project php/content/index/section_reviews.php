<?php

// Saves user's revies if one is logged in and shows it right after.

if (isset($_POST['sbm-review'])) {
    if (isset($_POST['review'])) {
        $sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
        sqlIniTrans($sqlBD);
        $sql = "INSERT INTO reviews (id_user,username,review,post_date)
    VALUES ('" . $_SESSION['user']['id'] . "','" . $_SESSION['user']['username'] . "','" . $_POST['review'] . "','" . date("Y-m-d") . "')";

        sqlQuery($sqlBD, $sql);
        sqlFinTrans($sqlBD);
    }

    $_POST = array();
}

$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlSelect = "SELECT * FROM  reviews";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayReviews = sqlResultArray($sqlBD, $sqlCursor);

?>

<div class="cont-1">
    <div class="container">
        <h2>Customer Reviews</h2>

        <div>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Review</th>
                </tr>
                <?php for ($i = 0; $i < count($arrayReviews); $i++) { ?>
                    <tr>
                        <td>
                            <?php
                            echo $arrayReviews[$i]['username'];
                            ?>
                        </td>
                        <td>

                            <?php
                            echo $arrayReviews[$i]['review'];
                            ?>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <form method="post">
            <textarea name="review" placeholder="Write your review here..." required></textarea>
            <br>
            <input id="<?php
                        if (!$loggedin) {
                            echo "btn-block";
                        } ?>"
                class="btn" name="sbm-review" type="submit" <?php
                                                            if (!$loggedin) {
                                                                echo "disabled";
                                                            } ?> value="Submit Review">
        </form>
        <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
    </div>

</div>