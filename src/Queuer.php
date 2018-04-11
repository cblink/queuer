<?php


namespace Cblink\Queuer;


use Illuminate\Support\Facades\Queue;

class Queuer
{

    private $connection;

    private $queue;

    /**
     * get delay list
     *
     * @param int $start
     * @param int $stop
     * @return array
     */
    public function getDelay($start = 0, $stop = -1)
    {
        return Queue::getRedis()
            ->connection($this->getConnection())
            ->zrange($this->getDelayKey(), $start, $stop, 'WITHSCORES');
    }

    /**
     * remove delay job by payload
     *
     * @param $payload
     * @return int
     */
    public function removeDelay($payload)
    {
        return Queue::getRedis()
            ->connection($this->getConnection())
            ->zrem($this->getDelayKey(), $payload);
    }

    /**
     * get queue delay key
     *
     * @return string
     */
    private function getDelayKey()
    {
        return 'queues:' . $this->getQueue() . ':delayed';
    }

    /**
     * set queue connection
     *
     * @param $connection
     * @return $this
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * get queue connection
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getConnection()
    {
        return $this->connection ?: config('queue.connections.redis.connection', 'default');
    }

    /**
     * set queue name
     *
     * @param $queue
     * @return $this
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * get queue name
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getQueue()
    {
        return $this->queue ?: config('queue.connections.redis.queue', 'default');
    }

}