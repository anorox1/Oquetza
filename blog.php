<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Moderna - Bootstrap 3 flat corporate template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo.png" class="img-logo" /><span class="home-text">C</span>olegio <span class="home-text">O</span>quetza</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Inicio</a></li>
												<li><a href="institucion.html">Nuestra Instituci&oacute;n</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Niveles Acad&eacute;micos <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu menu-niveles">
                                <li><a href="preescolar.html">Preescolar</a></li>
                                <li><a href="primaria.html">Primaria</a></li>
																<li><a href="secundaria.html">Secundaria</a></li>
																<li><a href="preparatoria.html">Preparatoria</a></li>
                            </ul>
                        </li>
												<li class="active"><a href="blog.html">Eventos</a></li>
                        <li><a href="contacto.html">Cont&aacute;ctanos</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="inner-headline">
		<div style="height: 40px;" class="container">
			<div class="row">
			</div>
		</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php
		      require_once("database/connection.php");

					$sql = "SELECT p.*, m.media_url, m.type FROM posts p LEFT JOIN media m ON m.post_id = p.id;";
		      $stmt = $conn->prepare($sql);
		      $stmt->execute();

					while ($row = $stmt->fetch()) {
				?>
				<article>
						<div class="post-image">
							<div class="post-heading">
								<h3><a href="#"><?php echo $row["title"]; ?></a></h3>
							</div>
							<?php if($row["type"] == "video") { ?>
							<iframe width="744" height="410" src="<?php echo $row["media_url"]; ?>"></iframe>
							<?php } else if($row["type"] == "image") { ?>
							<img src="<?php echo str_replace("../", "", $row["media_url"]); ?>" alt="<?php echo $row["type"]; ?>" />
							<?php } ?>
						</div>
						<p>
							<?php echo $row["content"]; ?>
						</p>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"> <?php echo $row["created"]; ?></a></li>
								<li><i class="icon-user"></i><a href="#"> Oquetza</a></li>
								<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
								<li><i class="icon-comments"></i><a href="#">0 Comentarios</a></li>
							</ul>
							<!-- <a href="#" class="pull-right">Seguir Leyendo <i class="icon-angle-right"></i></a> -->
						</div>
				</article>
				<?php
					}
				?>
				<!-- <article>
						<div class="post-quote">
							<div class="post-heading">
								<h3><a href="#">Nice example of quote post format below</a></h3>
							</div>
							<blockquote>
								<i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, ei quod constituto qui. Summo labores expetendis ad quo, lorem luptatum et vis. No qui vidisse signiferumque...
							</blockquote>
						</div>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
								<li><i class="icon-user"></i><a href="#"> Admin</a></li>
								<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
								<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
							</ul>
							<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>
				</article> -->
				<article>
						<div class="post-video">
							<div class="post-heading">
								<h3><a href="#">Festival de Navidad</a></h3>
							</div>
							<div class="video-container">
								<iframe src="http://player.vimeo.com/video/30585464?title=0&amp;byline=0">
								</iframe>
							</div>
						</div>
						<p>
							 Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius ea. Usu ea justo malis, pri quando everti electram ei.
						</p>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"> Diciembre 19, 2014</a></li>
								<li><i class="icon-user"></i><a href="#"> Oquetza</a></li>
								<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
								<li><i class="icon-comments"></i><a href="#">0 Comments</a></li>
							</ul>
							<a href="#" class="pull-right">Seguir Leyendo <i class="icon-angle-right"></i></a>
						</div>
				</article>
				<div id="pagination">
					<span class="all">Pagina 1 of 1</span>
					<span class="current">1</span>
					<!-- <a href="#" class="inactive">2</a>
					<a href="#" class="inactive">3</a> -->
				</div>
			</div>
			<div class="col-lg-4">
				<aside class="right-sidebar">
				<!-- <div class="widget">
					<form class="form-search">
						<input class="form-control" type="text" placeholder="Search..">
					</form>
				</div> -->
				<div class="widget">
					<h5 class="widgetheading">Categor&iacute;as</h5>
					<ul class="cat">
						<li><i class="icon-angle-right"></i><a href="#">Festivales</a><span> (20)</span></li>
						<li><i class="icon-angle-right"></i><a href="#">Excursiones</a><span> (11)</span></li>
						<li><i class="icon-angle-right"></i><a href="#">Semana de la Ciencia</a><span> (9)</span></li>
						<li><i class="icon-angle-right"></i><a href="#">Comunidad</a><span> (12)</span></li>
					</ul>
				</div>
				<div class="widget">
					<h5 class="widgetheading">Utimas Entradas</h5>
					<ul class="recent">
						<li>
						<img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
						<h6><a href="#">Semana de la ciencia</a></h6>
						<p>
							 Mazim alienum appellantur eu cu ullum officiis pro pri
						</p>
						</li>
						<li>
						<a href="#"><img src="img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
						<h6><a href="#">Excursi&oacute;n a San Luis Potos&iacute;</a></h6>
						<p>
							 Mazim alienum appellantur eu cu ullum officiis pro pri
						</p>
						</li>
						<li>
						<a href="#"><img src="img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
						<h6><a href="#">Festival de Navidad</a></h6>
						<p>
							 Mazim alienum appellantur eu cu ullum officiis pro pri
						</p>
						</li>
					</ul>
				</div>
				<div class="widget">
					<h5 class="widgetheading">Tags populares</h5>
					<ul class="tags">
						<li><a href="#">Festival</a></li>
						<li><a href="#">Excursion</a></li>
						<li><a href="#">Ciencia</a></li>
						<li><a href="#">Comunidad</a></li>
						<li><a href="#">Preparatoria</a></li>
						<li><a href="#">Secundaria</a></li>
					</ul>
				</div>
				</aside>
			</div>
		</div>
	</div>
	</section>
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="widget">
					<h5 class="widgetheading">Cont&aacute;ctanos</h5>
					<address>
					<strong>Colegio Oquetza</strong><br>
					Av. 6 Sur No. 26<br>
					Col. Plan de Ayala Cuautla, Mor </address>
					<p>
						<i class="icon-phone"></i> (735) 352 6641 <br>
						<i class="icon-envelope-alt"></i> contacto@oquetza.com.mx
					</p>
				</div>
			</div>
			<div class="col-lg-4">
				<ul class="social-network">
					<li><a href="https://www.facebook.com/comunidad.oquetza?fref=ts" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				</ul>
				<div class="copyright">
					<p>
						<span>&copy; Moderna 2014 All right reserved. By </span><a href="http://bootstraptaste.com" target="_blank">Bootstraptaste</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
