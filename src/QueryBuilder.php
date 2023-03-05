<?php


namespace Dmitry\SweetchTest;

use Generator;

class QueryBuilder
{
    private array $columnNames;
    private string $tableName;
    private int $linesPerQuery;
    private FileReader $fileReader;

    public function __construct(string $tableName, array $columnNames, int $linesPerQuery, FileReader $fileReader)
    {
        $this->tableName = $tableName;
        $this->columnNames = $columnNames;
        $this->linesPerQuery = $linesPerQuery;
        $this->fileReader = $fileReader;
    }

    /**
     * @return Generator
     * @throws CannotOpenFileException
     */
    public function buildQueries(): Generator
    {
        $this->fileReader->openFile();
        $this->fileReader->readLine();
        $columns = join(',', $this->columnNames);
        while (true) {
            $query = "insert into $this->tableName ($columns) values\n";
            for ($i = 0; $i < $this->linesPerQuery; ++$i) {
                if (null !== ($line = $this->fileReader->readLine())) {
                    $query .= "({$this->processString($line)}),\n";
                } else {
                    $this->fileReader->closeFile();
                    if ($i > 0) {
                        yield $this->finishQuery($query);
                    }
                    return;
                }
            }
            yield $this->finishQuery($query);
        }
    }

    private function finishQuery(string $query): string
    {
        $query = rtrim($query, ",\n");
        return $query . ';';
    }

    private function processString(string $str): string
    {
        $str = rtrim($str, "\r\n");
        $arr = explode(',', $str);
        foreach ($arr as &$value) {
            if ($value === '..C') {
                $value = "'0'";
            } else {
                $value = str_replace("'", "\\'", $value);
                $value = "'$value'";
            }
        }
        return join(',', $arr);
    }
}
