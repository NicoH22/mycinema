<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cinema</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css"/>
</head>
<body>

            <!--HEADER-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">MYCINEMA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li class="nav-item">
                    <a class="nav-link" href="src/front/recherche.php">Recherche</a>
                <li>

                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

            <!--CONTAINER-->

            <div class="jumbotron">
                <video id="bg-video" autoplay="true" loop="loop" preload="metadata" muted="muted">
                    <source src="http://download.blender.org/peach/bigbuckbunny_movies/big_buck_bunny_480p_stereo.ogg" type="video/ogg" />
                </video>
                <div class="center jumbovidtext text-center">
                    <h1 class="txtjumbo">MYCINEMA</h1>
                    <p class="txtjumbo">La recherche efficace des films.</p>
                    <p><a class="btn center btn-primary btn-lg" id="botjumbo" href="src/front/recherche.php" role="button">Jeter un oeil...</a></p>
                </div>
            </div>

    <main>
        blabla test
    </main>

</body>
</html>