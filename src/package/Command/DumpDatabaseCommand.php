<?php

namespace YukataRm\Laravel\Package\Command;

use YukataRm\Laravel\Command\BaseCommand;

use YukataRm\Db\Proxies\Dumper;
use YukataRm\Db\Interfaces\Dumper\BaseDumperInterface;
use YukataRm\Db\Interfaces\Dumper\MySQLDumperInterface;

/**
 * Dump Database Command
 *
 * @package YukataRm\Laravel\Package\Command
 */
class DumpDatabaseCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "db:dump";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Dump database from config";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * database connection
     *
     * @var string
     */
    protected string $connection;

    /**
     * database host
     *
     * @var string
     */
    protected string $host;

    /**
     * database port
     *
     * @var int
     */
    protected int $port;

    /**
     * database name
     *
     * @var string
     */
    protected string $database;

    /**
     * database user
     *
     * @var string
     */
    protected string $user;

    /**
     * database password
     *
     * @var string
     */
    protected string $password;

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void
    {
        $this->connection = $this->getConnection();

        $this->host     = $this->getHost();
        $this->port     = $this->getPort();
        $this->database = $this->getDatabase();
        $this->user     = $this->getUser();
        $this->password = $this->getPassword();
    }

    /**
     * get database connection
     *
     * @return string
     */
    protected function getConnection(): string
    {
        return config("database.default");
    }

    /**
     * get database host
     *
     * @return string
     */
    protected function getHost(): string
    {
        return $this->getConfigProperty("host");
    }

    /**
     * get database port
     *
     * @return int
     */
    protected function getPort(): int
    {
        return (int)$this->getConfigProperty("port");
    }

    /**
     * get database name
     *
     * @return string
     */
    protected function getDatabase(): string
    {
        return $this->getConfigProperty("database");
    }

    /**
     * get database user
     *
     * @return string
     */
    protected function getUser(): string
    {
        return $this->getConfigProperty("username");
    }

    /**
     * get database password
     *
     * @return string
     */
    protected function getPassword(): string
    {
        return $this->getConfigProperty("password");
    }

    /**
     * get database connection config property
     *
     * @param string $property
     * @return mixed
     */
    protected function getConfigProperty(string $property): mixed
    {
        $connections = config("database.connections");

        $connection = $connections[$this->connection];

        return isset($connection[$property]) ? $connection[$property] : "";
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * Database Dumper instance
     *
     * @var \YukataRm\Database\Dumper\Interface\BaseDumperInterface|null
     */
    protected BaseDumperInterface|null $dumper;

    /**
     * dump result
     *
     * @var bool
     */
    protected bool $dumpResult;

    /**
     * run command process
     *
     * @return array<mixed>
     */
    protected function process(): array
    {
        $this->setDumper();

        $this->dumpDatabase();

        $this->outputInfo("Database dumped successfully.");

        return [$this->dumpResult, ["path" => $this->dumper->dumpFile()]];
    }

    /**
     * set Database Dumper
     *
     * @return void
     */
    protected function setDumper(): void
    {
        $this->dumper = match ($this->connection) {
            "mysql" => $this->mysqlDumper(),
        };
    }

    /**
     * get MySQL dumper
     *
     * @return \YukataRm\Database\Dumper\Interface\MySQLDumperInterface
     */
    protected function mysqlDumper(): MySQLDumperInterface
    {
        $driver = Dumper::mysql();

        $driver->setDatabase($this->database);

        if (!empty($this->host)) $driver->host($this->host);

        if (!empty($this->port)) $driver->port($this->port);

        if (!empty($this->user)) $driver->user($this->user);

        if (!empty($this->password)) $driver->password($this->password);

        $driver->setDumpFile($this->dumpFilePath());

        return $driver;
    }

    /**
     * get dump file path
     *
     * @return string
     */
    protected function dumpFilePath(): string
    {
        $directory = $this->dumpFileDirectory();

        $fileName = $this->dumpFileName();

        return storage_path("app/dump/{$directory}/{$fileName}");
    }

    /**
     * get dump file directory
     *
     * @return string
     */
    protected function dumpFileDirectory(): string
    {
        return $this->connection;
    }

    /**
     * get dump file name
     *
     * @return string
     */
    protected function dumpFileName(): string
    {
        $fileName = now()->format($this->dumpFileNameFormat());

        $extension = $this->dumpFileExtension();

        return "{$fileName}.{$extension}";
    }

    /**
     * get dump file name format
     *
     * @return string
     */
    protected function dumpFileNameFormat(): string
    {
        return "Y-m-d";
    }

    /**
     * get dump file extension
     *
     * @return string
     */
    protected function dumpFileExtension(): string
    {
        return "sql";
    }

    /**
     * dump database
     *
     * @return void
     */
    protected function dumpDatabase(): void
    {
        $this->dumpResult = $this->dumper->dump();
    }
}
