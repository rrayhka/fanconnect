<?php 
$title = "List Idols";
$page  = "home";
?>

<?php require_once("templates/main_start.php"); ?>
<?php

$idols  = getAllDataHighlightIdolsWithGroupSlugByCountry($_GET['country']);

?>
<button id="printButton">Print Table</button>

<script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>
<div class="card-list-idols">
    <?php foreach($idols as $idol) : ?>
    <a href="idol_detail.php?group=<?= $idol["slug"] ?>&idol=<?= $idol["id_idol"] ?>">
        <div class="card-idol">
            <div class="card-idol-cover" style="background-image:url('<?= $idol["photo"] ?>'); 
            background-size:cover;background-position:center"></div>
            <div class="card-idol-name font-kanit"><?= $idol["idol_name"] ?></div>
        </div>
    </a>

    <?php endforeach; ?>
</div>
    
<?php require_once("templates/main_end.php"); ?>