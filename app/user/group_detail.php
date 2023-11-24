<?php 
$title = "Group Detail";
$page  = "group";
?>

<?php require_once("templates/main_start.php"); ?>
<?php

$group                = getGroupDetailBySlug($_GET["group"]);
$members              = getDataIdolsByGroup($group["id_group"]);
$groupsRecommendation = getAllDataGroupsHighlightByLimitAndNotSelf(4, $group["id_group"]);
$albums               = getAllAlbumsByGroup($group["id_group"]);

if(isset($_SESSION["login"]) && $_SESSION['login'] == true)
{
    $idFavIdol = getFavoriteGroupsByFavourite($_SESSION['email'], $group["id_group"] );
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST["status"] == "saved")
        {
            addFavouriteGroup($_SESSION['email'], $_POST["id-group"]);
        }
        else
        {
            removeFavouriteGroup($_SESSION['email'], $_POST["id-group"]);
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

</section>


<section class="group-header">
    <div class="group-cover" style="background-image:url('<?= $group["group_cover"] ?>'); 
            background-size:cover;background-position:center"></div>
    <div class="group-detail">
        <div class="group-title">
            <h1 class="font-kanit"><?= $group["group_name"] ?></h1>
            <?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) : ?>
                <form action="" method="post">
                    <input type="hidden" name="id-group" value="<?= $group["id_group"] ?>">
                <?php if($idFavIdol != NULL) : ?>
                    <input type="hidden" name="status" value="not-saved">
                    <button class="primary-btn font-kanit">- Remove Group</button>
                    
                <?php else : ?>
                    <input type="hidden" name="status" value="saved">
                    <button class="primary-btn font-kanit">+ Save Group</button>

                <?php endif; ?>
            <?php endif; ?>
            </form>
        </div>
        <div class="group-members">
            <?php foreach($members as $member) : ?>
                <a href="idol_detail.php?group=<?= $group["slug"] ?>&idol=<?= $member["id_idol"] ?>">
                    <div class="card-group-idol">
                        <div class="card-group-idol-cover" style="background-image:url('<?= $member["photo"] ?>'); 
                        background-size:cover;background-position:center"></div>
                        <div class="card-group-idol-name font-kanit"><?= $member["idol_name"] ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<section class="card-base-info group-information">
    <div class="card-base-info-title">
        <div class="card-base-info-icon">
            <svg id="ebc174772a2b4ce7eb4575abf3c5430c" xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56">
                <path id="Path_1" data-name="Path 1" d="M0,0H56V56H0Z" fill="none"/>
                <path id="Path_2" data-name="Path 2" d="M25.333,2A23.333,23.333,0,1,0,48.667,25.333,23.342,23.342,0,0,0,25.333,2Zm0,35A2.34,2.34,0,0,1,23,34.667V25.333a2.333,2.333,0,1,1,4.667,0v9.333A2.34,2.34,0,0,1,25.333,37Zm2.333-18.667H23V13.667h4.667Z" transform="translate(2.667 2.667)" fill="#35247e"/>
            </svg>
        </div>
        <h1 class="font-kanit">Information</h1>
    </div>
    <p class="card-base-info-description font-montserrat">
        <?= $group["information"] ?>
    </p>
</section>


<section class="card-base-info group-discography">
    <div class="card-base-info-title">
        <div class="card-base-info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56">
                <g id="_4a54d237eb5670c06354d820c4b93d11" data-name="4a54d237eb5670c06354d820c4b93d11" transform="translate(-32 -32)">
                    <path id="Path_3" data-name="Path 3" d="M170.95,158.9a12.144,12.144,0,1,0,12.15,12.15A12.147,12.147,0,0,0,170.95,158.9Zm0,17.575a5.438,5.438,0,1,1,5.437-5.438A5.441,5.441,0,0,1,170.95,176.475Z" transform="translate(-110.95 -111.037)" fill="#35247e"/>
                    <path id="Path_4" data-name="Path 4" d="M60,32A28,28,0,1,0,88,60,28,28,0,0,0,60,32Zm0,43.35A15.35,15.35,0,1,1,75.35,60,15.353,15.353,0,0,1,60,75.35Z" fill="#35247e"/>
                </g>
            </svg>
        </div>
        <h1 class="font-kanit">Discography</h1>
    </div>
    <div class="group-albums">

        <?php foreach($albums as $album) : ?>
        <a href="album_detail.php?group=<?= $group["slug"] ?>&album=<?= $album["id_album"] ?>">
            <div class="album-group">
                <div class="album-group-cover">
                    <img src="<?= $album["album_cover"] ?>" alt="Warplugis">
                </div>
                
                <div class="album-group-title font-kanit">
                    <?= $album["album_name"] ?>
                </div>
                <div class="album-group-year font-montserrat">
                    <?= date("Y",strtotime($album["release_date"])) ?>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
        
        
    </div>
</section>


<section class="group-recommendation">
    <h1 class="heading font-kanit">Recommendation</h1>

    <div class="card-list-groups">
        <?php foreach($groupsRecommendation as $group) : ?>
        <a href="group_detail.php?group=<?= $group["slug"] ?>">
            <div class="card-group">
                <div class="card-group-cover" style="background-image:url('<?= $group["group_cover"] ?>'); 
                background-size:cover;background-position:center">
                    <div class="card-group-overlay"></div>
                </div>
                <div class="card-group-name"><?= $group["group_name"] ?></div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</section>

    
<?php require_once("templates/main_end.php"); ?>