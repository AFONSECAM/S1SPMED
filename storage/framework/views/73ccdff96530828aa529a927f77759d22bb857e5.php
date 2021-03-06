

<?php $__env->startSection('content'); ?>
    
<!--Comprobamos si el status esta a true y existe más de un lenguaje-->

<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><?php echo app('translator')->get('Lo que necesita saber'); ?></h2>
                <hr class="divider light my-4" />
                <p class="text-white-50 mb-4"><?php echo app('translator')->get('Es un sistema de información desarrollado para la empresa Cardionet, está desarrollado en Laravel 7 que es un framework de PHP!'); ?></p>                
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <hr class="divider my-4" />
        <h2 class="text-center mt-0"><?php echo app('translator')->get('Caracteristicas'); ?></h2>        
        <hr class="divider my-4" />
        <div class="row">
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-lock text-primary mb-4"></i>
                    <h3 class="h4 mb-2"><?php echo app('translator')->get('Seguridad'); ?></h3>
                    <p class="text-muted mb-0"><?php echo app('translator')->get('Custodiamos sus datos aseguramos la confidencialidad de los mismos mediante una plataforma segura.'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                    <h3 class="h4 mb-2"><?php echo app('translator')->get('Cumplimiento'); ?></h3>
                    <p class="text-muted mb-0"><?php echo app('translator')->get('Completo cumplimiento de la normatividad legislación colombiana y garantía de mantenerlo actualizado.'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-calendar-alt text-primary mb-4"></i>
                    <h3 class="h4 mb-2"><?php echo app('translator')->get('Disponibilidad'); ?></h3>
                    <p class="text-muted mb-0"><?php echo app('translator')->get('No más copias de respaldo ni perdida de datos. Disponible 24/7 los 365 días del año.'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-desktop text-primary mb-4"></i>
                    <h3 class="h4 mb-2"><?php echo app('translator')->get('Accesibilidad'); ?></h3>
                    <p class="text-muted mb-0"><?php echo app('translator')->get('Ingrese desde cualquier dispositivo (Smarthphone, Tablet, PC, Laptop, etc..) con conexión a internet.'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-database text-primary mb-4"></i>
                    <h3 class="h4 mb-2"><?php echo app('translator')->get('Almacenamiento'); ?></h3>
                    <p class="text-muted mb-0"><?php echo app('translator')->get('Imagenes escaneadas, resultados de exámenes, formulas médicas, historias clínicas.'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-calculator text-primary mb-4"></i>
                    <h3 class="h4 mb-2"><?php echo app('translator')->get('Control Financiero'); ?></h3>
                    <p class="text-muted mb-0"><?php echo app('translator')->get('Genere facturación y RIPS y enviela a su email. Control de cartera y trazabilidad de facturación.'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-->

<!-- Call to action-->
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Let's Get In Touch!</h2>
                <hr class="divider my-4" />
                <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div>(+57) 336-365-4587</div>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                <a class="d-block" href="mailto:contact@yourwebsite.com">contact@sispmed.com</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/landing/index.blade.php ENDPATH**/ ?>