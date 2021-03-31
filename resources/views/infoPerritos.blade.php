@extends('plantilla')

@section('seccion')

    <style>
        .BarraPrTabla{
            color: #0088cc;
            text-align: center;
        }
        .centerDiv {
            text-align: center;
        }
    </style>    

   
    <div class="container ">
        <h2 class=" titulo text-primary">Datos de Perritos</h2>
    </div>

    <div class="container">

        <button class="btn btn-primary success mb-2" data-toggle="modal" data-target="#crearModal">
            <i class="fas fa-plus">Agregar</i>                              
        </button>                    

        <table id="table_id" class="table table-bordered ">
            <thead >
                <tr class="bg-dark BarraPrTabla">
                    
                    <th scope="col" >Nombre</th>
                    <th scope="col" >Color</th>
                    <th scope="col" >Raza</th>
                    <th scope="col" ></th>
                </tr>
            </thead>

            <tbody>
                @foreach($perritos as $item)
                    <tr>
                                
                        
                        <td scope="col">{{$item->nombre}}</td>
                        <td scope="col">{{$item->color}}</td>
                        <td scope="col">{{$item->raza}}</td>
                        <td scope="col">
                            <div class="row ">
                                <div class="col centerDiv">
                                    <a
                                        class=" btn btn-primary btn-sm"  
                                        href="{{route('perritos.editar', $item)}}"
                                    >
                                        <i class="fas fa-pencil-alt"> Editar</i>      
                                    </a>
                                    <button 
                                        class="btn btn-primary btn-sm "  
                                        onclick="eliminar(
                                            {{$item->id}}, 
                                        )"
                                    >
                                        <i class="fas fa-trash"> Eliminar</i>       
                                    </button>

                                </div>
                            </div>                           
                        </td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
    
    </div>


    <!-----------------------------------------MODAL CREAR PERRITOS --------------------------------------->    

    <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <form >
                    @csrf
                    <div class="modal-header">
                        <div class="tituloNav">
                            <h3 class="modal-title">CREAR</h3>
                        </div>
                        <button  type="button" class="close tituloNav" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            
                        <label class="colorLabel">NOMBRE</label>
                        <input min="1" max="3" type="text" name="mdlNombreAgregar"  class="form-control" id="mdlNombreAgregar" placeholder="Nombre">
                    </div>
                  
                    <div class="modal-body">
                        <label class="colorLabel">COLOR</label>
                        <input type="text" name="mdlColorAgregar"  class="form-control" id="mdlColorAgregar" placeholder="Color">
                    </div>

                    <div class="modal-body">
                        <label class="colorLabel">RAZA</label>
                        <input type="text" name="mdlRazaAgregar"  class="form-control" id="mdlRazaAgregar" placeholder="Raza">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary " onclick="agregar()">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>


        //   <!-----------------------------------------AGREGAR--------------------------------------->    
        function agregar(){

            var nombrePr = $('#mdlNombreAgregar').val();
            var colorPr = $('#mdlColorAgregar').val();
            var razaPr = $('#mdlRazaAgregar').val();
            parametros= {
                'nombre' : nombrePr,
                'color' : colorPr,
                'raza' : razaPr
            };

            if(parametros.nombre.trim() === "" || parametros.color.trim() === "" || parametros.raza.trim() === ""){
                toastr.warning('Campos Vacios', 'ERROR!!',  {
                    "positionClass": "toast-top-center"
                });
                return;
            };
           
      
            $.ajax({
                url : "{{route('perritos.crear')}}",
                type : "POST",
                data: parametros,
                success : function(data) {
                    toastr.success('Datos Creados', 'Éxito!!', {
                        "positionClass": "toast-top-center"
                    });
                    window.location.href=`http://localhost/pruebaLaravel/public/api`;
                },
                error : function(data) {
                    
                    toastr.info('Nombre ya Existe', 'ERROR!!',  {
                        "positionClass": "toast-top-center"
                    });
                    
                }
            });
        };


        //   <!-----------------------------------------ELIMINAR--------------------------------------->    

        function eliminar(id){

            parametros= {'id' : id,};
            console.log(parametros)
            $.ajax({
                url : "{{route('perritos.eliminar')}}",
                type : "POST",
                data: parametros,
                success : function(data) {
                    toastr.success('Datos Eliminados', 'Éxito!!', {
                        "positionClass": "toast-top-center"
                    });
                    window.location.href=`http://localhost/pruebaLaravel/public/api`;
                },
                error : function(data) {
                    toastr.info('No se pudo eliminar los datos', 'ERROR!!',  {
                        "positionClass": "toast-top-center"
                    });
                }
            });
        };

    
        // <!-----------------------------------------CAMBIAR NOMBRES DE LA TABLA--------------------------------------->  

        $(document).ready( function () {
            $('#table_id').DataTable({
                "language":{
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando  0 al 0, total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de masnera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                    }
                },
            });
        });
    </script>
   
    
@endsection