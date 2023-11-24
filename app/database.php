<?php

require_once("base.php"); 


///// ======================== IDOL MODEL ======================== /////
function getAllDataIdols() 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM idols")->fetch_all(MYSQLI_ASSOC);
}
function getAllDataHighlightIdolsWithGroupSlug() 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_idol,idol_name, photo,slug
    FROM idols 
    INNER JOIN groups 
    ON idols.id_group = groups.id_group  ")->fetch_all(MYSQLI_ASSOC);
}
function getAllDataHighlightIdolsWithGroupSlugByCountry($country) 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_idol,idol_name, photo,slug
    FROM idols 
    INNER JOIN groups 
    ON idols.id_group = groups.id_group 
    WHERE idols.slug_country='$country' ")->fetch_all(MYSQLI_ASSOC);
}
function getDataIdolsByGender($kodeKategori) 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM idols WHERE gender = 0")->fetch_all(MYSQLI_ASSOC);
}
function getDataIdolsByGroup($groupId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM idols WHERE id_group = '$groupId' ")->fetch_all(MYSQLI_ASSOC);
}
function getDataIdolsById($idolId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM idols WHERE id_idol = '$idolId' ")->fetch_assoc();
}
function getDataHighlightIdolsByGroupAndNotSelf($idolId, $groupId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_idol, idol_name, photo 
    FROM idols 
    WHERE id_group = '$groupId' AND id_idol != '$idolId'  ")->fetch_all(MYSQLI_ASSOC);
}


///// ======================== GROUP MODEL ======================== /////
function getAllDataGroups() 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM groups")->fetch_all(MYSQLI_ASSOC);
}
function getAllDataGroupsHighlight() 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_group, slug, group_name, group_cover FROM groups")->fetch_all(MYSQLI_ASSOC);
}
function getAllDataGroupsHighlightByGender($gender) 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_group, slug, group_name, group_cover 
    FROM groups
    WHERE group_gender=$gender")->fetch_all(MYSQLI_ASSOC);
}
function getAllDataGroupsHighlightByLimit($limit) 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_group, slug, group_name, group_cover FROM groups LIMIT $limit")->fetch_all(MYSQLI_ASSOC);
}
function getDataGroupsHighlightByLimit($limit) 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_group, slug, group_name, group_cover FROM groups LIMIT $limit")->fetch_all(MYSQLI_ASSOC);
}
function getAllDataGroupsHighlightByLimitAndNotSelf($limit, $groupId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_group, slug, group_name, group_cover 
    FROM groups 
    WHERE id_group != '$groupId' LIMIT $limit ")->fetch_all(MYSQLI_ASSOC);
}


function getGroupDetailBySlug($slug) 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM groups WHERE slug ='$slug'")->fetch_assoc();
}
function getGroupHighlightBySlug($slug) 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_group, slug, group_name, group_cover FROM groups WHERE slug ='$slug'")->fetch_assoc();
}
function getAllGroupsNameAndId() 
{
    return mysqli_query($GLOBALS["db"],"SELECT id_group, group_name FROM groups")->fetch_all(MYSQLI_ASSOC);
}




///// ======================== ALBUM MODEL ======================== /////
function getAllAlbumsByGroup($groupId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM albums WHERE id_group='$groupId' ")->fetch_all(MYSQLI_ASSOC);
}
function getAlbumDetailById($albumId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT al.album_name, gp.group_name, al.release_date, al.album_cover, al.id_album
    FROM albums as al 
    INNER JOIN groups as gp ON al.id_group = gp.id_group
    WHERE id_album='$albumId' ")->fetch_assoc();
}

