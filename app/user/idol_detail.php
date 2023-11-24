<?php 
$title = "Idol Detail";
$page  = "group";
?>

<?php require_once("templates/main_start.php"); ?>
<?php

$group     = getGroupHighlightBySlug($_GET["group"]);
$idol      = getDataIdolsById($_GET["idol"]);
$teammates = getDataHighlightIdolsByGroupAndNotSelf($_GET["idol"], $group["id_group"]);
$age       = (date('Y') - date('Y',strtotime($idol["birthday"])));



if(isset($_SESSION["login"]) && $_SESSION['login'] == true)
{
    $idFavIdol = getFavoriteIdolsByFavourite($_SESSION['email'], $idol["id_idol"] );
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST["status"] == "saved")
        {
            addFavouriteIdol($_SESSION['email'], $_POST["id-idol"]);
        }
        else
        {
            removeFavouriteIdol($_SESSION['email'], $_POST["id-idol"]);
        }
        unset($_POST);
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;
    
    }
}


?>


<section class="menu-hierarchy">
    <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="27.838" height="29.303" viewBox="0 0 27.838 29.303">
            <path id="_2ae66759f9bda47bb5a4c88130dd24db" data-name="2ae66759f9bda47bb5a4c88130dd24db" d="M9.721,27.506v-4.48a2.078,2.078,0,0,1,2.086-2.071h4.211a2.093,2.093,0,0,1,1.475.607,2.063,2.063,0,0,1,.611,1.464v4.48a1.778,1.778,0,0,0,.522,1.27A1.8,1.8,0,0,0,19.9,29.3h2.873a5.071,5.071,0,0,0,3.58-1.464,5,5,0,0,0,1.484-3.55V11.526a3.623,3.623,0,0,0-1.312-2.787L16.753.99a4.538,4.538,0,0,0-5.785.1L1.417,8.739A3.625,3.625,0,0,0,0,11.526v12.75A5.046,5.046,0,0,0,5.064,29.3H7.871a1.8,1.8,0,0,0,1.81-1.784Z" fill="#35247e"/>
        </svg>
    </a>

    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="30" viewBox="0 0 18 30">
        <path id="_54aec5deb03266394c2fc8af8ec2f2d0" data-name="54aec5deb03266394c2fc8af8ec2f2d0" d="M12,1,26,16,12,31,8,27,18,16,8,5Z" transform="translate(-8 -1)" fill="rgba(56,56,60,0.49)"/>
    </svg>

    
    <a href="groups.php">
        <span class="font-kanit">
            Groups
        </span>
    </a>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="30" viewBox="0 0 18 30">
        <path id="_54aec5deb03266394c2fc8af8ec2f2d0" data-name="54aec5deb03266394c2fc8af8ec2f2d0" d="M12,1,26,16,12,31,8,27,18,16,8,5Z" transform="translate(-8 -1)" fill="rgba(56,56,60,0.49)"/>
    </svg>
    

    <a href="group_detail.php?group=<?= $group["slug"] ?>">
        <span class="font-kanit">
            <?= $group["group_name"] ?>
        </span>
    </a>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="30" viewBox="0 0 18 30">
        <path id="_54aec5deb03266394c2fc8af8ec2f2d0" data-name="54aec5deb03266394c2fc8af8ec2f2d0" d="M12,1,26,16,12,31,8,27,18,16,8,5Z" transform="translate(-8 -1)" fill="rgba(56,56,60,0.49)"/>
    </svg>
    

    <a href="group_detail.php?group=<?= $group["slug"] ?>&idol=<?= $idol["id_idol"] ?>">
        <span class="font-kanit">
            <?= $idol["idol_name"] ?>
        </span>
    </a>

</section>


