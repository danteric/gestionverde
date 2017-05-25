<?php

 
class Helper
{
    private static $instancia;


    public function __construct() {
    }
    static public function imgAttach($url_base, $attr=array())
    {
      $file = sprintf("%s/%s", $_SERVER["DOCUMENT_ROOT"], $url_base);
      if(!file_exists($file)):
        throw new Exception("no existe archivo $file");
      endif;
      $fattr = function($attr)
      {
        $hattr = '';
        foreach ($attr as $key => $value) {
          $hattr .= "$key=\"$value\" ";
        }
        return $hattr;
      };
      return sprintf('<img src="data:%s;base64,%s" %s>', 'image/png', base64_encode(file_get_contents($file)), $fattr($attr));
    }

    static public function goToPDF($file, $page='A4',$orient='Portrait', $header_html=null)
    {
      if($header_html):
        $url = 'Location: /%s?file=%s&page=%s&orient=%s&header=%s';
      else:
        $url = 'Location: /%s?file=%s&page=%s&orient=%s%s';
      endif;
      //var_dump($header_html);exit;
      $header = sprintf($url, 'html2pdf.php', $file, $page, $orient, $header_html);
      //echo $header;
      //exit;
      header($header);
      flush();
      exit();
    }

    static public function html2Pdf($content, $page='A4', $orient='Portrait', $header_html=null)
    {
      self::goToPdf(self::saveReportHTML($content), $page, $orient, $header_html);
    }

    /**
    * @return string
    */ 
    static public function saveReportHTML($content)
    {
      $file = sprintf('pdf/%s.html', uniqid());
      file_put_contents($_SERVER["DOCUMENT_ROOT"].'/'.$file, $content);
      return $file;
    }
    /**
     *
     * @return Helper
     */
    public static function getInstance() {
      if (  !self::$instancia instanceof self)
      {
         self::$instancia = new self;
      }
      return self::$instancia;
    }



    public function buildStoreProcedureCall($sp_name, $params) {
        $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".".$sp_name."(";
        foreach($params as $param) {
            $sql .= $param.",";
        }
        $sql .= ":data); end;";

        return $sql;
    }

    public function validarRespuesta($response) {
        $errors = array();
        if($response == 'OK') {
        } else {
            array_push($errors, nl2br($response));
        }
        return $errors;
    }

    /**
    * Convierte el value de un checkbox a true or false
    *
    * @param type $param
    * @return string
    */
   public function convertirCheckBox($param='') {
           if($param == "on" || $param == 1) {
                   $param = "S";
           } else {
                   $param = "N";
           }
           return $param;
   }


   public function getRazon($entidad){

    $tipo_cliente = $entidad['ENTI_TIPE_CODIGO'];
    $razon=$entidad['CLIENTE_SIST_EXT'];


    switch ($tipo_cliente) {
        case "PJ":
            $razon = $razon. " - ".$entidad['ENTI_RAZON_SOCIAL'];
            break;
        case "PF":
            $razon = $razon. " - ".$entidad['ENTI_APELLIDO'].",".$entidad['ENTI_NOMBRE'];
            break;
        case "OP":
            $razon = $razon. " - ".$entidad['ENTI_NOMBRE_ORG'];
            break;
        default:
            $razon = $razon. " - ".$entidad['ENTI_APELLIDO']+" "+$entidad['ENTI_NOMBRE'];

    }

    return $razon;
   }

