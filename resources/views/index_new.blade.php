<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Talento Especial</title>
        <link rel="icon" type="image/x-icon" href="{{url('/')}}/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('/')}}/css/styles.css" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5" >
                <a class="navbar-brand fw-bold  d-flex align-items-center" href="#page-top" >
                    <img src="{{url('/')}}/assets/img/logo.png" class="img-fluid" alt="" >
                    <img src="{{url('/')}}/assets/img/letras-logo.png" alt=""  class="img-fluid" style="width: 20%;"> 

                    <!--<h2 class="mt-2 mr-6" style="color: #00586d;">   -  Personas</h2>-->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <a class="btn btn-light rounded-pill px-3 mb-2 mb-lg-0  shadow-sm " href="{{url('/empresa/login')}}">
                        <span class="d-flex align-items-center text-nowrap">
                            <i class="bi bi-building me-2"></i>
                            <span >Soy empresa</span>
                        </span>
                    </a>
                    <a class="btn btn-naranjo rounded-pill px-3 mb-2 mb-lg-0 shadow-sm " href="{{url('/usuario/login')}}">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-person-circle me-2"></i>
                            <span >Ingresar</span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- App features section-->
        <form action="/buscarEmpleo" method="POST">
            <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card-body  no-gutters align-items-center">
                        <div class="d-flex align-items-center justify-content-center ">
                            <div class="input-group input-group-lg shadow ">
                                
                                    @csrf
                                    <input type="text" id="keyword" name="keyword" class="form-control rl" placeholder="Programador, secretaria, técnico, etc.">
                                    <button class="btn btn-naranjo rr" type="submit" id="button-addon2">Buscar empleo</button>
                                
                            </div>               
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <h2 class="text-center text-white ">¡Postúlate a 3 mil empleos desde cualquier dispositivo!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Footer-->
        <footer class="bg-naranjo bg-gradient text-center py-4 fixed-bottom shadow ">
            <div class="container px-5">
                    <button type="button" class="btn btn-social-icon btn-facebook btn-rounded"><i class="fa fa-facebook"></i></button>
                    <button type="button" class="btn btn-social-icon btn-youtube btn-rounded"><i class="fa fa-youtube"></i></button>                                        
                    <button type="button" class="btn btn-social-icon btn-twitter btn-rounded"><i class="fa fa-twitter"></i></button>
                    <button type="button" class="btn btn-social-icon btn-dribbble btn-rounded"><i class="fa fa-dribbble"></i></button>
                    <button type="button" class="btn btn-social-icon btn-linkedin btn-rounded"><i class="fa fa-linkedin"></i></button>
                    <button type="button" class="btn btn-social-icon btn-instagram btn-rounded"><i class="fa fa-instagram"></i></button>
            </div>
        </footer>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('/')}}/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

<style>
h2 {
  text-shadow: 2px 2px black;
}

.rl{
    border-top-left-radius: 15px !important;
    border-bottom-left-radius: 15px !important;
}
.rr{
    border-top-right-radius: 15px !important;
    border-bottom-right-radius: 15px !important;
}
.btn-naranjo {

  text-align: center;
  color: #fff;
  background-color: #f19029;
 }

.bg-naranjo {

  background-color: #f19029;
 }
.form-rounded {
  border-radius: 1rem;
}

.btn.btn-social-icon{
    width: 50px;
    height: 50px;
    padding: 0;
}
.template-demo > .btn{
    margin-right: 0.5rem !important;
}

.template-demo{
    margin-top: 0.5rem !important;
}

.btn.btn-rounded {
    border-radius: 50px;
}


.btn-outline-facebook {
    border: 1px solid #3b579d;
    color: #3b579d;
}

.btn-outline-facebook:hover {
    background: #3b579d;
    color: #ffffff;
}

.btn-outline-youtube {
    border: 1px solid #e52d27;
    color: #e52d27;
}

.btn-outline-twitter {
    border: 1px solid #2caae1;
    color: #2caae1;
}

.btn-outline-dribbble {
    border: 1px solid #ea4c89;
    color: #ea4c89;
}

.btn-outline-linkedin {
    border: 1px solid #0177b5;
    color: #0177b5;
}

.btn-outline-instagram {
    border: 1px solid #dc4a38;
    color: #dc4a38;
}

.btn-outline-twitter:hover {
    background: #2caae1;
    color: #ffffff;
}

.btn-outline-linkedin:hover {
    background: #0177b5;
    color: #ffffff;
}

.btn-outline-youtube:hover {
    background: #e52d27;
    color: #ffffff;
}

.btn-outline-instagram:hover{
    background: #e52d27;
    color: #ffffff;
}


/*Button cover*/

.btn-facebook {
    background: #3b579d;
    color: #ffffff;
}

.btn-youtube {
    background: #e52d27;
    color: #ffffff;
}

.btn-twitter {
    background: #2caae1;
    color: #ffffff;
}
.btn-dribbble {
    background: #ea4c89;
    color: #ffffff;
}
.btn-linkedin {
    background: #0177b5;
    color: #ffffff;
}
.btn-instagram {
    background: #dc4a38;
    color: #ffffff;
}

.btn-facebook:hover, .btn-facebook:focus {
    background: #2d4278;
    color: #ffffff;
}

.btn-youtube:hover, .btn-youtube:focus {
    background: #c21d17;
    color: #ffffff;
}
.btn-twitter:hover, .btn-twitter:focus {
    background: #1b8dbf;
    color: #ffffff;
}
.btn-dribbble:hover, .btn-dribbble:focus {
    background: #e51e6b;
    color: #ffffff;
}

.btn-linkedin:hover, .btn-linkedin:focus {
    background: #015682;
    color: #ffffff;
}

.btn-instagram:hover, .btn-instagram:focus {
    background: #bf3322;
    color: #ffffff;
}

body:before {
  filter: blur(2px);
  content: "";
  position: absolute;
  height: 20%; 
  width: 20%;
  background: url("{{url('/')}}/background.jpg");
  background-size: cover;
  z-index: -1;
  -webkit-transform: scale(5);
  -webkit-transform-origin: top left;
}

.container{
  z-index:99999;
}
</style>
