
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="card col">
            <div id="calendar">

            </div>
        </div>
    </div>

    <div class="modal fade"  id="agendaModal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agendar Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario_agenda">  
                        <?php echo csrf_field(); ?>                  
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Fecha</label>
                                    <input type="date" class="form-control" id="txtFecha" name="txtFecha">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Hora Inicial</label>
                                    <input type="time" class="form-control" name="txtHoraInicial" id="txtHoraInicial">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Hora Final</label>
                                    <input type="time" class="form-control" name="txtHoraFinal" id="txtHoraFinal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <select name="ddlUsuarios" class="form-control" id="ddlUsuarios">
                                        <option value="">Seleccione</option>
                                        <option value="1">Jean</option>
                                        <option value="2">Hector</option>
                                        <option value="3">Jeremias</option>
                                        <option value="4">Andres</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <textarea name="txtDescripcion" class="form-control" id="txtDescripcion" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button onclick="guardar()" type="button" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link href='<?php echo e(asset('/assets/dashboard/vendors/lib/main.css')); ?>' rel='stylesheet' />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){ 
            var calendar = null;           
            var calendarEl = document.getElementById('calendar');
            calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone : 'America/Bogota',                
                locale :"es",
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) { 
                    $("#agendaModal").modal();                                        
                    let fecha = moment(arg.startStr).format("YYYY-MM-DD")                    
                    let hora_inicial = moment(arg.startStr).format("HH:mm:ss")
                    let hora_final = moment(arg.endStr).format("HH:mm:ss")                                      
                    $("#txtFecha").val(fecha);                    
                    $("#txtHoraInicial").val(hora_inicial);                    
                    $("#txtHoraFinal").val(hora_final);                                        
                    calendar.unselect()
                },
                editable: true,
                events: '/agenda/listar'
            });
            calendar.render();
        })

        function limpiar(){
            $("#agendaModal").modal('hide'); 
            $("#txtFecha").val("");
            $("#ddlUsuarios").val("");                    
            $("#txtHoraInicial").val("");                    
            $("#txtHoraFinal").val("");
        }

        function guardar(){
            var formulario = new FormData(document.getElementById("formulario_agenda"));
            

            $.ajax({
                url: "/agenda/guardar",
                type: "POST",
                data: formulario,
                processData: false,
                contentType: false
            }).done(function(respuesta){
                if(respuesta && respuesta.ok){
                    calendar.refetchEvents();
                    alert("Se registró la cita en la agenda");
                    limpiar();
                }else{
                    alert("Ya hay una cita en esa fecha");
                }
            });

        }
    </script>
    
    <script src='<?php echo e(asset('/assets/dashboard/vendors/lib/main.js')); ?>'></script>
    <script src='<?php echo e(asset('/assets/dashboard/vendors/lib/locales/es.js')); ?>'></script>
    <script src='<?php echo e(asset('/assets/dashboard/vendors/lib/moment.js')); ?>'></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\resources\views/agenda/index.blade.php ENDPATH**/ ?>