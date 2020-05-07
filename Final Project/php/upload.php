<?php

    if(isset($_POST['submit']))
    {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileErr = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt, $allowed))
        {
            if($fileErr === 0)
            {
                if($fileSize < 1000000000)
                {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    print (getImage($fileDestination));
                    header("Location: index.php");
                }
                else
                {
                    echo "The file is too big!";
                }
            }
            else
            {
                echo "There is an error uploading the file!";
            }
        }
        else
        {
            echo "You cannot upload a files of this type!";
        }
    }

    function getImage($fileDestination)
    {
        return "<img src='".$fileDestination."' alt='displayedImg'>";
    }
?>