///// ======================== SONG MODEL ======================== /////
function getAllSongsByAlbum($albumId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM songs WHERE id_album='$albumId' ")->fetch_all(MYSQLI_ASSOC);
}
function getSongDetailById($songId) 
{
    return mysqli_query($GLOBALS["db"],"SELECT sg.song_name, sg.id_song, sg.id_album, gp.group_name, al.album_name, gp.slug, sg.music_video
    FROM songs as sg
    INNER JOIN albums as al ON al.id_album = sg.id_album
    INNER JOIN groups as gp ON al.id_group = gp.id_group
    WHERE sg.id_song='$songId' ")->fetch_assoc();
}




///// ======================== FAVORITE MODEL ======================== /////
function InsertFavoriteIdolHByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"INSERT INTO favorite_idols_h (email)
    VALUES ( '$email' )");
}
function InsertFavoriteGroupHByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"INSERT INTO favorite_groups_h (email)
    VALUES ( '$email' )");
}
function InsertFavoriteNewsHByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"INSERT INTO favorite_news_h (email)
    VALUES ( '$email' )");
}
function getAllFavoriteIdolsByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT idl.idol_name, idl.photo, idl.id_idol, grp.slug
    FROM favorite_idols_d  as fid
    INNER JOIN idols as idl ON fid.id_idol = idl.id_idol
    INNER JOIN groups as grp ON grp.id_group = idl.id_group
    WHERE id_favorite IN (SELECT id_favorite FROM favorite_idols_h WHERE email='$email') ")->fetch_all(MYSQLI_ASSOC);
}
function getFavoriteIdolsByFavourite($email, $idIdol)
{
    return mysqli_query($GLOBALS["db"],"SELECT idl.id_idol
    FROM favorite_idols_d  as fid
    INNER JOIN idols as idl ON fid.id_idol = idl.id_idol
    INNER JOIN groups as grp ON grp.id_group = idl.id_group
    WHERE id_favorite IN (SELECT id_favorite FROM favorite_idols_h WHERE email='$email') AND fid.id_idol='$idIdol' ")->fetch_assoc();
}

function addFavouriteIdol($email, $idIdol)
{
    return mysqli_query($GLOBALS["db"],"INSERT INTO favorite_idols_d (id_favorite, id_idol)
    VALUES ( (SELECT id_favorite FROM favorite_idols_h WHERE email='$email') , '$idIdol' )");
}
function removeFavouriteIdol($email, $idIdol)
{
    return mysqli_query($GLOBALS["db"],"DELETE FROM favorite_idols_d 
    WHERE id_favorite = (SELECT id_favorite FROM favorite_idols_h WHERE email='$email') AND id_idol = '$idIdol' ");
}



function getAllFavoriteGroupsByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT grp.group_name, grp.group_cover, grp.slug
    FROM favorite_groups_d  as fgd
    INNER JOIN groups as grp ON grp.id_group = fgd.id_group
    WHERE id_favorite IN (SELECT id_favorite FROM favorite_groups_h WHERE email='$email') ")->fetch_all(MYSQLI_ASSOC);
}
function getFavoriteGroupsByFavourite($email, $idGroup)
{
    return mysqli_query($GLOBALS["db"],"SELECT grp.id_group
    FROM favorite_groups_d  as fgd
    INNER JOIN groups as grp ON grp.id_group = fgd.id_group
    WHERE id_favorite IN (SELECT id_favorite FROM favorite_groups_h WHERE email='$email') AND fgd.id_group='$idGroup' ")->fetch_assoc();
}

function addFavouriteGroup($email, $idGroup)
{
    return mysqli_query($GLOBALS["db"],"INSERT INTO favorite_groups_d (id_favorite, id_group)
    VALUES ( (SELECT id_favorite FROM favorite_groups_h WHERE email='$email') , '$idGroup' )");
}
function removeFavouriteGroup($email, $idGroup)
{
    return mysqli_query($GLOBALS["db"],"DELETE FROM favorite_groups_d 
    WHERE id_favorite = (SELECT id_favorite FROM favorite_groups_h WHERE email='$email') AND id_group = '$idGroup' ");
}



function getAllFavoriteNewsByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.id_news, nw.news_title, nw.news_cover, nw.news_date
    FROM favorite_news_d as fnd
    INNER JOIN news as nw ON nw.id_news = fnd.id_news
    WHERE id_favorite IN (SELECT id_favorite FROM favorite_news_h WHERE email='$email') ")->fetch_all(MYSQLI_ASSOC);
}
function getAllFavoriteNewsWithUploaderByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.id_news, nw.news_title, nw.news_cover, nw.news_date, us.photo, us.username 
    FROM favorite_news_d as fnd
    INNER JOIN news as nw ON nw.id_news = fnd.id_news
    INNER JOIN users as us on nw.email=us.email
    WHERE id_favorite IN (SELECT id_favorite FROM favorite_news_h WHERE email='$email') ")->fetch_all(MYSQLI_ASSOC);
}
function getFavoriteNewsByFavourite($email, $idNews)
{
    return mysqli_query($GLOBALS["db"],"SELECT fnd.id_news
    FROM favorite_news_d as fnd
    INNER JOIN news as nw ON nw.id_news = fnd.id_news
    WHERE id_favorite IN (SELECT id_favorite FROM favorite_news_h WHERE email='$email') AND fnd.id_news='$idNews' ")->fetch_assoc();
}

function addFavouriteNews($email, $idNews)
{
    return mysqli_query($GLOBALS["db"],"INSERT INTO favorite_news_d (id_favorite, id_news)
    VALUES ( (SELECT id_favorite FROM favorite_news_h WHERE email='$email') , '$idNews' )");
}
function removeFavouriteNews($email, $idNews)
{
    return mysqli_query($GLOBALS["db"],"DELETE FROM favorite_news_d 
    WHERE id_favorite = (SELECT id_favorite FROM favorite_news_h WHERE email='$email') AND id_news = '$idNews' ");
}
function countFavoriteNewsById($idNews)
{
    return intVal(mysqli_query($GLOBALS["db"],"SELECT COUNT(id_news)
    FROM favorite_news_d
    WHERE id_news = '$idNews' ")->fetch_row()[0]);
}







///// ======================== USER MODEL ======================== /////
function getUserData($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT * 
    FROM users
    WHERE email='$email' ")->fetch_assoc();
}
function getUserDataHighlight($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT email, username, photo
    FROM users
    WHERE email='$email' ")->fetch_assoc();
}

function InsertUser($data)
{
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    return mysqli_query($GLOBALS["db"],"INSERT INTO users (email, username, full_name, birthday, gender, password)
    VALUES ('".htmlspecialchars($data['email'])."',
    '".htmlspecialchars($data['username'])."', 
    '".htmlspecialchars($data['fullname'])."', 
    '".date("Y-m-d", strtotime($data['birthday']))."',
    ".intval(htmlspecialchars($data['gender'])).",
    '".$password."' )");
}

function editUserData($email, $data)
{
    return mysqli_query($GLOBALS["db"],"UPDATE users 
    SET username='".$data['username']."',
    full_name='".$data['full-name']."', 
    birthday='".$data['birthday']."'
    WHERE email='$email' ");
}
function editUserPhoto($email, $photoName)
{
    return mysqli_query($GLOBALS["db"],"UPDATE users 
    SET photo='".$photoName."'
    WHERE email='$email' ");
}




///// ======================== NEWS MODEL ======================== /////
function insertNews($data, $email)
{
    return mysqli_query($GLOBALS["db"],"INSERT INTO news (news_title, news_content, id_group, email)
    VALUES ('".htmlspecialchars($data['news_title'])."',
    '".htmlentities($data['news_content'])."', 
    '".htmlspecialchars($data['id_group'])."',
    '".htmlspecialchars($email)."')");
}
function editNews($data, $email, $idNews, $newsCover)
{
    return mysqli_query($GLOBALS["db"],"UPDATE news
    SET news_title='".htmlspecialchars($data['news_title'])."',
    news_content='".htmlentities($data['news_content'])."', 
    id_group='".htmlspecialchars($data['id_group'])."',
    email='".htmlspecialchars($email)."',
    news_cover='".htmlspecialchars($newsCover)."'
    WHERE id_news='$idNews'
    ");
}
function deleteNewsById($idNews)
{
    return mysqli_query($GLOBALS["db"],"DELETE FROM news WHERE id_news='$idNews'");
}

function getAllNews()
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM news")->fetch_all(MYSQLI_ASSOC);
}
function getAllNewsWithLimit($limit, $offset)
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM news 
    LIMIT $limit OFFSET $offset ")->fetch_all(MYSQLI_ASSOC);
}
function getAllNewsWithUploader()
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.*, us.photo, us.username 
    FROM news as nw
    INNER JOIN users as us on nw.email=us.email
    ")->fetch_all(MYSQLI_ASSOC);
}

function getAllNewsByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM news
    WHERE email='$email' ")->fetch_all(MYSQLI_ASSOC);
}
function getAllNewsWithUploaderByEmail($email)
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.* , us.photo, us.username 
    FROM news as nw
    INNER JOIN users as us on nw.email=us.email
    WHERE nw.email='$email' ")->fetch_all(MYSQLI_ASSOC);
}
function getNewsById($idNews)
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM news
    WHERE id_news='$idNews'")->fetch_assoc();
}
function getNewsByIdWithGroupInfo($idNews)
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.*, gp.group_name, gp.slug
    FROM news as nw
    INNER JOIN groups as gp on nw.id_group=gp.id_group
    WHERE id_news='$idNews'")->fetch_assoc();
}
function getNewsByIdWithGroupInfoAndUploader($idNews)
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.*, gp.group_name, gp.slug, us.photo, us.username 
    FROM news as nw
    INNER JOIN groups as gp on nw.id_group=gp.id_group
    INNER JOIN users as us on nw.email=us.email
    WHERE id_news='$idNews'")->fetch_assoc();
}
function getNewsTotal()
{
    return intval(mysqli_query($GLOBALS["db"],"SELECT COUNT(id_news) 
    FROM news")->fetch_row()[0]);
}
function getNewsByKeywordWithGroupInfoAndUploader($keyword)
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.*, gp.group_name, gp.slug, us.photo, us.username 
    FROM news as nw
    INNER JOIN groups as gp on nw.id_group=gp.id_group
    INNER JOIN users as us on nw.email=us.email
    WHERE nw.news_title LIKE '%$keyword%' OR nw.news_content LIKE '%$keyword%' ")->fetch_all(MYSQLI_ASSOC);
}
function getAllNewsWithUploaderWithLimit($limit, $offset)
{
    return mysqli_query($GLOBALS["db"],"SELECT nw.*, us.photo, us.username 
    FROM news as nw
    INNER JOIN users as us on nw.email=us.email
    LIMIT $limit OFFSET $offset ")->fetch_all(MYSQLI_ASSOC);
}








///// ======================== DATA MODEL ======================== /////
function getIdolsDataByGender($gender)
{
    return intval(mysqli_query($GLOBALS["db"],"SELECT count(gender) 
    FROM idols
    WHERE gender=$gender ")->fetch_row()[0]);
}
function getIdolsDataByCountries($slugCountry)
{
    return mysqli_query($GLOBALS["db"],"SELECT count(slug_country)
    FROM idols
    WHERE slug_country = '$slugCountry'
    GROUP BY slug_country
    ")->fetch_row()[0];
}
function getIdolsDataByOtherCountries()
{
    return mysqli_query($GLOBALS["db"],"SELECT count(slug_country) as sc
    FROM idols
    WHERE slug_country != 'kr' OR slug_country != 'jp' OR slug_country != 'cn' OR slug_country != 'au'
    GROUP BY slug_country
    
    ")->fetch_row()[0];
}

function getGroupsDataByGender($gender)
{
    return intval(mysqli_query($GLOBALS["db"],"SELECT count(group_gender) 
    FROM groups
    WHERE group_gender=$gender ")->fetch_row()[0]);
}


function getAllDataNews()
{
    return mysqli_query($GLOBALS["db"],"SELECT * FROM news")->fetch_all(MYSQLI_ASSOC);
} 



?>