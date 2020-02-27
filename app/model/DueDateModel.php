<?php


class DueDateModel
{
    private $scheduledDateId;
    private $todoId;
    private $date;
    private $startTime;
    private $endTime;

    public function setScheduledDateId($scheduledDateId)
    {
        $this->scheduledDateId = $scheduledDateId;
    }
    public function getScheduledDateId()
    {
        return $this->scheduledDateId;
    }

    public function setTodoId($todoId)
    {
        $this->todoId = $todoId;
    }
    public function getTodoId()
    {
        return $this->todoId;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }
    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }
    public function getEndTime()
    {
        return $this->endTime;
    }
}