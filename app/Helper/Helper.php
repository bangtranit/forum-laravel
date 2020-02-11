<?php

function generatePathImage($imageName){
    $strPath = asset('storage/'.$imageName);
    return $strPath;
}

function generateAvatarForEmail($email){
    $avatar = Gravatar::src($email);
    return $avatar;
}