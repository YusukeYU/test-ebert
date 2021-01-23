<?php   

namespace App\Tools;   


class Tools {

    public static function convertMoneyToDBDecimal($money){

        try {

            
        $val_product = preg_replace('/[^\d,\.]/', '', $money);
        $val_product = str_replace(',', '.', $val_product);
        
        $val_product =  explode(".", $val_product);

        $stringConcact = '';
            
            foreach($val_product as $key => $item){

                $count = count($val_product);

                if ($key == $count - 1){
                         $stringConcact = "$stringConcact.$item";   
                }
                else {
                    $stringConcact = $stringConcact.$item;
                }

            }

        }catch(\Exception $e){
            return $e->getMessage();
        }

        return $stringConcact;
    }
}