<section class="idol-header">
    <div class="idol-profile">
        <div class="idol-profile-photo" style="background-image:url('<?= $idol["photo"] ?>'); 
            background-size:cover;background-position:center"></div>
    </div>
    <div class="idol-bio">
        <div class="idol-bio-header font-kanit">
            <h1><?= $idol["idol_name"] ?></h1>
            <?php if(isset($_SESSION['login'])) : ?>
                <form action="" method="post">
                    <input type="hidden" name="id-idol" value="<?= $idol["id_idol"] ?>">

                    <?php if($idFavIdol != NULL) : ?>
                        <input type="hidden" name="status" value="not-saved">
                        <button class="primary-btn font-kanit">- Remove Idol</button>
                    
                    <?php else : ?>
                        <input type="hidden" name="status" value="saved">
                        <button class="primary-btn font-kanit">+ Save Idol</button>

                    <?php endif; ?>
                </form>
            <?php endif; ?>
        </div>
        <div class="idol-bio-detail-container">
            <div class="idol-bio-detail-left font-kanit">
                <span>Full Name</span>
                <span>Birthday</span>
                <span>Age</span>
                <span>Height</span>
                <span>Weight</span>
            </div>
            <div class="idol-bio-detail-right font-montserrat">
                <span><?= $idol["full_name"] ?></span>
                <span><?= $idol["birthday"] ?></span>
                <span><?= $age ?></span>
                <span><?= $idol["height"] ?> cm</span>
                <span><?= $idol["weight"] ?> kg</span>
            </div>
        </div>
    </div>
</section>


<section class="idol-information">
    <div class="card-base-info card-information-group">
        <div class="card-base-info-title">
            <div class="card-base-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="52.067" height="38.487" viewBox="0 0 52.067 38.487">
                    <path id="_672ff0e75e6fc462b10e7e4053066b8e" data-name="672ff0e75e6fc462b10e7e4053066b8e" d="M26.534,26.638a11.319,11.319,0,1,0-8-3.316,11.285,11.285,0,0,0,8,3.316ZM44.644,28.9a5.65,5.65,0,1,0-4-1.655A5.648,5.648,0,0,0,44.644,28.9Zm0,1.336a9.458,9.458,0,0,0-6.6,2.191C35.516,30.353,31.525,28.9,26.534,28.9c-5.13,0-9.044,1.467-11.527,3.541a9.545,9.545,0,0,0-6.583-2.2C3.47,30.237.5,32.7.5,35.177c0,1.234,2.97,2.472,7.923,2.472a21.7,21.7,0,0,0,3.674-.3l-.091.611c0,2.264,5.447,4.528,14.527,4.528,8.516,0,14.527-2.264,14.527-4.528l-.045-.577a23.3,23.3,0,0,0,3.629.267c4.643,0,7.923-1.238,7.923-2.472,0-2.472-3.108-4.94-7.923-4.94ZM8.423,28.9a5.648,5.648,0,1,0-4.005-1.654A5.641,5.641,0,0,0,8.423,28.9Z" transform="translate(-0.5 -4)" fill="#35247e"/>
                </svg>
            </div>
            <h1 class="font-kanit">Group</h1>
        </div>
        <div class="idol-information-group">
            <a href="group_detail.php?group=<?= $group["slug"] ?>">
                <div class="card-group">
                    <div class="card-group-cover" style="background-image:url('<?= $group["group_cover"] ?>'); 
                    background-size:cover;background-position:center">
                        <div class="card-group-overlay"></div>
                    </div>
                    <div class="card-group-name"><?= $group["group_name"] ?></div>
                </div>
            </a>
        </div>
    </div>

    <div class="card-base-info card-information-teammates">
        <div class="card-base-info-title">
            <div class="card-base-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.5" height="38.697" viewBox="0 0 41.5 38.697">
                    <path id="_071673b1ad5c4d35616f269074d0e28e" data-name="071673b1ad5c4d35616f269074d0e28e" d="M10.992,17.823a6.917,6.917,0,0,0,6.917-6.917c-.364-9.175-13.47-9.172-13.833,0a6.917,6.917,0,0,0,6.917,6.917ZM6.15,33.732v6.917a2.075,2.075,0,0,0,2.075,2.075h5.533a2.075,2.075,0,0,0,2.075-2.075V27.507l4.381,3.37a2.867,2.867,0,0,0,3.876-4.187l-5.077-5.642a1.383,1.383,0,0,0-1.028-.458H4.075A2.075,2.075,0,0,0,2,22.665v8.992a2.075,2.075,0,0,0,2.075,2.075ZM34.508,17.823a6.917,6.917,0,0,0,6.917-6.917c-.364-9.175-13.47-9.172-13.833,0a6.917,6.917,0,0,0,6.917,6.917Zm6.917,2.767H27.516a1.388,1.388,0,0,0-1.031.457l-2.808,3.119,1.439,1.6a4.259,4.259,0,0,1,.636,4.752l3.915-3.009V40.648a2.072,2.072,0,0,0,2.075,2.075h5.533a2.072,2.072,0,0,0,2.075-2.075V33.732h2.075A2.072,2.072,0,0,0,43.5,31.657V22.665a2.072,2.072,0,0,0-2.075-2.075Z" transform="translate(-2 -4.026)" fill="#35247e"/>
                </svg>
            </div>
            <h1 class="font-kanit">Teammates</h1>
        </div>
        <div class="idol-information-teammates">
            <div class="card-list-groups">
                <?php foreach($teammates as $teammate) : ?>
                <a href="idol_detail.php?group=<?= $group["slug"] ?>&idol=<?= $teammate["id_idol"] ?>">
                    <div class="card-group">
                        <div class="card-group-cover" style="background-image:url('<?= $teammate["photo"] ?>'); 
                        background-size:cover;background-position:center">
                            <div class="card-group-overlay"></div>
                        </div>
                        <div class="card-group-name"><?= $teammate["idol_name"] ?></div>
                    </div>
                </a>
                <?php endforeach; ?>

                
            </div>
        </div>
    </div>

