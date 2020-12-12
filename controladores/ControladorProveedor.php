<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<?php
require_once("../Modelo/Conexion.php"); //incluir la conexion 
require_once("../Modelo/Proveedor.php");
require_once("../Modelo/CRUDProveedor.php");

/*$Proveedor = new Proveedor();
$CRUDProveedor = new CRUDProveedor();
$ListarProveedor = $CRUDProveedor->ListaProveedor();*/


class Controlador{
    public function __construct(){}

    public function RegistrarProveedor(){

        $Proveedor = new Proveedor();
        $CRUDProveedor = new CRUDProveedor();
        $Proveedor->setIdProveedor($_POST["IdProveedor"]);
        $Proveedor->setNombre($_POST["Nombre"]);
        $Proveedor->setApellido($_POST["Apellido"]);
        $Proveedor->setCedula($_POST["Cedula"]);
        $Proveedor->setFechaNacimiento($_POST["FechaNacimiento"]);
        $Proveedor->setCelular($_POST["Celular"]);
        $Proveedor->setCorreo($_POST["Correo"]);
        $Proveedor->setEmpresa($_POST["Empresa"]);
        $Proveedor->setEstado($_POST["Estado"]);
        //var_dump($Proveedor);
        $CRUDProveedor->RegistrarProveedor($Proveedor);
  
    }

    public function EditarProveedor(){

        $Proveedor = new Proveedor();
        $CRUDProveedor = new CRUDProveedor();
        $Proveedor->setIdProveedor($_POST["IdProveedor"]);
        $Proveedor->setNombre($_POST["Nombre"]);
        $Proveedor->setApellido($_POST["Apellido"]);
        $Proveedor->setCedula($_POST["Cedula"]);
        $Proveedor->setFechaNacimiento($_POST["FechaNacimiento"]);
        $Proveedor->setCelular($_POST["Celular"]);
        $Proveedor->setCorreo($_POST["Correo"]);
        $Proveedor->setEmpresa($_POST["Empresa"]);
        $Proveedor->setEstado($_POST["Estado"]);
        //var_dump($Proveedor);
        $CRUDProveedor->EditarProveedor($Proveedor);
  
    }

    public function BuscarProveedor($IdProveedor){
        $Proveedor = new Proveedor();
        $CRUDProveedor = new CRUDProveedor();
        return $CRUDProveedor->BuscarProveedor($IdProveedor);

    }

    public function EliminarProveedor($IdProveedor){
        $Proveedor = new Proveedor();
        $CRUDProveedor = new CRUDProveedor();
        return $CRUDProveedor->EliminarProveedor($IdProveedor);

    }


    public function DesplegarVista($Ruta){
        require_once($Ruta);
    }
}

//isset funcion que determina si la variable existe
$Controlador = new Controlador();
if(isset($_GET["RegistrarProveedor"])){
    //Redirecciona hacia una pagina(Vista)
    $Controlador->DesplegarVista("../Vista/RegistrarProveedor.php");
    //header("Location:../Vista/RegistrarProveedor.php");
}
elseif(isset($_POST["RegistrarProveedor"])){
    $Controlador->RegistrarProveedor();
    echo "<script>
        Swal.fire({
            position:  'top',
            icon:  'success',
            title:  '¡Proveedor Registrado Exitosamente!'
        });
    </script>";

    $Controlador->DesplegarVista("../Vista/ListarProveedor.php");
    
    
}
elseif(isset($_GET["EditarProveedor"])){
    //Redirecciona hacia una pagina(Vista)
    $Controlador->DesplegarVista("../Vista/EditarProveedor.php");
    
}
elseif(isset($_POST["EditarProveedor"])){
    $Controlador->EditarProveedor();
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡Proveedor Modificado Exitosamente!'
    });
    </script>";

    $Controlador->DesplegarVista("../Vista/ListarProveedor.php");
    
}
elseif(isset($_GET["EliminarProveedor"])){
    //Redirecciona hacia una pagina(Vista)
    //$Controlador->EliminarProveedor($_GET["IdProveedor"]);
    echo $Controlador->EliminarProveedor($_GET["IdProveedor"]);
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡El Proveedor Ha Sido Eliminado!'
    });
    </script>";
    $Controlador->DesplegarVista("../Vista/ListarProveedor.php");
    
}

?>