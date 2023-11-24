<?php 
$title = "List Groups";
$page  = "group";
?>

<?php require_once("templates/main_start.php"); ?>
<?php

$groups = getAllDataGroupsHighlightByGender($_GET["gender"]);
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
    
    <?php if($_GET["gender"] == 0) : ?>
    <a href="list_groups.php?gender=0">
        <span class="font-kanit">
            Girl Groups
        </span>
    </a>
    <?php elseif($_GET["gender"] == 1) : ?>
    <a href="list_groups.php?gender=1">
        <span class="font-kanit">
            Boy Groups
        </span>
    </a>
    <?php elseif($_GET["gender"] == 2) : ?>
    <a href="list_groups.php?gender=2">
        <span class="font-kanit">
            Mix Groups
        </span>
    </a>
    <?php endif; ?>
</section>

<div class="card-list-groups">
    <?php foreach($groups as $group) : ?>
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
    
<?php require_once("templates/main_end.php"); ?>