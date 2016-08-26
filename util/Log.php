<?php
class Log {
    const GENERAL = 0;
    const DB = 1;

    public static function debug($message, $type=Log::GENERAL) {
        global $log_level;
        if ($log_level>4) { Log::write($message, 4, $type); }
    }

    public static function info($message, $type=Log::GENERAL) {
        global $log_level;
        if ($log_level>3) { Log::write($message, 4, $type); }
    }

    public static function warn($message, $type=Log::GENERAL) {
        global $log_level;
        if ($log_level>2) { Log::write($message, 3, $type); }
    }

    public static function error($message, $type=Log::GENERAL) {
        global $log_level;
        if ($log_level>1) { Log::write($message, 2, $type); }
    }

    public static function fatal($message, $type=Log::GENERAL) {
        global $log_level;
        if ($log_level>0) { Log::write($message, 1, $type); }
    }

    private static function write($message, $level=0, $type) {
        global $log_file, $database_log;

        if (is_array($message)) { $message = json_encode($message); }

        if ($type==Log::GENERAL) {
            $output_file = $log_file;
        } else if ($type==Log::DB) { 
            $output_file = $database_log;
        }

        $slevel = '';

        switch ($level) {
            case 5:
                $slevel = "DEBUG - ";
                break;
            case 4:
                $slevel = "INFO - ";
                break;
            case 3:
                $slevel = "WARN - ";
                break;
            case 2:
                $slevel = "ERROR - ";
                break;
            case 1:
                $slevel = "FATAL - ";
                break;
        }

        if (isset($output_file) && !empty($output_file))    {
            $log = fopen($output_file, 'a');
            fwrite($log, '['.date('Y-m-d H:i:s').'] '.$slevel.$message.PHP_EOL);
            fclose($log);
        }
        else {
            error_log($message);
        }
    }

    public static function access($message) {
        global $access_log;

        if (isset($access_log) && !empty($access_log))    {
            $body = '{  "REMOTE_ADDR":"'.        Log::getServerParam('REMOTE_ADDR').
                    '", "HTTP_X_FORWARDED_FOR":"'.Log::getServerParam('HTTP_X_FORWARDED_FOR').
                    '", "HTTP_CLIENT_IP":"'.     Log::getServerParam('HTTP_CLIENT_IP').
                    '", "REQUEST":"'.            $message.'"  }';
            $access = fopen($access_log, 'a');
            fwrite($access, '['.date('Y-m-d H:i:s').'] '.$body.PHP_EOL);
            fclose($access);
        }
        else {
            Log::warn('No access log file provided ...');
        }
    }

    private static function getServerParam($paramName) {
        return (isset($_SERVER[$paramName]) ? $_SERVER[$paramName] : '');
    }
}