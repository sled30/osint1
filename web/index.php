
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>главная форма</title>

    <link rel="icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/3.0.0/css/ionicons.css" rel="stylesheet">
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/template.css" rel="stylesheet">
    </head>

  <style>
      header {
          background-image: url('../image/photo.jpeg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center top;
      }
  </style>

  <body data-spy="scroll" data-target="#navbar1" data-offset="60">
    <header class="bg-primary">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12">

                <!---    <div class="text-center m-0 vh-100 d-flex flex-column justify-content-center text-light">
                        <h1 class="display-4">Darkster</h1>
                        <p class="lead">A dark background theme with bold contrasting colors.</p>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 mx-auto">
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control form-control-lg" placeholder="your@email">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-light btn-lg rounded-right" type="button">Sign-up</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mx-auto">
                                                            <div class="btn-group">
                                  <a href="theme.css" class="btn btn-outline-light btn-lg">
                                    Download Theme
                                  </a>
                                  <button type="button" class="btn btn-lg btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Downloads</span>
                                  </button>
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item" href="theme.css">theme.css</a>
                                      <a class="dropdown-item" href="theme.min.css">theme.min.css</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="theme.scss">theme.scss</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" target="new" href="https://github.com/ThemesGuide/bootstrap-themes/tree/master/darkster">Full template</a>
                                  </div>
                                </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </header>
    Добро пожаловать
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary" id="navbar1">
        <div class="container">
            <a class="navbar-brand mr-1 mb-1 mt-0" href="../">Борьба с сорняками</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="themesDd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Администрирование
                        </a>
                        <div class="dropdown-menu" aria-labelledby="themesDd">
                          <a class="dropdown-item px-2 " href="../signal">Управление учетными записями</a>
                            <spane class="active"><a class="dropdown-item px-2 " href="../greyson"> ddddd</a></spane>
                            <a class="dropdown-item px-2 " href="../greyson">орориаоа</a>
                            <a class="dropdown-item px-2 " href="../greyson">орориаоа</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="layoutDd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Сетевые инструменты
                        </a>
                        <div class="dropdown-menu" aria-labelledby="layoutDd">
                            <a class="dropdown-item px-2 active" href="./">Who is</a>
                            <a class="dropdown-item px-2" href="./template2.html">Layout 2</a>
                            <a class="dropdown-item px-2" href="./template3.html">Layout 3</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          More
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDd">
                            <a class="dropdown-item px-2" href="#more">Badges</a>
                            <a class="dropdown-item px-2 active" href="#more">Tooltips &amp; Popups</a>
                            <a class="dropdown-item px-2" href="#more">Progress &amp; Alerts</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item px-2" href="#more">All</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#grid">Выход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
      <section class="container">
                 <div class="row vh-100">
                     <div class="col-12 my-auto">
                         <div class="row text-center">
                             <div class="col-lg-4 mb-4">
                                 <div class="card h-100">
                                     <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                         <h1 class="display-2 text-primary"><span class="ion ion-ios-warning-outline"></span></h1>
                                         <h4 class="card-title text-primary">Unique</h4>
                                         <p class="card-text">Don't like that typical Bootstrap look? Each theme has a custom look-and-feel, while maximizing use of Bootstrap without extensive additional CSS & JS.</p>
                                         <a href="#" class="btn btn-primary mt-auto">Button</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-4 mb-4">
                                 <div class="card h-100">
                                     <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                         <h1 class="display-2 text-primary"><span class="ion ion-ios-tablet-portrait-outline"></span></h1>
                                         <h4 class="card-title text-primary">Responsive</h4>
                                         <p class="card-text">Based on mobile-first Bootstrap 4, all themes are 100% responsive and designed to look great on everything from smartphones to tablets to desktops..</p>
                                         <a href="#" class="btn btn-primary mt-auto">Button</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-4 mb-4">
                                 <div class="card h-100">
                                     <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                         <h1 class="display-2 text-primary"><span class="ion ion-ios-checkmark-circle-outline"></span></h1>
                                         <h4 class="card-title text-primary">Consistent</h4>
                                         <p class="card-text">Themes are crafted with care for design and performance. All themes are built on modern HTML5 & CSS3 standards to ensure consistency and cross-browser support.</p>
                                         <a href="#" class="btn btn-primary mt-auto">Button</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
    </main>
        <footer id="footer" class="bg-dark text-light py-3">

    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!--  <script src="../js/scripts.js"></script>-->
</body>
</html>
