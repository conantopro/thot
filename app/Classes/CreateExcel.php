<?php

namespace App\Classes;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use App\Interfaces\CreateExcelInterface;
use Illuminate\Support\Facades\File;

class CreateExcel implements CreateExcelInterface
{
    public $headers;
    public $cells = array();
    public $path;

    public function writeExcel(string $path, string $file_name)
    {

        $this->path = $path.$file_name;

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        //createXLSXWriter(
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile($this->path);


        $headers = WriterEntityFactory::createRowFromArray($this->headers);
        $writer->addRow($headers);

        foreach ($this->cells as $value) {
            $row = WriterEntityFactory::createRowFromArray($value);
            $writer->addRow($row);
        }

        $writer->close();

    }

    public function setExcelHeaders(array $headers) : array
    {
        return $this->headers = $headers;
    }


    public function setRows(int $rowIndex, array $values)
    {
        $this->cells[$rowIndex] = $values;
    }

}
