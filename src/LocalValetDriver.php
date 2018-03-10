<?php

class LocalValetDriver extends LaravelValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        $gnuSocialIdentifier = "$sitePath/actions/apignusocialversion.php";
        return is_file($gnuSocialIdentifier);
    }

    public function isStaticFile($sitePath, $siteName, $uri)
    {
        if ($this->isActualFile($staticFilePath = $sitePath.$uri)) {
            return $staticFilePath;
        }
        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        $_SERVER['PATH_INFO'] = $uri;
        $_SERVER['SCRIPT_NAME'] = '/index.php';
        
        return $sitePath.'/index.php';
    }
}