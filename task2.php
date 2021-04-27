<?php

function createFileWithSum(string $pathToFiles): void
{
   
    try {
        $file1 = fopen($pathToFiles.DIRECTORY_SEPARATOR."1.txt", "r");
        $file2 = fopen($pathToFiles.DIRECTORY_SEPARATOR."2.txt", "r");
        $file3 = fopen($pathToFiles.DIRECTORY_SEPARATOR."3.txt", "w");
    
        $result = "";
        $first = FALSE;
        if ($file1) {
            while (!feof($file1)) {
                if ($first) $result .= "\n";
                $result .= (string)((int)fgets($file1) + (int)fgets($file2));
                $first = TRUE;
            }
        }
        fwrite($file3, $result);
        fclose($file1);
        fclose($file2);
        fclose($file3);
    }
    catch (Exception $e) {
        
    }
}
