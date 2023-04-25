<?php declare(strict_types=1);

class Csv
{   
    public $file_path;

    public function __construct(string $file_path) {
        $this->file_path = $file_path;
    }
    

    function open_file() : array{
        $csv_data = [];
        
        $file = fopen($this->file_path, 'r');
        while(($line = fgetcsv($file)) !== false){
            if(preg_match("/[a-z]/i", $line[3]))
                continue;
            $csv_data = array_merge($csv_data, $line);
        }
        fclose($file);
    
       
        return array_chunk(array: $csv_data, length: 4);
    }
    
    
}
