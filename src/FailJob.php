<?php


namespace Cblink\Queuer;


use Illuminate\Support\Facades\DB;

class FailJob
{

    protected $connection;

    protected $table;

    public function jobs($perPage = 20)
    {
        return DB::connection($this->getConnection())->table($this->getTable())->paginate($perPage);
    }

    public function delete($id)
    {
        return DB::connection($this->getConnection())->table($this->getTable())->delete($id);
    }

    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }

    protected function getConnection()
    {
        return $this->connection ?: config('queue.failed.database');
    }

    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    protected function getTable()
    {
        return $this->table ?: config('queue.failed.table');
    }

}