    /**
     * Export to pdf from a content html variable
     * @param type $content
     */
    public function generatePdf($content,$file_name, $flip='P', $format='A4', $lang='es') {
        require_once 'html2pdf.class.php';
        require_once 'fpdi2tcpdf_bridge.php';
        require_once 'fpdi.php';
        require_once 'concat_pdf.class.php';
        //require_once 'fpdi.php';
        try
        {
            ob_end_clean();
            $html2pdf = new HTML2PDF($flip, $format, $lang);
            $html2pdf->writeHTML($content);
            $html2pdf->Output($file_name);
            exit;
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    /**
     * Export to pdf from a content html variable
     * @param type $content
     */
    public function generatePdfToFile($content,$file_name, $flip='P', $format='A4', $lang='es') {
        require_once 'html2pdf.class.php';
        require_once 'fpdi2tcpdf_bridge.php';
        require_once 'fpdi.php';
        require_once 'concat_pdf.class.php';
        //require_once 'fpdi.php';
        try
        {
            
            $html2pdf = new HTML2PDF($flip, $format, $lang);
            $html2pdf->writeHTML($content);
            $html2pdf->Output($_SERVER["DOCUMENT_ROOT"].'/pdf/'.$file_name, 'F');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }


    public function uploadFile() {
        $response = array();
        $target_path = "uploads/";

        $target_path = $target_path . basename( $_FILES['uploaded_file']['name']);

        //Сheck that we have a file
        if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
            //Check if the file is JPEG image and it's size is less than 350Kb
            $filename = basename($_FILES['uploaded_file']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            //($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg")
            if (($_FILES["uploaded_file"]["size"] < 35000000)) {
              //Determine the path to which we want to save this file
                $newFilename = rand(0, 9999)."_".$filename;
                $newname = dirname(__FILE__).'/../../web/upload/'.$newFilename;
                //Check if the file with the same name is already exists on the server
                if (!file_exists($newname)) {
                  //Attempt to move the uploaded file to it's new place
                  if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
                     $response[0] = 1;
                     $response[1] = $newFilename;
                     $response[2] = '/web/upload/'.$newFilename;;
                  } else {
                    $response[0] = 0;
                    $response[1] = "Error!";;
                  }
                } else {
                    $response[0] = 0;
                    $response[1] = "Error! fichero existente";
                }
            } else {
                $response[0] = 0;
                $response[1] = "Error! Tamaño fichero";
            }
        } else {
            $response[0] = 0;
            $response[1] = "Error! Fichero inexistente";
        }

        return $response;

    }

 public function uploadFileRequer($fila) {
        $response = array();
        $target_path = "uploads/";
        $target_path = $target_path . basename( $_FILES['uploaded_file']['name']);
        if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
            $filename = basename($_FILES['uploaded_file']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            if (($_FILES["uploaded_file"]["size"] < 35000000)) {
                $newFilename = rand(0, 9999)."_".$filename;
                $newname = dirname(__FILE__).'/../../web/upload/'.$newFilename;
                if (!file_exists($newname)) {
                  if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
                     $response[0] = 1;
                     $response[1] = $newFilename;
                     $response[2] = '/web/upload/'.$newFilename;;
                  } else {
                    $response[0] = 0;
                    $response[1] = "Error!";;
                  }
                } else {
                    $response[0] = 0;
                    $response[1] = "Error! fichero no existe";
                }
            } else {
                $response[0] = 0;
                $response[1] = "Error! TamaÃ±o fichero";
            }
        } else {
            $response[0] = 0;
            $response[1] = "Error! Fichero no existe";
        }
        return $response;
    }
    public function uploadFilePedidoInformacion($fila) {
        $response = array();
        $target_path = "uploads/";
        $target_path = $target_path . basename( $_FILES['uploaded_file2']['name']);
        if((!empty($_FILES["uploaded_file2"])) && ($_FILES['uploaded_file2']['error'] == 0)) {
            $filename = basename($_FILES['uploaded_file2']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            if (($_FILES["uploaded_file2"]["size"] < 35000000)) {
                $newFilename = rand(0, 9999)."_".$filename;
                $newname = dirname(__FILE__).'/../../web/upload/'.$newFilename;
                if (!file_exists($newname)) {
                  if ((move_uploaded_file($_FILES['uploaded_file2']['tmp_name'],$newname))) {
                     $response[0] = 1;
                     $response[1] = $newFilename;
                     $response[2] = '/web/upload/'.$newFilename;;
                  } else {
                    $response[0] = 0;
                    $response[1] = "Error!";;
                  }
                } else {
                    $response[0] = 0;
                    $response[1] = "Error! fichero no existe";
                }
            } else {
                $response[0] = 0;
                $response[1] = "Error! Tamaño fichero";
            }
        } else {
            $response[0] = 0;
            $response[1] = "Error! Fichero no existe";
        }
        return $response;
    }

    public function getMascaraCuit($pais='AR', $formName, $inputName) {
        $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".GET_PAISES_RS (null,'".$pais."', :data); end;";

        $cuit = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $mascara = $cuit[0]['MASK_CUIT'];
        return 'oStringMask = new Mask("'.$mascara.'");
                oStringMask.attach(document.'.$formName.'.'.$inputName.');
                $(".mascaraCuitLabel").html("'.$cuit[0]['CUIT_DENOMINA'].'");';

    }




}