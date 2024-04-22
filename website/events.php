<?php

    function getEventPrice($eventName)
    {
        $price = 0;
        $file = fopen("events.csv", "r");
        if ($file !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                if($eventName == $data[0])
                {
                    $price = $data[1];
                }   
            }
            fclose($file);
        } else {
            echo "Error: Unable to open events.csv";
        }
        return $price;
    }

?>