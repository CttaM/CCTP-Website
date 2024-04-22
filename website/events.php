<?php

    function getEventPrice($eventName)
    {
        $price = 0;

        // Load the XML file
        $eventsXml = simplexml_load_file('events.xml');
    
        // Find the event node that matches the event name
        $eventNodes = $eventsXml->xpath("//Event[Event_name[starts-with(., '{$eventName}')]]");
    
        // If a matching event node is found, get the price
        if (count($eventNodes) > 0) {
            $price = (string)$eventNodes[0]->Price;
            
        } else{
            echo $eventNodes;;
        }
    
        return $price;
    }

?>