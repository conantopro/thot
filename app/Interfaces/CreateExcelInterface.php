<?php
namespace App\Interfaces;

interface CreateExcelInterface{
    public function writeExcel(string $path, string $file_name);
    public function setExcelHeaders(array $headers) : array;
    public function setRows(int $rowIndex,array $values);
}