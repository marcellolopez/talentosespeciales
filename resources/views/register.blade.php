
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />

<div class="container">
    <!-- Modal -->

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Smart Wizard modal</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Paso 1<br /><small>Información de cuenta</small></a></li>
                            <li><a href="#step-2">Paso 2<br /><small>Información personal</small></a></li>
                            <li><a href="#step-3">Paso 3<br /><small>Información física</small></a></li>
                            <li><a href="#step-4">Paso 4<br /><small>Confirm details</small></a></li>
                        </ul>
                        <div>
                            <div id="step-1">
                                <div class="row">
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Usuario" required> </div>
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Email" required> </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Clave" required> </div>
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Repetir clave" required> </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="row">
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Nombre" required> </div>
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Región" required> </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Comúna" required> </div>
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Teléfono" required> </div>
                                </div>
                            </div>
                            <div id="step-3" class="">
                                <div class="row">
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Sexo" required> </div>
                                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Talla" required> </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"> <input id="peso" type="number" class="form-control" placeholder="Peso (Kg)" min="1" max="200" step="1" required> </div>
                                    <div class="col-md-6"> <input id="altura" type="number" class="form-control" placeholder="Altura (M)" min="0.1" max="3.5" step="0.1" required> </div>                                    
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"> <input id="imc" type="text" class="form-control" placeholder="" required readonly> </div>                                    
                                </div>
                            </div>
                            <div id="step-4" class="">
                                <div class="row">
                                    <div class="col-md-12"> <span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script>
<style>
    body {
        background-color: #eee
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25)
    }

    .btn-secondary:focus {
        box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
    }

    .close:focus {
        box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
    }

    .mt-200 {
        margin-top: 200px
    }    
</style>
<script>
    $(document).ready(function(){
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            autoAdjustHeight:true,
            transitionEffect:'fade',
            showStepURLhash: false,
        });

        $('#altura, #peso').change(function(){
            var peso   = $('#peso').val();
            var altura = $('#altura').val();
            var imc    = peso/(altura*altura);
            var texto = "";
            imc = imc.toFixed(1); 
            if (imc < 18.4) {
                $('#imc').css("background-color", "grey").css("color", "white");
                texto = "Por debajo";
            }
            else if(imc < 24.9){
                $('#imc').css("background-color", "green").css("color", "white");
                texto = "Saludable";
            }
            else if(imc < 29.9){
                $('#imc').css("background-color", "yellow").css("color", "black");
                texto =  "Sobrepeso"
            }
            else if(imc < 34.9){
                $('#imc').css("background-color", "orange").css("color", "black");
                texto = "Obesidad I"
            }
            else if(imc < 39.9){
                $('#imc').css("background-color", "red").css("color", "white");
                texto = "Obesidad II"
            }
            else if(imc >= 40){
                $('#imc').css("background-color", "DarkRed").css("color", "white");
                texto = "Obesidad III"
            }
            if(imc != "Infinity"){
                $('#imc').val(imc+" "+texto);
            }
            else{
                $('#imc').css("background-color", "grey").css("color", "white");
                $('#imc').val(" ");
            }
        });
    });    

</script>