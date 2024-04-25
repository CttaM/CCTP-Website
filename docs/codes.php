<?php

function generateCode($length = 10)
{
    //define characters to use in code
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //get length of characters
    $charactersLength = strlen($characters);
    //initialize code
    $randomCode = '';
    //generate code
    for ($i = 0; $i < $length; $i++) {
        //add random character to code
        $randomCode .= $characters[rand(0, $charactersLength - 1)];
    }
    //return code
    return $randomCode;
}   

    function addNewCode($userName, $ticketCount)
    {
        //check if user has enough tickets to generate a new code    
        if (($ticketCount - getCodeCount($userName)*getTicketsPerCode()) >= getTicketsPerCode())
        {
            //generate new code
            $code = generateCode(5);
            //add code to codes.csv
            $file = fopen("codes.csv", "a");
            //check if file is open
            if ($file !== FALSE) {
                //write code to file
                $codeData = array($userName, $code, "valid");
                //write code to file
                fputcsv($file, $codeData);
                //close file
                fclose($file);
            } else {
                echo "Error: Unable to open codes.csv";
            }
        }
        
    }

    function getCodes($userName)
    {
        //initialize array to store codes
        $codes = array();
        //open codes.csv
        $file = fopen("codes.csv", "r");
        //check if file is open
        if ($file !== FALSE) {
            //read file line by line
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //check if code is valid and belongs to user
                if($userName == $data[0] && $data[2] == "valid")
                {
                    //add code to array
                    array_push($codes, $data[1]);
                }   
            }
            //close file
            fclose($file);
        } else {
            echo "Error: Unable to open codes.csv";
        }
        //return array of codes
        return $codes;
    }

    function getCodeCount($userName)
    {
        //initialize count
        $count = 0;
        //open codes.csv
        $file = fopen("codes.csv", "r");
        if ($file !== FALSE) {
            //read file line by line
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //check if code belongs to user
                if($userName == $data[0])
                {
                    //increment count
                    $count++;
                }   
            }
            //close file
            fclose($file);
        } else {
            echo "Error: Unable to open codes.csv";
        }
        //return count
        return $count;
    }

    function getReputation($userName, $ticketCount)
    {
        //calculate reputation
        $rewards = getCodeCount($userName);
        //calculate reputation
        $reputation = $ticketCount - $rewards*getTicketsPerCode();
        //return reputation
        return $reputation;
    }

    function getTicketsPerCode()
    {
        return 6.0;
    }

    function getNextCode($userName)
    {
        //initialize code
        $code = "";
        //open codes.csv
        $file = fopen("codes.csv", "r");
        if ($file !== FALSE) {
            // read file line by line
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //check if code is valid and belongs to user
                if($userName == $data[0] && $data[2] == "valid")
                {
                    //set code
                    $code = $data[1];
                    //break loop
                    break;
                }   
            }
            //close file
            fclose($file);
        } else {
            echo "Error: Unable to open codes.csv";
        }
        //return code
        return $code;
    }

    function removeCode($code)
    {
        //open codes.csv
        $file = fopen("codes.csv", "r");
        //open temp.csv
        $tempFile = fopen("temp.csv", "w");
        //check if files are open
        if ($file !== FALSE && $tempFile !== FALSE) {
            //read file line by line
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //check if code is not the one to be removed
                if($code == $data[1])
                {
                    //mark code as used
                    $data[2] = "used";
                } 
                //write code to temp file
                fputcsv($tempFile, $data);
            }
            //close files
            fclose($file);
            //close temp file
            fclose($tempFile);
            //remove codes.csv
            unlink("codes.csv");
            //rename temp.csv to codes.csv
            rename("temp.csv", "codes.csv");
        } else {
            echo "Error: Unable to open codes.csv";
        }
    }

?> 