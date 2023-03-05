<?php

namespace Dmitry\SweetchTest;

use PDO;

class DbCsvLoader
{
    private QueryBuilder $queryBuilder;
    private PDO $pdo;
    public function __construct(QueryBuilder $queryBuilder, PDO $pdo)
    {

        $this->queryBuilder = $queryBuilder;
        $this->pdo = $pdo;
    }

    /**
     * @return bool
     * @throws CannotOpenFileException
     * @throws FailedQueryException
     */
    public function load(): bool {
        foreach ($this->queryBuilder->buildQueries() as $query) {
            if (!$this->pdo->query($query)) {
                throw new FailedQueryException("Failed to execute query:\n$query");
            }
        }

        return true;
    }
}