<?php 
$title = "Your Profile";
$page  = "profile";
?>

<?php require_once("templates/main_start.php"); ?>
<?php
if(!isset($_SESSION["login"]) && $_SESSION['login'] == false)
{
    header("Location: ".BASEURL."/app/user/login.php");
    exit;
}

$idols = getAllFavoriteIdolsByEmail($_SESSION['email']);
$menu  = "fav-idols";

$user  = getUserData($_SESSION['email']);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    logout();
}


?>


<?php require_once("components/profile_component.php"); ?>




<section class="user-favourites">
    
    <?php require_once("components/favourite_menus.php"); ?>


    <div class="card-base-info card-favourites-content">
        <div class="card-base-info-title">
            <div class="card-base-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.5" height="38.697" viewBox="0 0 41.5 38.697">
                    <path id="_071673b1ad5c4d35616f269074d0e28e" data-name="071673b1ad5c4d35616f269074d0e28e" d="M10.992,17.823a6.917,6.917,0,0,0,6.917-6.917c-.364-9.175-13.47-9.172-13.833,0a6.917,6.917,0,0,0,6.917,6.917ZM6.15,33.732v6.917a2.075,2.075,0,0,0,2.075,2.075h5.533a2.075,2.075,0,0,0,2.075-2.075V27.507l4.381,3.37a2.867,2.867,0,0,0,3.876-4.187l-5.077-5.642a1.383,1.383,0,0,0-1.028-.458H4.075A2.075,2.075,0,0,0,2,22.665v8.992a2.075,2.075,0,0,0,2.075,2.075ZM34.508,17.823a6.917,6.917,0,0,0,6.917-6.917c-.364-9.175-13.47-9.172-13.833,0a6.917,6.917,0,0,0,6.917,6.917Zm6.917,2.767H27.516a1.388,1.388,0,0,0-1.031.457l-2.808,3.119,1.439,1.6a4.259,4.259,0,0,1,.636,4.752l3.915-3.009V40.648a2.072,2.072,0,0,0,2.075,2.075h5.533a2.072,2.072,0,0,0,2.075-2.075V33.732h2.075A2.072,2.072,0,0,0,43.5,31.657V22.665a2.072,2.072,0,0,0-2.075-2.075Z" transform="translate(-2 -4.026)" fill="#35247e"/>
                </svg>
            </div>
            <h1 class="font-kanit">Your Favourites Idols</h1>
        </div>
        <div class="idol-information-teammates">

            <div class="list-favourite-idols">
                <?php foreach($idols as $idol) : ?>
                <a href="idol_detail.php?group=<?= $idol["slug"] ?>&idol=<?= $idol["id_idol"] ?>">
                    <div class="card-idol-sm">
                        <div class="card-idol-sm-cover" style="background-image:url('<?= $idol["photo"] ?>'); 
                        background-size:cover;background-position:center"></div>
                        <div class="card-idol-sm-name font-kanit"><?= $idol["idol_name"] ?></div>
                    </div>
                </a>

                <?php endforeach; ?>
            </div>

        </div>
    </div>

</section>


    
<?php require_once("templates/main_end.php"); ?>