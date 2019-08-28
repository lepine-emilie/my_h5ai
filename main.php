<?php
include "function.php";
function get_directory($base_url, $url=""){
    $directory_files = scandir($base_url.$url);
    $dir_array = array();

    foreach ($directory_files as $key => $dir){
        if (!in_array($dir, array(".","..", ".idea", ".git"))){
            if (is_dir($base_url.$url ."/" . $dir)){
                $dir_array[$dir]['child'] = get_directory($base_url, $url . "/" . $dir);
                $dir_array[$dir]['url'] = $url."/".$dir."/";
                $dir_array[$dir]['name'] = $dir;
            }
        }
    }
    return $dir_array;
}
function get_whole_directory($url, $sort){
    $directory_files = scandir($url);
    $dir_array = array();
    foreach ($directory_files as $key => $dir){
        if (!in_array($dir, array(".","..", ".idea", ".git"))){
            $dir_array[$dir]['path'] = $dir;
            $dir_array[$dir]['size'] = filesize(".".$_SERVER["PATH_INFO"].$dir);
            $dir_array[$dir]['modif'] = date("F d Y H:i", filemtime(".".$_SERVER["PATH_INFO"].$dir));
        }
    }
    sort_array($dir_array, $sort);
    return $dir_array;
}
function show_folders($folder_array){
    echo "<ul>";
    foreach ($folder_array as $key => $value){
        $url = $value["url"];
        echo "<li><a href=\"$url\"><i class=\"fas fa-folder\"></i> $key</a></li>";
        if (is_array($value["child"])){
            show_folders($value["child"]);
        }
    }
    echo "</ul>";
}
function main_directory($url){
    $folder_array = get_directory($url);
    show_folders($folder_array);
}
function main_whole_directory($url, $sort){
    $folder_array = get_whole_directory($url, $sort);
    show_files($folder_array);
}