</section>

<!-- 
<section class="card-base-info idol-news">
    <div class="card-base-info-title">
        <div class="card-base-info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="44.537" viewBox="0 0 56 44.537">
                <path id="a963ed0f8843a4f8c5415b2e9e2107da" d="M42.613,21.182a1.474,1.474,0,0,0-1.474-1.474H4.474A1.474,1.474,0,0,0,3,21.182V42.4a6.72,6.72,0,0,0,6.72,6.749H45.354a9.7,9.7,0,0,1-2.741-6.72ZM6.773,27.076A1.474,1.474,0,0,1,8.246,25.6H22.158a1.474,1.474,0,0,1,1.474,1.474V38.866a1.474,1.474,0,0,1-1.474,1.474H8.246a1.474,1.474,0,0,1-1.474-1.474ZM36.895,46.2H8.246a1.474,1.474,0,1,1,0-2.947H36.895a1.474,1.474,0,1,1,0,2.947Zm0-5.895H28.053a1.474,1.474,0,1,1,0-2.947h8.842a1.474,1.474,0,1,1,0,2.947Zm0-5.895H28.053a1.474,1.474,0,1,1,0-2.947h8.842a1.474,1.474,0,1,1,0,2.947Zm0-5.895H28.053a1.474,1.474,0,0,1,0-2.947h8.842a1.474,1.474,0,0,1,0,2.947ZM20.684,37.363H9.72V28.521H20.684ZM59,6.5l-.236,35.9a6.72,6.72,0,1,1-13.411,0l.206-24.257a1.474,1.474,0,0,0-1.474-1.474h-24.7V6.5A1.474,1.474,0,0,1,20.861,5.03H57.526A1.474,1.474,0,0,1,59,6.5Z" transform="translate(-3 -5.03)" fill="#35247e"/>
            </svg>
        </div>
        <h1 class="font-kanit">Group News</h1>
    </div>
    <div class="group-information-news">
        <div class="list-headline-news">
            <div class="list-headline-news-cover" style="background-image:url('https://kpopping.com/documents/27/4/2400/80216536_081.jpeg'); 
                        background-size:cover;background-position:center"></div>
            <div class="list-headline-news-detail">
                <div class="list-headline-news-title font-kanit">
                    GFRIEND Addresses Disbandment And Thanks Fans In Handwritten Letters
                </div>
                <div class="list-headline-news-info">
                    <div class="list-headline-news-uploader">
                        <div class="list-headline-news-uploader-profile"></div>
                        <div class="list-headline-news-uploader-name font-kanit">Jessica</div>
                    </div>
                    <div class="list-headline-news-date font-montserrat">October 23, 2023 12:11 PM</div>
                </div>
            </div>
        </div>
    </div>

</section> -->




    
<?php require_once("templates/main_end.php"); ?>