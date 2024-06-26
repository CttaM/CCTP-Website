<?php
    
    function getTickets($userName)
    {
        //initialize array to store tickets
        $tickets = array();
        //open tickets.csv
        $file = fopen("tickets.csv", "r");
        if ($file !== FALSE) {
            //read file line by line
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //check if ticket belongs to user
                if($userName == $data[0])
                {
                    //add ticket to array
                    array_push($tickets, array($data[1], $data[2]));
                }   
            }
            fclose($file);
        } else {
            echo "Error: Unable to open tickets.csv";
        }
        //return array of tickets
        return $tickets;
    }


    function getTicketCount($userName)
    {
        //initialize count
        $count = 0;
        //open tickets.csv
        $file = fopen("tickets.csv", "r");
        if ($file !== FALSE) {
            //read file line by line
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //check if ticket belongs to user
                if($userName == $data[0])
                {
                    //increment count
                    $count+=$data[2];
                }   
            }
            fclose($file);
        } else {
            echo "Error: Unable to open tickets.csv";
        }
        //return count
        return $count;
    }

    function addTicket($userName, $eventName, $ticketQuantity)
    {
        //open tickets.csv
        $file = fopen("tickets.csv", "a");
        if ($file !== FALSE) {
            //write ticket data to file
            $ticketData = array($userName, $eventName, $ticketQuantity);
            fputcsv($file, $ticketData);
            fclose($file);
        } else {
            echo "Error: Unable to open tickets.csv";
        }
    }

    //{
    //     // Load the XML files
    //     $usersXml = simplexml_load_file('users.xml');
    //     $eventsXml = simplexml_load_file('events.xml');

    //     // Find the user node that matches the logged-in username
    //     $userNodes = $usersXml->xpath("//user[username='{$_SESSION['userName']}']");

    //     // If a matching user node is found, loop through the 'event' children
    //     if (count($userNodes) > 0) {
    //         foreach ($userNodes[0]->ticketTracker as $userEvent) {
    //             // Find the event node that matches the event name
    //             $eventNodes = $eventsXml->xpath("//event[eventName='{$userEvent->eventName}']");

    //             // If a matching event node is found, display the event name
    //             if (count($eventNodes) > 0) {
    //                 echo "<p>{$eventNodes[0]->eventName}</p>";
    //             }
    //         }
    //     }
    // }


?>