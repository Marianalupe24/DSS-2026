<?php
spl_autoload_register(function($class_name){
    require($class_name . ".class.php");
});

$institucionalpage = new page();
$institucionalpage->title = "Institucional - Centro de Estudios de Postgrados";

$institucionalpage->content = '


<div class="inst-container">

    <h2 class="inst-titulo">Información Institucional</h2>

    <div class="inst-card">
        <h3>¿Quiénes Somos?</h3>
        <p>
        El Centro de Estudios de Postgrados es una institución académica comprometida con la excelencia,
        la innovación y la formación profesional de alto nivel. Nuestro objetivo es preparar líderes
        capaces de enfrentar los retos del entorno global.
        </p>
    </div>
    <br>

    <div class="inst-grid">
        <div class="inst-box">
            <h4>Misión</h4>
            <p>
            Formar profesionales altamente capacitados mediante programas de postgrado de calidad,
            fomentando la investigación, la ética y el liderazgo.
            </p>
        </div>
      

        <div class="inst-box">
            <h4>Visión</h4>
            <p>
            Ser una institución referente a nivel nacional e internacional en educación superior
            de postgrado, destacada por su innovación y excelencia académica.
            </p>
        </div>
    </div>
    <br>
    <div class="inst-card">
        <h3>Valores Institucionales</h3>
        <div class="valores">
            <div class="valor-item">Excelencia</div>
            <div class="valor-item">Innovación</div>
            <div class="valor-item">Responsabilidad</div>
            <div class="valor-item">Ética</div>
            <div class="valor-item">Compromiso Social</div>
        </div>
    </div>

</div>
';

$institucionalpage->display();
?>