<?php
    require "vendor/autoload.php";
    use ImageKit\ImageKit;  
    
    $imageKit = new ImageKit(
        "public_PObMIzHha+AI0q1rNOAcM4yTTVI=",
        "private_HbWqqrJ9oWiz58efWGp47iJSVzs=",
        "https://ik.imagekit.io/xbf1dqndy"
    );

    function image($image, $folder, $width, $height){
        global $imageKit;
        return $imageKit->url(
            [
                "path" => $folder."/".$image,
                "transformation" => [
                    [
                        "format" => "webp",
                        "width" => $width,
                        "height" => $height
                    ]
            ]
        ]);
    }

    function upload($image, $name, $folder){
        global $imageKit;
        $upload = $imageKit->uploadFile([
            "file" => fopen($image, "r"),
            "fileName" => $name,
            "useUniqueFileName" => false,
            "folder" => $folder
        ]);
        $status = $upload->responseMetadata["statusCode"];
        if($upload->error == null && $status == 200){
            return true;
        }else{
            return $status;
        }
    }
?>