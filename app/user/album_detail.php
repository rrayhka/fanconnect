<?php 
$title = "Album Detail";
$page  = "group";
?>

<?php require_once("templates/main_start.php"); ?>
<?php
$album  = getAlbumDetailById($_GET["album"]);
$songs  = getAllSongsByAlbum($_GET["album"]);
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
    

    <a href="group_detail.php?group=<?= $_GET["group"] ?>">
        <span class="font-kanit">
            <?= $album["group_name"] ?>
        </span>
    </a>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="30" viewBox="0 0 18 30">
        <path id="_54aec5deb03266394c2fc8af8ec2f2d0" data-name="54aec5deb03266394c2fc8af8ec2f2d0" d="M12,1,26,16,12,31,8,27,18,16,8,5Z" transform="translate(-8 -1)" fill="rgba(56,56,60,0.49)"/>
    </svg>
    

    <a href="album_detail.php?group=<?= $_GET["group"] ?>&album=<?= $album["id_album"] ?>">
        <span class="font-kanit">
            <?= $album["album_name"] ?>
        </span>
    </a>

</section>


<section class="idol-header">
    <div class="idol-profile">
        <div class="idol-profile-photo" style="background-image:url('<?= $album["album_cover"] ?>'); 
            background-size:cover;background-position:center"></div>
    </div>
    <div class="idol-bio">
        <div class="idol-bio-header font-kanit">
            <h1><?= $album["album_name"] ?></h1>
        </div>
        <div class="idol-bio-detail-container">
            <div class="idol-bio-detail-left font-kanit">
                <span>Release Date</span>
            </div>
            <div class="idol-bio-detail-right font-montserrat">
                <span><?= $album["release_date"] ?></span>
            </div>
        </div>
        
    </div>
</section>


<section class="album-songs">
    <div class="card-base-info">
        <div class="card-base-info-title">
            <div class="card-base-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56">
                    <g id="_4a54d237eb5670c06354d820c4b93d11" data-name="4a54d237eb5670c06354d820c4b93d11" transform="translate(-32 -32)">
                        <path id="Path_3" data-name="Path 3" d="M170.95,158.9a12.144,12.144,0,1,0,12.15,12.15A12.147,12.147,0,0,0,170.95,158.9Zm0,17.575a5.438,5.438,0,1,1,5.437-5.438A5.441,5.441,0,0,1,170.95,176.475Z" transform="translate(-110.95 -111.037)" fill="#35247e"/>
                        <path id="Path_4" data-name="Path 4" d="M60,32A28,28,0,1,0,88,60,28,28,0,0,0,60,32Zm0,43.35A15.35,15.35,0,1,1,75.35,60,15.353,15.353,0,0,1,60,75.35Z" fill="#35247e"/>
                    </g>
                </svg>
            </div>
            <h1 class="font-kanit">Songs</h1>
        </div>
        <div class="album-songs-list">
            <div class="table-list">
                <table>
                    <tr class="font-kanit">
                        <th>NO</th>
                        <th>SONG TITLE</th>
                        <th>MUSIC VIDEO</th>
                    </tr>
                    <?php foreach($songs as $song) : ?>
                    
                    <tr class="font-montserrat">
                        <td><?= $song["song_number"] ?></td>
                        <td><?= $song["song_name"] ?></td>
                        <td class="table-button-link">
                        <?php if($song["music_video"] != NULL) : ?>    
                            <a href="watch_mv.php?album=<?= $song["id_album"] ?>&song=<?= $song["id_song"] ?>" class="primary-btn">Watch</a>
                        <?php endif; ?>    
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>


    
</section>






    
<?php require_once("templates/main_end.php"); ?>