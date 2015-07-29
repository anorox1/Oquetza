<?php
class MediaBlog
{
    public static function upload($filedata, $post_id, $conn) {
      $target_dir = "../img/eventos/";
      $target_file = $target_dir . basename($filedata["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      $target_file = $target_dir . time() . "." . $imageFileType;
      if(isset($_POST["submit"])) {
          $check = getimagesize($filedata["image"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }

      if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
      }

      if ($filedata["image"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }

      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          $file = array("media_url" => $target_file, "size" => $filedata["image"]["size"], "post_id" => $post_id, "type" => "image");
          if (move_uploaded_file($filedata["image"]["tmp_name"], $target_file)) {
              self::save($file, $conn);
          } else {
            return false;
          }
      }

    }

    public static function save($data, $conn) {
        $sql = "INSERT INTO `oquetza`.`media`
              (`media_url`,
              `size`,
              `type`,
              `post_id`)
              VALUES(
              :media_url,
              :size,
              :type,
              :post_id);";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':media_url' => $data["media_url"], ':size' => $data["size"], ':type' => $data["type"], ':post_id' => $data["post_id"]));
    }
}
?>
