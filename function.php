<?php
function show_files($folder_array){
    if (empty($folder_array)){
        echo "There are no files or folder in this directory";
    }
    else{
        echo "<table>";
        echo "<tr>";
        $sort_url = $_SERVER["PATH_INFO"];
        echo "<th>Filename <a href='$sort_url?sort=asc'><i class=\"fas fa-sort\"></i></a></th>";
        echo "<th>Last Modified <a href='$sort_url?sort=m'><i class=\"fas fa-sort\"></i></a></th>";
        echo "<th>File Size <a href='$sort_url?sort=s'><i class=\"fas fa-sort\"></i></a></th>";
        echo "</tr>";
        foreach($folder_array as $key => $value){
                echo "<tr>";
                $icon_result = icons_to_files($value["path"]);
                echo $icon_result;
                echo "<td>".date("F d Y H:i", $value["modif"])."</td>";
                echo "<td>".$value["size"]."B</td>";
                echo "</tr>";
        }
        echo "</table>";
    }
}
function sort_array(&$array, $sort){
    if ($sort == "asc"){
        usort($array, function ($a, $b){
            return $a['name'] > $b['name'];
        });
    }
    elseif ($sort == "s"){
        usort($array, function ($a, $b){
            return $a['size'] > $b['size'];
        });
    }
    elseif($sort == "m"){
        usort($array, function ($a, $b){
            return $a['modif'] > $b['modif'];
        });
    }
}
function breadcrumb($url){
    $crumbs = explode("/", $url);
    echo "<ul class='breadcrumb'>";
    foreach ($crumbs as $crumb){
        if (!empty($crumb)){
            if ($crumb == "."){
                echo "<li class='crumb'> ROOT <i class=\"fas fa-chevron-right\"></i></li>";
            }
            else{
                echo "<li class='crumb'>$crumb <i class=\"fas fa-chevron-right\"></i></li>";
            }
        }
    }
    echo "</ul>";
}
function icons_to_files($filename){
    $extension = explode(".", $filename);
    switch ($extension[1]){
        case null:
            echo "<td><i class=\"fas fa-folder\"></i><a href=\"".$_SERVER["PATH_INFO"]."/$filename\"> $filename</td>";
            break;
        case "html":
            echo "<td><i class=\"fab fa-html5\"></i><a href='$filename'> $filename</a></td>";
            break;
        case "php":
            echo "<td><i class=\"fab fa-php\"></i><a href='$filename'> $filename</a></td>";
            break;
        case "css":
            echo "<td><i class=\"fab fa-css3-alt\"></i><a href='$filename'> $filename</a></td>";
            break;
        case "png":
        case "jpg":
        case "jpeg":
            echo "<td><i class=\"far fa-file-image\"></i> <a href='$filename'>$filename</a></td>";
            break;
        case "js":
            echo "<td><i class=\"fab fa-js-square\"></i><a href='$filename'> $filename</a></td>";
            break;
        default:
            echo "<td><i class=\"far fa-file\"></i><a href='$filename> $filename</td>";
            break;
    }
}
