<?php
spl_autoload_register(function($class_name){
    require($class_name . ".class.php");
});

$carrerapage = new page();
$carrerapage->title = "Carreras - Centro de Estudios de Postgrados";

$carrerapage->content = '

<h2 class="titulo">Nuestras Carreras de Postgrado</h2>

<table class="tabla-carreras">
    <thead>
        <tr>
            <th>Carrera</th>
            <th>Duración</th>
            <th>Modalidad</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="nombre-carrera">Maestría en Ingeniería de Software</td>
            <td class="duracion">2 años</td>
            <td class="modalidad">Presencial / Virtual</td>
            <td>Programa especializado en desarrollo, arquitectura, calidad y gestión de proyectos de software.</td>
        </tr>
        <tr>
            <td class="nombre-carrera">Maestría en Administración de Empresas</td>
            <td class="duracion">2 años</td>
            <td class="modalidad">Presencial</td>
            <td>Formación estratégica en liderazgo, finanzas, marketing y gestión empresarial moderna.</td>
        </tr>
        <tr>
            <td class="nombre-carrera">Maestría en Educación Superior</td>
            <td class="duracion">1 año y 6 meses</td>
            <td class="modalidad">Virtual</td>
            <td>Especialización en pedagogía universitaria, innovación educativa y evaluación académica.</td>
        </tr>
        <tr>
            <td class="nombre-carrera">Maestría en Ciberseguridad</td>
            <td class="duracion">2 años</td>
            <td class="modalidad">Presencial / Virtual</td>
            <td>Formación avanzada en seguridad informática, protección de datos y gestión de riesgos digitales.</td>
        </tr>
        <tr>
            <td class="nombre-carrera">Maestría en Gestión de Proyectos</td>
            <td class="duracion">1 año y 8 meses</td>
            <td class="modalidad">Virtual</td>
            <td>Enfoque en planificación, ejecución y control de proyectos bajo estándares internacionales.</td>
        </tr>
    </tbody>
</table>
<br>
    <br>
';

$carrerapage->display();
?>