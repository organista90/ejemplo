<?php
session_start();
require_once("../db/conexion.php");

class ModelAudiencia {
    
    public $conexion;
    public $consulta2;


    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    public function __datos_filtros($id_region, $fecha_inicial, $fecha_final) {
        
        $consulta = "select * from agendaconsulta, distrito, region where agendaconsulta.agendaconsultadistrito=distrito.distritoid and distrito.distritoregion=regionid";
        
        if(($id_region == 0) && ($fecha_inicial == 0) && ($fecha_final == 0)) {
            $consulta.=" and agendaconsulta.agendaconsultafecha>='".$fecha = date("y-m-d")."' order by agendaconsulta.agendaconsultafecha, agendaconsulta.agendaconsultahora asc";
            $registro = mysqli_query($this->conexion->__abrir_conexion(), $consulta);
        } else {
            if(($fecha_inicial!=0) && ($fecha_final==0)) {
                $fecha_final = $fecha_inicial;
                $consulta.=" AND agendaconsulta.agendaconsultafecha BETWEEN '".$fecha_inicial."' AND '".$fecha_final."' ";
                $registro = mysqli_query($this->conexion->__abrir_conexion(), $consulta);    
            } else if(($fecha_inicial==0) && ($fecha_final!=0)) {
                $fecha_inicial = $fecha_final;
                $consulta.=" AND agendaconsulta.agendaconsultafecha BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
                $registro = mysqli_query($this->conexion->__abrir_conexion(), $consulta);
            } else if(($fecha_inicial!=0) && ($fecha_final!=0)) {
                $consulta.=" AND agendaconsulta.agendaconsultafecha BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
                $registro = mysqli_query($this->conexion->__abrir_conexion(), $consulta);
            } else {
                $consulta.=" and agendaconsulta.agendaconsultafecha>='".$fecha = date("y-m-d")."' ";
                $registro = mysqli_query($this->conexion->__abrir_conexion(), $consulta);                       
            }
        }
        
        if($id_region!=0) {
            $consulta.=" and region.regionid = '".$id_region."'order by agendaconsulta.agendaconsultafecha, agendaconsulta.agendaconsultahora asc";
            $registro = mysqli_query($this->conexion->__abrir_conexion(), $consulta);
        }
        
         
        $i=1;
        $tabla = "";

        while($row = mysqli_fetch_array($registro)) {
            $tabla.='{"id":"'.$i.'","ndistrito":"'.$row['DistritoNombre'].'","udistrito":"'.$row['DistritoUbicacion'].'","acf":"'.$row['AgendaConsultaFecha'].'","ach":"'.$row['AgendaConsultaHora'].'","acs":"'.$row['AgendaConsultaSala'].'","acnc":"'.$row['AgendaConsultaNoCausa'].'","acta":"'.utf8_encode($row['AgendaConsultaTipoAudiencia']).'"},';
            $i++;
        }

        $tabla = substr($tabla,0, strlen($tabla) - 1);
        
        $_SESSION['consulta'] = $consulta;
        
        return '{"data":['.$tabla.']}';
    }
    
