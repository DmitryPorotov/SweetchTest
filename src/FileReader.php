<?php

namespace Dmitry\SweetchTest;

class FileReader
{
    private string $filePath;
    private $handle;
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @throws CannotOpenFileException
     */
    public function openFile() {
        if (!($this->handle = fopen($this->filePath, 'r'))) {
            throw new CannotOpenFileException("Cannot open file '$this->filePath'");
        }
    }

    public function closeFile() {
        fclose($this->handle);
    }

    public function readLine(): ?string {
        if (false !== ($str = fgets($this->handle))) {
            return $str;
        }
        else return null;
    }
}
