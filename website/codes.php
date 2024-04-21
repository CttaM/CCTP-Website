<?php

function generateCode($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomCode = '';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomCode;
}   

    function addNewCode($userName, $ticketCount)
    {
            
        if (($ticketCount - getCodeCount($userName)*getTicketsPerCode()) >= getTicketsPerCode())
        {
            
            $code = generateCode(5);
            $file = fopen("codes.csv", "a");
            if ($file !== FALSE) {
                
                $codeData = array($userName, $code);
                fputcsv($file, $codeData);
                fclose($file);
            } else {
                echo "Error: Unable to open codes.csv";
            }
        }
        
    }

    function getCodes($userName)
    {
        $codes = array();
        $file = fopen("codes.csv", "r");
        if ($file !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                if($userName == $data[0])
                {
                    array_push($codes, $data[1]);
                }   
            }
            fclose($file);
        } else {
            echo "Error: Unable to open codes.csv";
        }
        return $codes;
    }

    function getCodeCount($userName)
    {
        $count = 0;
        $file = fopen("codes.csv", "r");
        if ($file !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                if($userName == $data[0])
                {
                    $count++;
                }   
            }
            fclose($file);
        } else {
            echo "Error: Unable to open codes.csv";
        }
        return $count;
    }

    function getReputation($userName, $ticketCount)
    {
        $rewards = getCodeCount($userName);
        $reputation = $ticketCount - $rewards*getTicketsPerCode();
        return $reputation;
    }

    function getTicketsPerCode()
    {
        return 6.0;
    }

?> 