    public function __generar_estadistica() {
        
        $multi = 0;$multi2 = 0;$multi3 = 0;$multi4 = 0;$multi5 = 0;$multi6 = 0;$multi7 = 0;$multi8 = 0;$multi9 = 0;$multi10 = 0;$multi11 = 0;$multi12 = 0;$multi13 = 0; $multi14 = 0; $multi15 = 0; $multi16 = 0;$multi17 = 0; $multi18 = 0;$contador = 0;
        
        $result = mysqli_query($this->conexion->__abrir_conexion(), $_SESSION['consulta']);
        
        $tabla = "";
        $resultados = mysqli_num_rows($result);
                
        while($row = mysqli_fetch_array($result)) {
            
            $totaldistrito2=$row['AgendaConsultaDistrito'];
            
            
            switch ($totaldistrito2) {
                case "1":
                    $multi += 1;
                    $nombred1=utf8_decode($row['DistritoNombre']);
                    break;
                case "2":
                    $multi2 += 1;
                    $nombred2=utf8_encode($row['DistritoNombre']);
                    break;
                case "3":
                    $multi3 += 1;
                    $nombred3=  utf8_decode($row['DistritoNombre']);
                    break;
                case "4":
                    $multi4 += 1;
                    $nombred4=  utf8_decode($row['DistritoNombre']);
                    break;
                case "5":
                    $multi5 += 1;
                    $nombred5=  utf8_decode($row['DistritoNombre']);
                    break;
                case "6":
                    $multi6 += 1;
                    $nombred6=  utf8_decode($row['DistritoNombre']);
                    break;
                case "7":
                    $multi7 += 1;
                    $nombred7=  utf8_decode($row['DistritoNombre']);
                    break;
                case "8":
                    $multi8 += 1;
                    $nombred8=  utf8_decode($row['DistritoNombre']);
                    break;
                case "9":
                    $multi9 += 1;
                    $nombred9=  utf8_decode($row['DistritoNombre']);
                    break;
                case "10":
                    $multi10 += 1;
                    $nombred10=  utf8_decode($row['DistritoNombre']);
                    break;
                case "11":
                    $multi11 += 1;
                    $nombred11=  utf8_decode($row['DistritoNombre']);
                    break;
                case "12":
                    $multi12 += 1;
                    $nombred12=  utf8_decode($row['DistritoNombre']);
                    break;
                case "13":
                    $multi13 += 1;
                    $nombred13=  utf8_decode($row['DistritoNombre']);
                    break;
                case "14":
                    $multi14 += 1;
                    $nombred14=  utf8_decode($row['DistritoNombre']);
                    break;
                case "15":
                    $multi15 += 1;
                    $nombred15=  utf8_decode($row['DistritoNombre']);
                    break;
                case "16":
                    $multi16 += 1;
                    $nombred16=  utf8_decode($row['DistritoNombre']);
                    break;
                case "17":
                    $multi17 += 1;
                    $nombred17=  utf8_decode($row['DistritoNombre']);
                    break;
                case "18":
                    $multi18 += 1;
                    $nombred18=  utf8_decode($row['DistritoNombre']);
                break;
            }
        }
        
        if($multi!=0){
            $tabla.='["'.$nombred1.' '.$multi.'",'.$multi.'],';
        } if($multi2!=0) {
            $tabla.='["'.$nombred2.' '.$multi2.'",'.$multi2.'],';
        } if($multi3!=0) {
            $tabla.='["'.$nombred3.' '.$multi3.'",'.$multi3.'],';
        } if($multi4!=0) {
            $tabla.='["'.$nombred4.' '.$multi4.'",'.$multi4.'],';
        } if($multi5!=0) {
            $tabla.='["'.$nombred5.' '.$multi5.'",'.$multi5.'],';
        } if($multi6!=0) {
            $tabla.='["'.$nombred6.' '.$multi6.'",'.$multi6.'],';
        } if($multi7!=0) {
            $tabla.='["'.$nombred7.' '.$multi7.'",'.$multi7.'],';
        } if($multi8!=0) {
            $tabla.='["'.$nombred8.' '.$multi8.'",'.$multi8.'],';
        } if($multi9!=0) {
            $tabla.='["'.$nombred9.' '.$multi9.'",'.$multi9.'],';
        } if($multi10!=0) {
            $tabla.='["'.$nombred10.' '.$multi10.'",'.$multi10.'],';
        } if($multi11!=0) {
            $tabla.='["'.$nombred11.' '.$multi11.'",'.$multi11.'],';
        } if($multi12!=0) {
            $tabla.='["'.$nombred12.' '.$multi12.'",'.$multi12.'],';
        } if($multi13!=0) {
            $tabla.='["'.$nombred13.' '.$multi13.'",'.$multi13.'],';
        } if($multi14!=0) {
            $tabla.='["'.$nombred14.' '.$multi14.'",'.$multi14.'],';
        } if($multi15!=0) {
            $tabla.='["'.$nombred15.' '.$multi15.'",'.$multi15.'],';
        } if($multi16!=0) {
            $tabla.='["'.$nombred16.' '.$multi16.'",'.$multi16.'],';
        } if($multi17!=0) {
            $tabla.='["'.$nombred17.' '.$multi17.'",'.$multi17.'],';
        } if($multi18!=0) {
            $tabla.='["'.$nombred18.' '.$multi18.'",'.$multi18.'],';
        }
        
        if($resultados==0){
            // $tabla.="Sin Datos Encontrados";
           // echo "sin resultados";
            $tabla.='["SIN DATOS ENCONTRADOS '.$resultados.'",0],';
              
   
        }
        
        
        $tabla = substr($tabla,0, strlen($tabla) - 1);
        
        session_destroy();
         
        return '['.$tabla.']';
        
       
    }
}