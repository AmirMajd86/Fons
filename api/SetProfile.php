<?php
if (is_dir("../Data/" . md5($_POST["Username"])) . "/" == true) {
    $Pass = file_get_contents("../Data/" . md5($_POST["Username"]) . "/Pass.txt");
    if ($Pass == md5($_POST["Password"])) {
        // Run if Pass = true And User = true;
        Run();
    } else {
        exit();
    }
}
function Run()
{
    if (isset($_POST["upload"])) {
        mkdir("../Profile/".$_POST["Username"]."/");
        $targetDir = "../Profile/" . ($_POST["Username"]) . "/";
        $originalName = $_FILES["image"]["name"];
        $imageFileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        // تولید نام جدید برای فایل
        $newName = "profile." . $imageFileType;
        $targetFile = $targetDir . $newName;

        $uploadOk = 1;

        // بررسی آیا فایل یک تصویر است یا نه
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Please Select Picture ";
            $uploadOk = 0;
        }
        $maxFileSize = 5 * 1024 * 1024; // 5 مگابایت
        // بررسی سایز فایل
        if ($_FILES["image"]["size"] > $maxFileSize) {
            echo "Max Size : 5 MB";
            $uploadOk = 0;
        }

        // اجازه آپلود فقط برای تصاویر خاص
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "فقط فرمت‌های JPG, JPEG, PNG, و GIF مجاز هستند.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Not Upload Profile Picture";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "Set Picture : " . htmlspecialchars($newName);
                echo <<<HTML
                    <script>
                        location.href = "../Fons/account";
                    </script>                
                HTML;
                $NamePicLoc = "../Profile/" . ($_POST["Username"]) . "/name.txt";
                $NamePic = $newName;
                file_put_contents($NamePicLoc, $NamePic);
            } else {
                echo "Error";
            }
        }
    }
}
?>