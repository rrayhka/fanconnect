<?php 
$title = "Add News";
$page  = "profile";
?>

<?php require_once("templates/main_start.php"); ?>
<?php

if(!isset($_SESSION["login"]) && $_SESSION['login'] == false)
{
    header("Location: ".BASEURL."/app/user/login.php");
    exit;
}
$groups = getAllGroupsNameAndId();


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    insertNews($_POST, $_SESSION['email']);
    unset($_POST);
    header("Location: profile_manage_news.php");
    exit;

}

?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<section class="user-favourites">
    

    <div class="card-base-info card-favourites-content">
        <div class="card-base-info-title">
            <div class="card-base-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="51.778" height="48.393" viewBox="0 0 51.778 48.393">
                    <g id="_99043939911f49a9fb1b0522f06c1e54" data-name="99043939911f49a9fb1b0522f06c1e54" transform="translate(-0.5 -1.5)">
                        <path id="Path_20" data-name="Path 20" d="M7.231,39.774A4.237,4.237,0,0,1,3,35.543v-23.7A.846.846,0,0,1,3.846,11H7.231a.846.846,0,0,1,0,1.693H4.693v22.85a2.542,2.542,0,0,0,2.539,2.539.846.846,0,0,1,0,1.693Z" transform="translate(1.385 6.233)" fill="#35247e" stroke="#35247e" stroke-width="1"/>
                        <path id="Path_21" data-name="Path 21" d="M5.846,45.315a.846.846,0,1,1,0-1.693,2.542,2.542,0,0,0,2.539-2.539V3.846a.846.846,0,0,1,1.693,0V41.083A4.236,4.236,0,0,1,5.846,45.315Z" transform="translate(2.77 0.693)" fill="#35247e" stroke="#35247e" stroke-width="1"/>
                        <path id="Path_22" data-name="Path 22" d="M8.617,42.467A7.625,7.625,0,0,1,1,34.85v-22a.846.846,0,1,1,1.693,0v22a5.931,5.931,0,0,0,5.924,5.924.846.846,0,0,1,0,1.693Z" transform="translate(0 6.926)" fill="#35247e" stroke="#35247e" stroke-width="1"/>
                        <path id="Path_23" data-name="Path 23" d="M41.391,49.393H5.846a.846.846,0,1,1,0-1.693,5.931,5.931,0,0,0,5.924-5.924V2.846A.846.846,0,0,1,12.617,2H48.161a.846.846,0,0,1,.846.846v38.93A7.626,7.626,0,0,1,41.391,49.393ZM10.63,47.7H41.391a5.931,5.931,0,0,0,5.924-5.924V3.693H13.463V41.776A7.609,7.609,0,0,1,10.629,47.7Z" transform="translate(2.77)" fill="#35247e" stroke="#35247e" stroke-width="1"/>
                        <path id="Path_24" data-name="Path 24" d="M25.383,13.473a.846.846,0,0,1-.792-.548l-2.539-6.77a.846.846,0,1,1,1.584-.6l1.5,4,.774-3.866a.846.846,0,1,1,1.659.333l-1.356,6.77A.843.843,0,0,1,25.383,13.473Z" transform="translate(14.543 2.068)" fill="#35247e" stroke="#35247e" stroke-width="1"/>
                        <path id="Path_25" data-name="Path 25" d="M27.923,13.463l-.069,0a.846.846,0,0,1-.762-.677l-1.349-6.77a.846.846,0,1,1,1.66-.33l.768,3.859,1.5-3.991a.846.846,0,0,1,1.584.6l-2.539,6.77a.843.843,0,0,1-.79.547Zm-11,0a.846.846,0,0,1-.7-.374l-3.529-5.23v4.758a.846.846,0,1,1-1.693,0V5.846A.846.846,0,0,1,11.846,5h.509a.851.851,0,0,1,.7.374l3.02,4.475v-4a.846.846,0,0,1,1.693,0v6.77a.85.85,0,0,1-.846.846Zm6.77,0H20.309a.846.846,0,0,1-.846-.846V5.846A.846.846,0,0,1,20.309,5h3.385a.846.846,0,0,1,0,1.693H21.156V11.77h2.539a.846.846,0,0,1,0,1.693Z" transform="translate(6.926 2.078)" fill="#35247e" stroke="#35247e" stroke-width="1"/>
                        <path id="Path_26" data-name="Path 26" d="M22.156,10.078H19.617a.846.846,0,1,1,0-1.693h2.539a.846.846,0,1,1,0,1.693Zm16.08,3.385a3.212,3.212,0,0,1-3.069-2.124.846.846,0,1,1,1.576-.618,1.524,1.524,0,0,0,1.493,1.049.941.941,0,0,0,.9-.965c0-.335-.291-.53-1.165-.939A4.769,4.769,0,0,1,36.333,8.8a2.372,2.372,0,0,1-.4-2.5A2.322,2.322,0,0,1,38.176,5a2.911,2.911,0,0,1,2.148.85.847.847,0,0,1-1.253,1.139,1.305,1.305,0,0,0-.9-.3c-.259,0-.591.052-.706.306a.674.674,0,0,0,.134.686,3.605,3.605,0,0,0,1.082.65c.9.425,2.138,1,2.138,2.471A2.63,2.63,0,0,1,38.235,13.463Zm0,27.081H28.08a.846.846,0,1,1,0-1.693H38.235a.846.846,0,0,1,0,1.693ZM23,40.544H12.846a.846.846,0,1,1,0-1.693H23a.846.846,0,0,1,0,1.693Zm15.233-3.385H28.08a.846.846,0,1,1,0-1.693H38.235a.846.846,0,1,1,0,1.693ZM23,37.159H12.846a.846.846,0,1,1,0-1.693H23a.846.846,0,1,1,0,1.693Zm15.233-3.385H28.08a.846.846,0,1,1,0-1.693H38.235a.846.846,0,0,1,0,1.693ZM23,33.774H12.846a.846.846,0,0,1,0-1.693H23a.846.846,0,0,1,0,1.693Zm15.233-3.385H28.08a.846.846,0,1,1,0-1.693H38.235a.846.846,0,0,1,0,1.693ZM23,30.389H12.846a.846.846,0,1,1,0-1.693H23a.846.846,0,0,1,0,1.693ZM38.235,27H28.08a.846.846,0,1,1,0-1.693H38.235a.846.846,0,0,1,0,1.693ZM23,27H12.846a.846.846,0,1,1,0-1.693H23A.846.846,0,0,1,23,27Zm15.233-3.385H28.08a.846.846,0,1,1,0-1.693H38.235a.846.846,0,0,1,0,1.693ZM23,23.619H12.846a.846.846,0,1,1,0-1.693H23a.846.846,0,0,1,0,1.693Zm15.233-3.385H28.08a.846.846,0,1,1,0-1.693H38.235a.846.846,0,0,1,0,1.693ZM23,20.233H12.846a.846.846,0,1,1,0-1.693H23a.846.846,0,0,1,0,1.693Z" transform="translate(7.619 2.078)" fill="#35247e" stroke="#35247e" stroke-width="1"/>
                    </g>
                </svg>

            </div>
            <h1 class="font-kanit">Content</h1>
        </div>
        <div class="group-information-news">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="auth-body">
                <div class="profile-edit-input">
                    <div class="form-input">
                        <span class="font-kanit">News Title</span>
                        <input type="text" class="font-montserrat" name="news_title" placeholder="News Title" required>
                    </div>
                    <div class="form-input">
                        <span class="font-kanit">Group</span>
                        <select name="id_group">
                            <?php foreach($groups as $group) : ?>
                            <option value="<?= $group["id_group"] ?>"><?= $group["group_name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    
                    <div id="editor">
                        <p>Write your content</p>
                    </div>

                    

                    <input type="hidden" name="news_content" id="news-content">
                    <button type="submit" class="primary-btn font-kanit">Save News</button>
                    
                </div>
            </div>
            </form>


        </div>
    </div>

</section>
<script>
    let newsContent = document.querySelector( '#news-content');
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            toolbar: [ 'undo', 'redo','heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        }).then( newEditor => {
            
            editor = newEditor;
            ['click','keyup'].forEach( function(evt) {
                this.addEventListener(evt, () => {
                    const editorData = editor.getData();
                    newsContent.value = editorData;
                    console.log(newsContent.value);
                }, false);
            });
        } )
        .catch( error => {
            console.error( error );
        } );

 
</script>

    
<?php require_once("templates/main_end.php"); ?>