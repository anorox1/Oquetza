<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php
      require_once("../database/connection.php");
      require_once("media.php");

      $title = (!empty($_POST["title"])) ? $_POST["title"] : null;
      $content = (!empty($_POST["content"])) ? $_POST["content"] : null;
      $tags = (!empty($_POST["tags"])) ? $_POST["tags"] : null;
      $video_url = (!empty($_POST["video_url"])) ? $_POST["video_url"] : null;


      if(!empty($title) && !empty($content) && !empty($tags)) {
        $sql = "INSERT INTO `oquetza`.`posts`
                (`title`,
                `content`,
                `status`,
                `tags`,
                `user_id`,
                `created`)
                VALUES
                (:title,
                :content,
                1,
                :tags,
                1,
                '2015-07-20 10:00:00');";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':title' => $title, ':content' => $content, ':tags' => $tags));
        $post_id = $conn->lastInsertId();
        if(!empty($_FILES["image"]["name"])) MediaBlog::upload($_FILES, $post_id, $conn);
        if(!empty($video_url)) {
          $data["media_url"] = $video_url;
          $data["post_id"] = $post_id;
          $data["size"] = 0;
          $data["type"] = "video";
          MediaBlog::save($data, $conn);
        }
      }

      $id = $_GET["id"];
      if(!empty($id)) {
        $sql = "DELETE FROM posts WHERE id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      }

      $sql = "SELECT p.*, m.media_url, m.type FROM posts p LEFT JOIN media m ON m.post_id = p.id;";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    ?>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Oquetza Administrador</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Mikaela <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-comment-o"></i> Blog <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="index.php">Ver Eventos</a>
                            </li>
                            <li>
                                <a href="add.php">Agregar Evento</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Eventos
                            <small>Entradas</small>
                        </h1>
                    </div>
                </div>

                <?php
                  while ($row = $stmt->fetch()) {
                ?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="well">
                        <div class="media">
                        	<a class="pull-left" href="#">
                      		<img class="media-object" width="100px" height="100px" src="<?php if ($row["type"] == "video") echo "../img/video.png"; else echo $row["media_url"];  ?>">
                    		</a>
                    		<div class="media-body">
                          <a href="index.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-times pull-right"></i></a>
                      		<a href="#"><i class="fa fa-pencil pull-right"></i></a>
                          <h4 class="media-heading"><?php echo $row["title"] ?></h4>
                            <p class="text-right">By Mikaela</p>
                            <p><?php echo $row["content"]; ?></p>
                            <ul class="list-inline list-unstyled">
                    			       <li><span><i class="fa fa-calendar-o"></i> <?php echo $row["created"] ?> </span></li>
                  			    </ul>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  }
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
