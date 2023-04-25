<?php declare(strict_types = 1);
require('csv.php');
class Accountant{
    private $data;

    public function __construct(array $data){
        $this->data = $data;
    }


    public function sum_expense() : int{
        $sum = 0;
        foreach($this->data as $info){
            $num = (int)str_replace('$','',$info[3]);
            if ($num < 0 ){
                 
                $sum += $num;
            }
            $num = 0;
        }
    
        return $sum;
    }
    
    public function sum_income() : int{
        $sum = 0;
        foreach($this->data as $info){
            $num = (int)str_replace('$','',$info[3]);
            if ($num > 0 ){
                 
                $sum += $num;
                //echo $info[3] . "\n";
            }
            $num = 0;
        }
        //$sum = prety_dolar_sign($sum);
        return $sum;
    }


    function total_sum():int{
        return $this->sum_income() + $this->sum_expense();
    }
    
    function prety_dolar_sign(int $int) : string{
     
        
        $str = (string)$int;
        if($int < 0 )
        $str = substr_replace($str, '$', 1, 0);
        else $str = '$'.$str;
    
    
        return $str;
    }


}

