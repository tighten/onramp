<?php

namespace App\Concerns;

trait CanGenerateFile
{
    protected string $dirPath;

    /**
     * Create file if not exists.
     *
     * @param string $name
     * @param string $ext
     *
     * @return string Path to file.
     */
    public function createFile(string $name, string $ext): string
    {
        $path = $this->makePath($name, $ext);

        $this->createDir($path);

        return $path;
    }

    /**
     * Create file directory if not exists.
     *
     * @param string $path
     */
    public function createDir(string $path): void
    {
        $dir = dirname($path);

        if (! file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    /**
     * Get the full file path.
     *
     * @param string $fileName
     * @param string $fileExt
     *
     * @return string
     */
    public function makePath(string $fileName, string $fileExt): string
    {
        $file = str_replace('.', '/', $fileName) . ".{$fileExt}";

        return $this->dirPath . '/' . $file;
    }
}
