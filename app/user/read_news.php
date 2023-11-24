<?php 
$title = "Read News";
$page  = "news";
?>

<?php require_once("templates/main_start.php"); ?>
<?php

$news                 = getNewsByIdWithGroupInfoAndUploader($_GET["news"]);
$newsFavorites        = countFavoriteNewsById($_GET["news"]);

if(isset($_SESSION["login"]) && $_SESSION['login'] == true)
{
    $idFavNews = getFavoriteNewsByFavourite($_SESSION['email'], $_GET["news"] );
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST["status"] == "saved")
        {
            addFavouriteNews($_SESSION['email'], $_POST["id-news"]);
        }
        else
        {
            removeFavouriteNews($_SESSION['email'], $_POST["id-news"]);
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
    

    <a href="group_detail.php?group=<?= $news["slug"] ?>">
        <span class="font-kanit">
            <?= $news["group_name"] ?>
        </span>
    </a>

</section>


<section class="news-header">
    <div class="news-cover" style="background-image:url('<?= BASEURL."/assets/images/news/".$news["news_cover"] ?>'); 
            background-size:cover;background-position:center"></div>
    <div class="news-detail">
        <div class="news-title">
            <h1 class="font-kanit"><?= $news["news_title"] ?></h1>
        </div>
        <div class="news-sub-detail font-kanit primary-font">
            <div class="news-save">
            <?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) : ?>
                <form action="" method="post">
                    <input type="hidden" name="id-news" value="<?= $news["id_news"] ?>">
                <?php if($idFavNews != NULL) : ?>
                    <input type="hidden" name="status" value="not-saved">
                    <button class="primary-btn font-kanit">- Remove News</button>
                    
                <?php else : ?>
                    <input type="hidden" name="status" value="saved">
                    <button class="primary-btn font-kanit">+ Save News</button>

                <?php endif; ?>
                </form>
            <?php endif; ?>
            </div>
            <div class="news-info">
                <div class="list-headline-news-uploader">
                    <div class="list-headline-news-uploader-profile" style="background-image:url('<?= BASEURL."/assets/images/users/".$news["photo"] ?>'); 
                    background-size:cover;background-position:center"></div>
                    <div class="list-headline-news-uploader-name font-kanit"><?= $news["username"] ?></div>
                </div>
                <div class="news-date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path id="b42757605ac311d8a548ba3e32940d43" d="M19,4H17V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7a3,3,0,0,0-3-3Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12H20Zm0-9H4V7A1,1,0,0,1,5,6H7V7A1,1,0,0,0,9,7V6h6V7a1,1,0,0,0,2,0V6h2a1,1,0,0,1,1,1Z" transform="translate(-2 -2)" fill="#35247e"/>
                    </svg>

                    <?= date_format(date_create($news["news_date"]),"F d, Y")  ?>
                </div>
                <div class="news-read-count">
            
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.999" height="20" viewBox="0 0 15.999 20">
                        <path id="_685b655e86b308bd11b4113195c15f6c" data-name="685b655e86b308bd11b4113195c15f6c" d="M11.069,0c2.71,0,4.9,1.07,4.93,3.79h0V18.969a1.019,1.019,0,0,1-.74.99,1,1,0,0,1-.79-.1h0l-6.48-3.24L1.5,19.859a1.063,1.063,0,0,1-.49.13A1.016,1.016,0,0,1,0,18.969H0V3.79C0,1.07,2.2,0,4.9,0h6.17Zm.68,6.04H4.22a.79.79,0,0,0,0,1.58h7.53a.79.79,0,0,0,0-1.58Z" transform="translate(0 0)" fill="#35247e"/>
                    </svg>

                    <span><?= $newsFavorites ?></span>
    
                </div>
            </div>

        </div>

    </div>
</section>


<section class="card-base-info news-content">
    <div class="card-base-info-description font-montserrat">
        <?= html_entity_decode($news["news_content"]) ?>
    </div>
</section>




    
<?php require_once("templates/main_end.php"); ?>