<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Cliente.php");
require_once("../Modelo/CRUDCliente.php");

/*$Cliente = new Cliente();
$CRUDCliente= new CRUDCliente();
$ListarCliente = $CRUDCliente->ListaCliente();*/

class ControladorCliente{

    public function __construct(){}

    public function RegistrarCliente(){

        $Cliente = new Cliente();
        $CRUDCliente = new CRUDCliente();
        $Cliente->setIdCliente($_POST["IdCliente"]);
        $Cliente->setNombre($_POST["Nombre"]);
        $Cliente->setApellido($_POST["Apellido"]);
        $Cliente->setDireccion($_POST["Direccion"]);
        $Cliente->setCelular($_POST["Celular"]);
        $Cliente->setCorreo($_POST["Correo"]);

        //var_dump($Insumo);
        $CRUDCliente->RegistrarCliente($Cliente);
  
    }

    public function EditarCliente(){

        $Cliente = new Cliente();
        $CRUDCliente = new CRUDCliente();
        $Cliente->setIdCliente($_POST["IdCliente"]);
        $Cliente->setNombre($_POST["Nombre"]);
        $Cliente->setApellido($_POST["Apellido"]);
        $Cliente->setDireccion($_POST["Direccion"]);
        $Cliente->setCelular($_POST["Celular"]);
        $Cliente->setCorreo($_POST["Correo"]);

        //var_dump($Proveedor);
        $CRUDCliente->EditarCliente($Cliente);
  
    }

    
    public function BuscarCliente($IdCliente){
        $Cliente = new Cliente();
        $CRUDCliente = new CRUDCliente();
        return $CRUDCliente->BuscarCliente($IdCliente);

    }
    
    public function EliminarCliente($IdCliente){
        $Cliente = new Cliente();
        $CRUDCliente = new CRUDCliente();
        return $CRUDCliente->EliminarCliente($IdCliente);

    }


    public function DesplegarVista($RutaC){
        require_once($RutaC);
    }



}



$ControladorCliente = new ControladorCliente();
if(isset($_GET["RegistrarCliente"])){
    //Redirecciona hacia una pagina(Vista)
    $ControladorCliente->DesplegarVista("../Vista/RegistrarCliente.php");
    //header("Location:../Vista/RegistrarProveedor.php");
}
elseif(isset($_POST["RegistrarCliente"])){
    $ControladorCliente->RegistrarCliente();
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡Cliente Registrado Exitosamente!'
    });
</script>";

    $ControladorCliente->DesplegarVista("../Vista/ListarCliente.php");
    
}
elseif(isset($_GET["EditarCliente"])){
    //Redirecciona hacia una pagina(Vista)
    $ControladorCliente->DesplegarVista("../Vista/EditarCliente.php");
    //header("Location:../Vista/RegistrarProveedor.php");
}
elseif(isset($_POST["EditarCliente"])){
    $ControladorCliente->EditarCliente();
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡Cliente Modificado Exitosamente!'
    });
    </script>";
    $ControladorCliente->DesplegarVista("../Vista/ListarCliente.php");
    
}
elseif(isset($_GET["EliminarCliente"])){
    //Redirecciona hacia una pagina(Vista)
    //$Controlador->EliminarProveedor($_GET["IdProveedor"]);
    echo $ControladorCliente->EliminarCliente($_GET["IdCliente"]);
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡El Cliente Ha Sido Eliminado!'
    });
    </script>";
    $ControladorCliente->DesplegarVista("../Vista/ListarCliente.php");
    
}


?>