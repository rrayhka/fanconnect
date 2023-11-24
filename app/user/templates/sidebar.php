

<div class="sidebar-container primary-bg">

    <div class="sidebar-logo">
        <img src="<?= BASEURL ?>/assets/images/logo-light.png" alt="Logo Admin" >
    </div>

    <div class="sidebar-menu">
        <?php if($page == "home") : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/">
                <svg xmlns="http://www.w3.org/2000/svg" width="44.43" height="46.769" viewBox="0 0 44.43 46.769">
                    <path id="_2ae66759f9bda47bb5a4c88130dd24db" data-name="2ae66759f9bda47bb5a4c88130dd24db" d="M15.515,43.9V36.75a3.317,3.317,0,0,1,3.329-3.3h6.721a3.341,3.341,0,0,1,2.354.968,3.292,3.292,0,0,1,.975,2.337V43.9a2.837,2.837,0,0,0,.833,2.027,2.879,2.879,0,0,0,2.036.841h4.585a8.093,8.093,0,0,0,5.714-2.337,7.973,7.973,0,0,0,2.368-5.666V18.4a5.782,5.782,0,0,0-2.094-4.448L26.738,1.58a7.243,7.243,0,0,0-9.234.166L2.261,13.948A5.785,5.785,0,0,0,0,18.4V38.745a8.053,8.053,0,0,0,8.082,8.023h4.481a2.879,2.879,0,0,0,2.889-2.848Z" fill="#f3f4fd"/>
                </svg>
            </a>
        </nav>

        <?php else : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/">
                <svg xmlns="http://www.w3.org/2000/svg" width="45.43" height="47.769" viewBox="0 0 45.43 47.769">
                    <path id="_2ae66759f9bda47bb5a4c88130dd24db" data-name="2ae66759f9bda47bb5a4c88130dd24db" d="M15.515,43.9V36.75a3.317,3.317,0,0,1,3.329-3.3h6.721a3.341,3.341,0,0,1,2.354.968,3.292,3.292,0,0,1,.975,2.337V43.9a2.837,2.837,0,0,0,.833,2.027,2.879,2.879,0,0,0,2.036.841h4.585a8.093,8.093,0,0,0,5.714-2.337,7.973,7.973,0,0,0,2.368-5.666V18.4a5.782,5.782,0,0,0-2.094-4.448L26.738,1.58a7.243,7.243,0,0,0-9.234.166L2.261,13.948A5.785,5.785,0,0,0,0,18.4V38.745a8.053,8.053,0,0,0,8.082,8.023h4.481a2.879,2.879,0,0,0,2.889-2.848Z" transform="translate(0.5 0.5)" fill="none" stroke="#f3f4fd" stroke-width="1"/>
                </svg>
            </a>
        </nav>

        <?php endif; ?>




        <?php if($page == "group") : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/groups.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="52.067" height="38.487" viewBox="0 0 52.067 38.487">
                    <path id="_672ff0e75e6fc462b10e7e4053066b8e" data-name="672ff0e75e6fc462b10e7e4053066b8e" d="M26.534,26.638a11.319,11.319,0,1,0-8-3.316,11.285,11.285,0,0,0,8,3.316ZM44.644,28.9a5.65,5.65,0,1,0-4-1.655A5.648,5.648,0,0,0,44.644,28.9Zm0,1.336a9.458,9.458,0,0,0-6.6,2.191C35.516,30.353,31.525,28.9,26.534,28.9c-5.13,0-9.044,1.467-11.527,3.541a9.545,9.545,0,0,0-6.583-2.2C3.47,30.237.5,32.7.5,35.177c0,1.234,2.97,2.472,7.923,2.472a21.7,21.7,0,0,0,3.674-.3l-.091.611c0,2.264,5.447,4.528,14.527,4.528,8.516,0,14.527-2.264,14.527-4.528l-.045-.577a23.3,23.3,0,0,0,3.629.267c4.643,0,7.923-1.238,7.923-2.472,0-2.472-3.108-4.94-7.923-4.94ZM8.423,28.9a5.648,5.648,0,1,0-4.005-1.654A5.641,5.641,0,0,0,8.423,28.9Z" transform="translate(-0.5 -4)" fill="#f3f4fd"/>
                </svg>
            </a>
        </nav>

        <?php else : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/groups.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="53.067" height="39.487" viewBox="0 0 53.067 39.487">
                    <path id="_672ff0e75e6fc462b10e7e4053066b8e" data-name="672ff0e75e6fc462b10e7e4053066b8e" d="M26.534,26.638a11.319,11.319,0,1,0-8-3.316,11.285,11.285,0,0,0,8,3.316ZM44.644,28.9a5.65,5.65,0,1,0-4-1.655A5.648,5.648,0,0,0,44.644,28.9Zm0,1.336a9.458,9.458,0,0,0-6.6,2.191C35.516,30.353,31.525,28.9,26.534,28.9c-5.13,0-9.044,1.467-11.527,3.541a9.545,9.545,0,0,0-6.583-2.2C3.47,30.237.5,32.7.5,35.177c0,1.234,2.97,2.472,7.923,2.472a21.7,21.7,0,0,0,3.674-.3l-.091.611c0,2.264,5.447,4.528,14.527,4.528,8.516,0,14.527-2.264,14.527-4.528l-.045-.577a23.3,23.3,0,0,0,3.629.267c4.643,0,7.923-1.238,7.923-2.472,0-2.472-3.108-4.94-7.923-4.94ZM8.423,28.9a5.648,5.648,0,1,0-4.005-1.654A5.641,5.641,0,0,0,8.423,28.9Z" transform="translate(0 -3.5)" fill="none" stroke="#f3f4fd" stroke-width="1"/>
                </svg>
            </a>
        </nav>

        <?php endif; ?>



        
        <?php if($page == "news") : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/news.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="57.612" height="45.819" viewBox="0 0 57.612 45.819">
                    <path id="a963ed0f8843a4f8c5415b2e9e2107da" d="M43.753,21.646a1.516,1.516,0,0,0-1.516-1.516H4.516A1.516,1.516,0,0,0,3,21.646V43.478a6.913,6.913,0,0,0,6.913,6.944H46.573a9.976,9.976,0,0,1-2.82-6.913ZM6.881,27.711A1.516,1.516,0,0,1,8.4,26.195H22.709a1.516,1.516,0,0,1,1.516,1.516V39.84a1.516,1.516,0,0,1-1.516,1.516H8.4A1.516,1.516,0,0,1,6.881,39.84ZM37.87,47.39H8.4a1.516,1.516,0,1,1,0-3.032H37.87a1.516,1.516,0,1,1,0,3.032Zm0-6.064h-9.1a1.516,1.516,0,1,1,0-3.032h9.1a1.516,1.516,0,1,1,0,3.032Zm0-6.064h-9.1a1.516,1.516,0,1,1,0-3.032h9.1a1.516,1.516,0,1,1,0,3.032Zm0-6.064h-9.1a1.516,1.516,0,1,1,0-3.032h9.1a1.516,1.516,0,1,1,0,3.032Zm-16.677,9.1H9.913V29.2h11.28ZM60.612,6.546l-.243,36.932a6.913,6.913,0,1,1-13.8,0l.212-24.955a1.516,1.516,0,0,0-1.516-1.516H19.859V6.546A1.516,1.516,0,0,1,21.375,5.03H59.1A1.516,1.516,0,0,1,60.612,6.546Z" transform="translate(-3 -5.03)" fill="#f3f4fd"/>
                </svg>
            </a>
        </nav>

        <?php else : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/news.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="58.612" height="46.911" viewBox="0 0 58.612 46.911">
                    <path id="a963ed0f8843a4f8c5415b2e9e2107da" d="M43.753,21.646a1.516,1.516,0,0,0-1.516-1.516H4.516A1.516,1.516,0,0,0,3,21.646V43.478a6.913,6.913,0,0,0,6.913,6.944H46.573a9.976,9.976,0,0,1-2.82-6.913ZM6.881,27.711A1.516,1.516,0,0,1,8.4,26.195H22.709a1.516,1.516,0,0,1,1.516,1.516V39.84a1.516,1.516,0,0,1-1.516,1.516H8.4A1.516,1.516,0,0,1,6.881,39.84ZM37.87,47.39H8.4a1.516,1.516,0,1,1,0-3.032H37.87a1.516,1.516,0,1,1,0,3.032Zm0-6.064h-9.1a1.516,1.516,0,1,1,0-3.032h9.1a1.516,1.516,0,1,1,0,3.032Zm0-6.064h-9.1a1.516,1.516,0,1,1,0-3.032h9.1a1.516,1.516,0,1,1,0,3.032Zm0-6.064h-9.1a1.516,1.516,0,1,1,0-3.032h9.1a1.516,1.516,0,1,1,0,3.032Zm-16.677,9.1H9.913V29.2h11.28ZM60.612,6.546l-.243,36.932a6.913,6.913,0,1,1-13.8,0l.212-24.955a1.516,1.516,0,0,0-1.516-1.516H19.859V6.546A1.516,1.516,0,0,1,21.375,5.03H59.1A1.516,1.516,0,0,1,60.612,6.546Z" transform="translate(-2.5 -4.53)" fill="none" stroke="#f3f4fd" stroke-width="1"/>
                </svg>
            </a>
        </nav>

        <?php endif; ?>


        <?php if($page == "search") : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/search.php">
                <svg id="c63f9fc6a2d566c245f7248aa3d44b57" xmlns="http://www.w3.org/2000/svg" width="61.431" height="61.431" viewBox="0 0 61.431 61.431">
                    <path id="Path_27" data-name="Path 27" d="M0,0H61.431V61.431H0Z" fill="none"/>
                    <path id="Path_28" data-name="Path 28" d="M44.306,39.349H41.7l-.925-.892a21.539,21.539,0,1,0-2.313,2.313l.892.925v2.61L53.393,58.35a3.481,3.481,0,1,0,4.923-4.924Zm-19.826,0a14.87,14.87,0,1,1,14.87-14.87A14.85,14.85,0,0,1,24.48,39.349Z" transform="translate(2.098 2.065)" fill="#f3f4fd"/>
                </svg>
            </a>
        </nav>

        <?php else : ?>
        <nav>
            <a href="<?= BASEURL ?>/app/user/search.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="57.357" height="57.391" viewBox="0 0 57.357 57.391">
                    <path id="Path_29" data-name="Path 29" d="M44.306,39.349H41.7l-.925-.892a21.539,21.539,0,1,0-2.313,2.313l.892.925v2.61L53.393,58.35a3.481,3.481,0,1,0,4.923-4.924Zm-19.826,0a14.87,14.87,0,1,1,14.87-14.87A14.85,14.85,0,0,1,24.48,39.349Z" transform="translate(-2.475 -2.475)" fill="none" stroke="#f3f4fd" stroke-width="1"/>
                </svg>
            </a>
        </nav>

        <?php endif; ?>
        
    </div>

    <div class="sidebar-profile">
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) : 
            $profile = getUserDataHighlight($_SESSION['email']);
            ?>
        <a href="<?= BASEURL ?>/app/user/profile.php">
            <div class="sidebar-profile-image" style="background-image:url('<?= BASEURL."/assets/images/users/".$profile["photo"] ?>'); background-size:cover;"></div>
        </a>
        <?php else : ?>
        <a href="<?= BASEURL ?>/app/user/login.php">
            <div class="sidebar-profile-image" style="background-image:url('<?= BASEURL."/assets/images/users/default.png" ?>'); background-size:cover;"></div>
        </a>
        <?php endif ?>
        
    </div>

</div>