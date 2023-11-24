<?php

require_once("base.php"); 
require_once("database.php");

function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}


function validateEmail($data)
{
    if(getUserData($data['email']) == NULL)
    {
        return false;
    }
    else
    {
        return true;
    }
    
}
function validatePassword($data)
{
    $user = getUserData($data['email']);
    $passwordCheck = password_verify($data['password'], $user["password"]);
    if($passwordCheck)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}



function register($data)
{
    if(InsertUser($data) && InsertFavoriteIdolHByEmail($data['email']) && InsertFavoriteGroupHByEmail($data['email']) && InsertFavoriteNewsHByEmail($data['email']))
    {
        $_SESSION["email"] = $_POST['email'] ; 
        $_SESSION["login"] = true ;
        unset($_POST);
        header("Location: ".BASEURL."/app/user");
        exit;
    }

}
function logout()
{
    session_destroy();
    setcookie('email','', time()-99999);  
    setcookie('key', '',time()-99999);  
    header("Location: ".BASEURL."/app/user/");
    exit;
}

function changePhoto($email, $photoFile)
{
    $userData = getUserDataHighlight($email);
    $image_file = $photoFile;

    if (!isset($image_file)) {
        die('No file uploaded.');
    }

    if (filesize($image_file["tmp_name"]) <= 0) {
        die('Uploaded file has no contents.');
    }

    $image_type = exif_imagetype($image_file["tmp_name"]);
    if (!$image_type) {
        die('Uploaded file is not an image.');
    }

    $image_extension = image_type_to_extension($image_type, true);

    $photoName = $userData['username'] . $image_extension;
    if($userData['photo'] != "default.png")
    {
        unlink(BASEPATH."/assets/images/users/".$userData['photo']);
    }

    move_uploaded_file(
        $image_file["tmp_name"],
        BASEPATH."/assets/images/users/".$photoName
    );

    editUserPhoto($email, $photoName);
}


function getNewsCover($idNews, $photoFile, $nowPhoto)
{   
    $image_file = $photoFile;


    $nowPhoto = ($nowPhoto == 'default.png') ? $nowPhoto ="default.png" : $nowPhoto;

    if ($image_file['error'] == 4) 
    {
        return $nowPhoto;
    }
    else
    {
        $image_type = exif_imagetype($image_file["tmp_name"]);
        if (filesize($image_file["tmp_name"]) <= 0) {
            return $nowPhoto;
        }
        elseif (!$image_type) {
            return $nowPhoto;
        }
        else
        {
            $image_extension = image_type_to_extension($image_type, true);
    
            $coverName = $idNews . $image_extension;
        
        
            move_uploaded_file(
                $image_file["tmp_name"],
                BASEPATH."/assets/images/news/".$coverName
            );
    
        
            return $coverName;
        }
    
    }


    
}