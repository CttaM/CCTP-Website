<?php
// Open the CSV file
$handle = fopen("events.csv", "r");
// Create a new XML document
$doc = new DOMDocument();
$doc->formatOutput = true;
// Create the root element
$root = $doc->createElement("events");
$doc->appendChild($root);

// Loop through each line in the CSV file
while (($data = fgetcsv($handle, 1000, "|")) !== FALSE) {
    // Apply str_replace() to each field
    for ($i = 0; $i < count($data); $i++) {
        $data[$i] = str_replace("&", "&amp;", $data[$i]);
    }
    // Create a new XML element for this student
    $student = $doc->createElement("Event");
    // Add each field as a child element
    $name = $doc->createElement("Event_name", $data[0]);
    $student->appendChild($name);
    $age = $doc->createElement("Date", $data[1]);
    $student->appendChild($age);
    $grade = $doc->createElement("Location", $data[2]);
    $student->appendChild($grade);
    $grade = $doc->createElement("Tickets", $data[3]);
    $student->appendChild($grade);
    $grade = $doc->createElement("Tags", $data[4]);
    $student->appendChild($grade);
    // Append the student element to the root
    $root->appendChild($student);
}
// Save the XML document to a file
$doc->save("events.xml");
// Close the CSV file
fclose($handle);
?>