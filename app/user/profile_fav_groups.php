<?php 
$title = "Your Profile - Favourite Group";
$page  = "profile";
?>

<?php require_once("templates/main_start.php"); ?>
<?php

if(!isset($_SESSION["login"]) && $_SESSION['login'] == false)
{
    header("Location: ".BASEURL."/app/user/login.php");
    exit;
}



$groups  = getAllFavoriteGroupsByEmail($_SESSION["email"]);
$menu    = "fav-groups";

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
                <svg xmlns="http://www.w3.org/2000/svg" width="52.067" height="38.487" viewBox="0 0 52.067 38.487">
                    <path id="_672ff0e75e6fc462b10e7e4053066b8e" data-name="672ff0e75e6fc462b10e7e4053066b8e" d="M26.534,26.638a11.319,11.319,0,1,0-8-3.316,11.285,11.285,0,0,0,8,3.316ZM44.644,28.9a5.65,5.65,0,1,0-4-1.655A5.648,5.648,0,0,0,44.644,28.9Zm0,1.336a9.458,9.458,0,0,0-6.6,2.191C35.516,30.353,31.525,28.9,26.534,28.9c-5.13,0-9.044,1.467-11.527,3.541a9.545,9.545,0,0,0-6.583-2.2C3.47,30.237.5,32.7.5,35.177c0,1.234,2.97,2.472,7.923,2.472a21.7,21.7,0,0,0,3.674-.3l-.091.611c0,2.264,5.447,4.528,14.527,4.528,8.516,0,14.527-2.264,14.527-4.528l-.045-.577a23.3,23.3,0,0,0,3.629.267c4.643,0,7.923-1.238,7.923-2.472,0-2.472-3.108-4.94-7.923-4.94ZM8.423,28.9a5.648,5.648,0,1,0-4.005-1.654A5.641,5.641,0,0,0,8.423,28.9Z" transform="translate(-0.5 -4)" fill="#35247e"/>
                </svg>

            </div>
            <h1 class="font-kanit">Your Favourites Groups</h1>
        </div>
        <div class="idol-information-teammates">

            <div class="list-favourite-idols">
                <?php foreach($groups as $group) : ?>
                <a href="group_detail.php?group=<?= $group["slug"] ?>">
                    <div class="card-idol-sm">
                        <div class="card-idol-sm-cover" style="background-image:url('<?= $group["group_cover"] ?>'); 
                        background-size:cover;background-position:center"></div>
                        <div class="card-idol-sm-name font-kanit"><?= $group["group_name"] ?></div>
                    </div>
                </a>

                <?php endforeach; ?>
            </div>

        </div>
    </div>

</section>


    
<?php require_once("templates/main_end.php"); ?>