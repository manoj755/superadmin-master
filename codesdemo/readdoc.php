<iframe src="https://docs.google.com/gview?url=http://api.passivereferral.com/resume/resume.docx&pid=explorer&efh=false&a=v&chrome=false&embedded=true" width="100%" height="500px"></iframe>
<div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;">&nbsp;</div>
<?php
exit();
$zip = new ZipArchive;
    $dataFile = 'word/document.xml';
    // Open received archive file
    if (true === $zip->open('E:\all working folder\passivereferral\controllerscode\controllermapping.docx')) {
        // If done, search for the data file in the archive
        if (($index = $zip->locateName($dataFile)) !== false) {
            // If found, read it to the string
            $data = $zip->getFromIndex($index);
            // Close archive file
            $zip->close();
            // Load XML from a string
            // Skip errors and warnings
            
            var_dump($data);
            $xml_handle = new DOMDocument();
            $xml = DOMDocument::loadXML($data,  LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            
            // Return data without XML formatting tags
            
            $contents = explode('\n',strip_tags($xml->saveXML()));
            $text = '';
            foreach($contents as $i=>$content) {
                $text .= $contents[$i];
            }
            echo $text;
        }
        $zip->close();
    }
    // In case of failure return empty string
    echo "";