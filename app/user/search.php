<?php 
$title = "Search Content";
$page  = "search";
?>

<?php require_once("templates/main_start.php"); ?>
<style>
    #main-grid
    {
        background: rgb(53,36,126);
        background: linear-gradient(90deg, rgba(53,36,126,1) 10%, rgba(53,36,126,0) 100%); 
        background-color: rgba(53, 36, 126, 0.7);
        
    }
    #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
        z-index: -2;
        background-image:url('<?= BASEURL ?>/assets/images/search_bg.jpeg');
    }
</style>

<div id="myVideo"></div>
<section class="search-section">
    <div class="search-component">
        <div class="search-header">
            <div class="search-logo">
                <img src="<?= BASEURL ?>/assets/images/logo-light.png" alt="Logo" >
            </div>
            <h1 class="search-title font-kanit light-font">Search</h1>
        </div>
        <form action="search_result.php" method="get">
        <div class="search-bar">
            <input type="text" name="keyword" class="font-montserrat primary-font" placeholder="Search news, idols, group, or album...">
            <button type="submit" class="primary-btn">Search</button>
        </div>
        </form>
    </div>
</section>



    
<?php require_once("templates/main_end.php"); ?>