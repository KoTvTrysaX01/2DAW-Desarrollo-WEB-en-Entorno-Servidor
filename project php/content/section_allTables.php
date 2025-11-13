<style>
    body{
        background-image: url('./assets/bg/index.png');
    }
    .container-grid {
        padding: 6em;
        text-align: center;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 1em;
        background-color: rgba(145, 137, 146, 0.63);
    }

    .col {

        flex: 0 0 calc(20.66% - 1em);
        background: teal;
        color: white;
        margin: 10px;
        align-content: center;
        height: 15vh;
        background-color: grey;
        border-radius: 15px;
        font-weight: bold;
        font-size: 1.5em;

        transition: all 0.3s ease;
        cursor: pointer;
    }

    .ice_creams {
        background-color: rgb(253, 251, 212);
        color: rgb(56, 36, 13);
    }
    .ice_creams:hover{
        color: rgb(253, 251, 212);
        background-color: rgb(56, 36, 13);
    }

    .ice_bars {
        background-color: rgb(89, 33, 0);
        color: rgb(255, 255, 255);
    }
    .ice_bars:hover{
        color: rgb(89, 33, 0);
        background-color: rgb(255, 255, 255);
    }
    .cookies {
        background-color: rgb(194, 67, 12);
        color: rgb(255, 255, 255);
    }
    .cookies:hover{
        color: rgb(194, 67, 12);
        background-color: rgb(255, 255, 255);
    }
    .chocolates {
        background-color: rgb(0, 109, 11);
        color: rgb(255, 255, 255);
    }
    .chocolates:hover{
        color: rgb(0, 109, 11);
        background-color: rgb(255, 255, 255);
    }
    .milkshakes {
        background-color: rgb(0, 225, 255);
        color: rgb(255, 255, 255);
    }
    .milkshakes:hover{
        color: rgb(0, 225, 255);
        background-color: rgb(255, 255, 255);
    }
    .juices {
        background-color: rgb(255, 251, 0);
        color: rgb(5, 139, 0);
    }
    .juices:hover{
        color: rgb(255, 251, 0);
        background-color: rgb(5, 139, 0);
    }
    .smoothies {
        background-color: rgb(82, 0, 189);
        color: rgb(255, 0, 0);
    }
    .smoothies:hover{
        color: rgb(82, 0, 189);
        background-color: rgb(255, 0, 0);
    }
    .special_offers {
        background-color: rgba(234, 0, 255, 1);
        color: rgba(255, 255, 255, 1);
    }
    .special_offers:hover{
        color: rgba(234, 0, 255, 1);
        background-color: rgba(255, 255, 255, 1);
    }
    .purchase {
        background-color: rgba(255, 89, 0, 1);
        color: rgba(246, 255, 0, 1);
    }
    .purchase:hover{
        color: rgba(255, 89, 0, 1);
        background-color: rgba(246, 255, 0, 1);
    }
    .sells {
        background-color: rgba(85, 0, 255, 1);
        color: rgba(255, 255, 255, 1);
    }
    .sells:hover{
        color: rgba(85, 0, 255, 1);
        background-color: rgba(255, 255, 255, 1);
    }
    .users {
        background-color: rgba(0, 0, 0, 1);
        color: rgba(255, 255, 255, 1);
    }
    .users:hover{
        color: rgba(0, 0, 0, 1);
        background-color: rgba(255, 255, 255, 1);
    }


</style>

<div class="container-grid">

    <div class="col ice_creams" onclick="location.href='tables.php?category=ice_creams'">Ice Creams</div>
    <div class="col ice_bars" onclick="location.href='tables.php?category=ice_bars'">Ice Bars</div>
    <div class="col cookies" onclick="location.href='tables.php?category=cookies'">Cookies</div>
    <div class="col chocolates" onclick="location.href='tables.php?category=chocolates'">Chocolates</div>



    <div class="col milkshakes" onclick="location.href='tables.php?category=milkshakes'">Milkshakes</div>
    <div class="col juices" onclick="location.href='tables.php?category=juices'">Juices</div>
    <div class="col smoothies" onclick="location.href='tables.php?category=smoothies'">Smoothies</div>
    <div class="col special_offers" onclick="location.href='tables.php?category=special_offers'">Special Offers</div>


    <div class="col sells" onclick="location.href='tables.php?category=sells'">Sells</div>
    <div class="col reviews" onclick="location.href='tables.php?category=reviews'">Reviews</div>
    <div class="col users" onclick="location.href='tables.php?category=users'">Users</div>



</div>