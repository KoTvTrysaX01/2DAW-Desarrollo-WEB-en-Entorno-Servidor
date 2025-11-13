<style>
    :root {
        --header-bg-color-1: rgb(255, 255, 255);
        --header-bg-color-2: rgb(255, 181, 209);
    }

    .cont-1 {
        display: grid;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .container {
        background: white;
        padding: 20px;
        width: 100%;
        margin: auto;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 2em 0em;
    }

    textarea {
        width: 95%;
        height: 100px;
        margin: 10px 0;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn {
        background: #ff5722;
        color: white;
        font-size: 1em;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover,
    .btn-back:hover {
        background: #e64a19;
    }

    .reviews {
        margin-top: 20px;
        text-align: left;
    }

    .review {
        background: #fff3e0;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
    }

    .btn-back {
        background: #ff5722;
        color: white;
        border: none;
        padding: 1em 3em;
        font-size: 1.2em;
        border-radius: 15px;
        cursor: pointer;
    }


    table {
        width: 100%;
        text-align: center;
        border: 1px solid black;
    }

    td,
    th {
        border: 1px solid black;
    }
</style>

<?php
$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlSelect = "SELECT * FROM  {$config['category']} WHERE 'username' = {$_SESSION['usuairo']}";
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
            <button id="<?php
                        if (!$loggedin) {
                            echo "btn-block";
                        } ?>"
                class="btn" name="sbm-review" type="submit" <?php
                                            if (!$loggedin) {
                                                echo "disabled";
                                            } ?>>Submit Review</button>
        </form>

    </div>
    <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
</div>