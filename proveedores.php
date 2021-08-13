<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud proveedor</title>
</head>
<body>
    <b> REGISTRO DE PROVEEDORES  </b>
    <form id="form1" name="form1" method="POST">
        @csrf
        <table width="400" border="0">
            <tr>
                <td> </td>
                <td>
                    <input name="txtIdProveedor" type="hidden" id="txtIdProveedor" />
                </td>
            </tr>
            <tr>
              <td width="80">Nit</td>
              <td width="225">
                <input name="txtNit" type="text" id="txtNit" />
              </td>
            </tr>
            <tr>
              <td width="80">Razon Social</td>
              <td width="225">
                <input name="txtRazonSocial" type="text" id="txtRazonSocial" />
              </td>
            </tr>
            <tr>
              <td width="80">Telefono</td>
              <td width="225">
                <input name="txtTelefono" type="text" id="txtTelefono" />
              </td>
            </tr>
            <tr>
              <td width="80">Direccion</td>
              <td width="225">
                <input name="txtDireccion" type="text" id="txtDireccion" />
              </td>
            </tr>
            
            

            <tr>
              <td colspan="2">
              <input type="submit" class="btnNuevo" id="btnNuevo"  value="Nuevo" />
              <input type="submit" class="btnGuardar" id="btnGuardar"  value="Guardar" />
              <input type="submit" class="btnModificar" id="btnModificar"  value="Modificar" />
              <input type="submit" class="btnEliminar" id="btnEliminar"  value="Eliminar" />
              <input type="submit" class="btnBuscar" id="btnBuscar"  value="Buscar"/>
             </td>
            </tr>

           <tr>
            <!-- busqueda por codigo y nombre -->
            <td colspan="2">
                Buscar por <input type="radio" name="grupo"  value="1" checked="checked"/>
                Codigo <input type="radio" name="grupo" value="2" />
                Nombre
                  <input name="txtBuscar" type="text" id="txtBuscar" size="33"/>
                </td>
            </tr>
          </table>
    </form>

    <table border="1" align="left">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nit</th>
          <th>Razon Social</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody id="tb1">

      </tbody>
    </table>
    
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript">
      function init(){
        listar('proveedors.id','');
      }

      //Función Listar
      function listar(criterio,buscar){
        $.ajax({
            url:'/proveedor',
            method: 'GET',
            data:{
              criterio: criterio,
              buscar: buscar
            }
        }).done(function(res){
            var arreglo = JSON.parse(res)
            $("#tb1").empty();
            for(var i=0;i<arreglo.length;i++){
                var todo='<tr>';
                  todo+='<td>'+arreglo[i].id+'</td>';
                  todo+='<td>'+arreglo[i].nit+'</td>';
                  todo+='<td>'+arreglo[i].razon_social+'</td>';
                  todo+='<td>'+arreglo[i].telefono+'</td>';
                  todo+='<td>'+arreglo[i].direccion+'</td>';
                 
                  todo+='<td><a href="#" onclick="editar(this)">Editar</a></td>';
                todo+='</tr>';
                $('#tb1').append(todo);
            }
        })
      }     
      
      function limpiar(){
        $("#txtIdProveedor").val('');
        $("#txtNit").val('');
        $("#txtRazonSocial").val('');
        $("#txtTelefono").val('');
        $("#txtDireccion").val('');
        
        $("#txtBuscar").val('');        
      } 

      $(".btnGuardar").click(function(e){      
        e.preventDefault(); //evitar recargar la pagina..
        var distribuidora = $("input[name=txtNit]").val();
        var nombre = $("input[name=txtRazonSocial]").val();
        var telefono = $("input[name=txtTelefono]").val();
        var direccion = $("input[name=txtDireccion]").val();
        

        $.ajax({
            url:'/proveedor/guardar',
            method: 'POST',
            data:{
              _token:$('input[name="_token"]').val(),
              nit:nit,
              nombre:nombre,
              telefono:telefono,
              direccion:direccion,
              
            }
        }).done(function(res){
          alert("Proveedor registrado!..");
          
        })
        $("#tb1").val('');
        listar('proveedors.id','');
        limpiar();
      });

      $(".btnEliminar").click(function(e){      
        e.preventDefault(); //evitar recargar la pagina..
        var id = $("input[name=txtIdProveedor]").val();

        $.ajax({
            url:'/proveedor/eliminar/'+id,
            method: 'DELETE',
            data:{
              _token:$('input[name="_token"]').val()
            }
        }).done(function(res){
          alert("Proveedor eliminado!..");
        })
        $("#tb1").val('');
        listar('proveedors.id','');
        limpiar();
      });

      $(".btnModificar").click(function(e){      
        e.preventDefault(); //evitar recargar la pagina..
        var id = $("input[name=txtIdProveedor]").val();
        var nit = $("input[name=txtNit]").val();
        var nombre = $("input[name=txtRazonSocial]").val();
        var telefono = $("input[name=txtTelefono]").val();
        var direccion = $("input[name=txtDireccion]").val();
        

        $.ajax({
            url:'/proveedor/modificar',
            method: 'PUT',
            data:{
              _token:$('input[name="_token"]').val(),
              id_proveedor:id_proveedor,
              nit:nit,
              razon_socia:razon_social,
              telefono:telefono,
              direccion:direccion,
             
            }
        }).done(function(res){
          alert("Cliente modificado!..");
          
        })
        $("#tb1").val('');
        listar('cliente.id','');
      });

      $(".btnNuevo").click(function(e){      
        e.preventDefault(); //evitar recargar la pagina..
        limpiar();
      });

      $(".btnBuscar").click(function(e){      
        e.preventDefault(); //evitar recargar la pagina..
        var opcion = $('input:radio[name=grupo]:checked').val();
        var buscar = $("input[name=txtBuscar]").val();
        var criterio = '';
        if(opcion==1){
          criterio='proveedors.id';
          listar(criterio,buscar);
        }
        else{
          criterio='proveedors.nombre';
          listar(criterio,buscar);
        }

      });

      function editar(nodo){
        var nodoTd = nodo.parentNode; //<td></td>
        var nodoTr = nodoTd.parentNode; //<tr></tr>
        var nodosEnTr = nodoTr.getElementsByTagName('td');

        var id = nodosEnTr[0].textContent; 
        var nombre = nodosEnTr[1].textContent;
        var telefono = nodosEnTr[2].textContent;
        var direccion = nodosEnTr[3].textContent; 
        var distribuidora = nodosEnTr[4].textContent;

        $("#txtIdProveedor").val(id_proveedor);
        $("#txtNit").val(nit);
        $("#txtRazon_social").val(razon_social);
        $("#txtTelefono").val(telefono);
        $("#txtDireccion").val(direccion);
        
      }

      init();
    </script>
</body>
</html>