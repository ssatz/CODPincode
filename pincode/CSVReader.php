<?php


/***
 * Created by Satz for Prestashop
 * (sathish.thi@gmail)
 *
 */

if (!defined('_PS_VERSION_'))
    exit;
class CSVReader {

    /**
     * public filename
     * @var null
     */
    public  $fileName=null;
    protected  $path=null;
    protected  $headers =null;
    protected  $mode=null;
    protected  $csvFileobj=null;
    protected  $delimiter =",";
    protected $extAllowed =  array('csv');
    protected  $fileExtention =null;

    /**
     * @param $fileName
     * @param $path
     * @param string $mode
     * @param bool $headers
     */
    public function __construct( $fileName,$path,$mode = 'r+', $headers = true){
        $this->path =$path;
        $this->fileName=$fileName;
        $this->headers = $headers;
        $this->mode=$mode;
        $this->csvFileobj= new SplFileObject($this->path,$this->mode);
    }

    /**
     * Object destruction
     */
    public function __destruct()
    {
        $this->csvFileobj = null;
    }

    /**
     * Get all rows of CSV
     * @return array|bool
     */
    public function getRows()
    {
        $data = array();
        while ($row = $this->csvFileobj->fgetcsv($this->delimiter)) {
            $data[] =$row;
        };

        return $data;
    }

    /**
     * Validate the file upload
     * @return string
     */
    public  function iscsvUpload()
    {
        $this->fileExtention = pathinfo($this->fileName,PATHINFO_EXTENSION);
        if(empty($this->path) || !in_array($this->fileExtention,$this->extAllowed) || $this->csvFileobj->eof())
        {
            return false;
        }

        return true;
    }
}

/**
 *final Class CSVConst to hold
 * the constants
 */
final class CSVconst{
   const UPLOAD_ERROR = "Not a Valid File or Empty Rows";
}