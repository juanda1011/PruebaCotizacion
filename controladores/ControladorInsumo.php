<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Insumo.php");
require_once("../Modelo/CRUDInsumo.php");

/*$Insumo = new Insumo();
$CRUDInsumo = new CRUDInsumo();
$ListarInsumo = $CRUDInsumo->ListaInsumo();*/

class ControladorInsumo{

    public function __construct(){}

    public function RegistrarInsumo(){

        $Insumo = new Insumo();
        $CRUDInsumo = new CRUDInsumo();
        $Insumo->setIdInsumo($_POST["IdInsumo"]);
        $Insumo->setNombre($_POST["Nombre"]);
        $Insumo->setProveedor($_POST["Proveedor"]);
        $Insumo->setCantidad($_POST["Cantidad"]);
        $Insumo->setValorEstimado($_POST["ValorEstimado"]);

        //var_dump($Insumo);
        $CRUDInsumo->RegistrarInsumo($Insumo);
  
    }

    public function EditarInsumo(){

        $Insumo = new Insumo();
        $CRUDInsumo = new CRUDInsumo();
        $Insumo->setIdInsumo($_POST["IdInsumo"]);
        $Insumo->setNombre($_POST["Nombre"]);
        $Insumo->setProveedor($_POST["Proveedor"]);
        $Insumo->setCantidad($_POST["Cantidad"]);
        $Insumo->setValorEstimado($_POST["ValorEstimado"]);

        //var_dump($Proveedor);
        $CRUDInsumo->EditarInsumo($Insumo);
  
    }

    public function BuscarInsumo($IdInsumo){
        $Insumo = new Insumo();
        $CRUDInsumo = new CRUDInsumo();
        return $CRUDInsumo->BuscarInsumo($IdInsumo);

    }

    public function EliminarInsumo($IdInsumo){
        $Insumo = new Insumo();
        $CRUDInsumo = new CRUDInsumo();
        return $CRUDInsumo->EliminarInsumo($IdInsumo);

    }

    public function DesplegarVista($Rutai){
        require_once($Rutai);
    }

}


$ControladorInsumo = new ControladorInsumo();
if(isset($_GET["RegistrarInsumo"])){
    //Redirecciona hacia una pagina(Vista)
    $ControladorInsumo->DesplegarVista("../Vista/RegistrarInsumo.php");
    //header("Location:../Vista/RegistrarProveedor.php");
}
elseif(isset($_POST["RegistrarInsumo"])){
    $ControladorInsumo->RegistrarInsumo();
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡Insumo Registrado Exitosamente!'
    });
    </script>";

    $ControladorInsumo->DesplegarVista("../Vista/ListarInsumo.php");
    
}
elseif(isset($_GET["EditarInsumo"])){
    //Redirecciona hacia una pagina(Vista)
    $ControladorInsumo->DesplegarVista("../Vista/EditarInsumo.php");
    //header("Location:../Vista/RegistrarProveedor.php");
}
elseif(isset($_POST["EditarInsumo"])){
    $ControladorInsumo->EditarInsumo();
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡Insumo Modificado Exitosamente!'
    });
    </script>";
    $ControladorInsumo->DesplegarVista("../Vista/ListarInsumo.php");
    
}
elseif(isset($_GET["EliminarInsumo"])){
    //Redirecciona hacia una pagina(Vista)
    //$Controlador->EliminarProveedor($_GET["IdProveedor"]);
    echo $ControladorInsumo->EliminarInsumo($_GET["IdInsumo"]);
    echo "<script>
    Swal.fire({
        position:  'top',
        icon:  'success',
        title:  '¡El Insumo Ha Sido Eliminado!'
    });
    </script>";
    $ControladorInsumo->DesplegarVista("../Vista/ListarInsumo.php");
    
}


?>