
<?php 
    $user = getUserData($_SESSION["email"]);
    $age = (date('Y') - date('Y',strtotime($user["birthday"]))); 
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

    
    <a href="profile.php">
        <span class="font-kanit">
            Profile
        </span>
    </a>

</section>


<section class="idol-header">
    <div class="idol-profile">
        <div class="idol-profile-photo" style="background-image:url('<?= BASEURL."/assets/images/users/".$user["photo"] ?>'); 
            background-size:cover;background-position:center"></div>
    </div>
    <div class="idol-bio user-profile-bio">
        <div class="idol-bio-header font-kanit">
            <h1><?= $user["username"] ?></h1>
            <a href="profile_edit.php" class="primary-btn font-kanit">Edit Profile</a>
        </div>
        <div class="idol-bio-detail-container">
            <div class="idol-bio-detail-left font-kanit">
                <span>Full Name</span>
                <span>Birthday</span>
                <span>Age</span>
            </div>
            <div class="idol-bio-detail-right font-montserrat">
                <span><?= $user["full_name"] ?></span>
                <span><?= $user["birthday"] ?></span>
                <span><?= $age ?></span>
            </div>
        </div>
        <div class="user-profile-logout">
            <form action="" method="post">
                <button class="primary-btn font-kanit" type="submit">Logout</button>
            </form>
        </div>
    </div>
</section>
