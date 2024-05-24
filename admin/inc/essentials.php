

<?php
function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && ($_SESSION['adminLogin']) == true)) {
        echo "
        <script>window.location.href='index.php';
        </script>";
        exit;
    }
    // session_regenerate_id(true);
}

function redirect($url)
{
    echo "
    <script>window.location.href='$url';
    </script>
    ";
}

function uploadUserImage($file)
{
    $valid_mime = array("image/jpeg", "image/jpg", "image/png", "image/webp");
    $mime = $file['type'];
    $file_name = $file['name'];
    $file_error = $file['error'];
    $file_tmp = $file['tmp_name'];

    if ($file_error === 0) {
        if (in_array($mime, $valid_mime)) {
            $destination = "uploads/" . $file_name;
            if (move_uploaded_file($file_tmp, $destination)) {
                return $file_name;
            } else {
                return "upd_failed";
            }
        } else {
            return "inv_img";
        }
    } else {
        return "upd_failed";
    }
}
?>