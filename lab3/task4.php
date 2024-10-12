<?php
date_default_timezone_set('Europe/Kiev');
interface ILoger
{
    public function log($message); // defination an function which must be //redefined in the next class
}

class FileLoger implements ILoger
{
    private $file;
    private $logFile;

    public function __construct($filename, $mode = 'a')
    {
        $this->logFile = $filename;
        $this->file = fopen($filename, $mode) or die('Could not open the log file'); //open file or print an error
    }

    public function log($message)
    {  //redefination “log” function
        $message = date("F j, Y, g:i a") . ': ' . $message . "\n";
        fwrite($this->file, $message);
    }

    public function __destruct()
    {
        if ($this->file) {
            fclose($this->file);
        }
    }
}

$FLog = new FileLoger('./log.txt', 'w');
$FLog->log('log message');
$FLog->log('another log message');
?>