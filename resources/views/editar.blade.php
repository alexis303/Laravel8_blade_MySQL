@extends('plantilla')

@section('seccion')

    <div class=" bg-dark">
        <form >
            @csrf
            <div class="modal-header">
                <div class="tituloNav">
                    <h3 class="modal-title">EDITAR</h3>
                </div>
            </div>

            <input type="hidden" id="IdEditar" value="{{$perrito ->id }}">
            <div class="modal-body">
                            
                <label class="colorLabel">EDITAR NOMBRE</label>
                <input type="text" name="nombre" value="{{$perrito -> nombre }}"  class="form-control" id="nombre" placeholder="Nombre">
            </div>
                  
            <div class="modal-body">
                <label class="colorLabel">EDITAR COLOR</label>
                <input type="text" name="color"  value="{{$perrito -> color}}" class="form-control" id="color" placeholder="Color">
            </div>

            <div class="modal-body">
                <label class="colorLabel">EDITAR RAZA</label>
                <input type="text" name="raza" value="{{$perrito -> raza }}" class="form-control" id="raza" placeholder="Raza">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary " onclick="actualizar()">ACTUALIZAR</button>
            </div>
        </form>
    </div>



    <script>
    
        //   <!----------------------------------------- ACTUALIZAR --------------------------------------->   

        function actualizar(){


            var idPr = $('#IdEditar').val();
            var nombrePr = $('#nombre').val();
            var colorPr = $('#color').val();
            var razaPr = $('#raza').val();

            parametros= {

                'id' : idPr,
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
                url : "{{route('perritos.actualizar')}}",
                type : "POST",
                data: parametros,
                success : function(data) {
                    toastr.success('Datos actualizados', 'Éxito!!', {
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
    </script>

@endsection()