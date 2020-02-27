<?php
class ToDoModel
{
    private $toDoId;
    private $taskName;
    private $scheduledTime;
    private $dueDates = array();

    public function setToDoId($toDoId){
        $this->toDoId = $toDoId;
    }
    public function getToDoId(){
        return $this->toDoId;
    }

    public function setTaskName($taskName){
        $this->taskName = $taskName;
    }
    public function getTaskName(){
        return $this->taskName;
    }

    public function setScheduledTime($scheduledTime){
        $this->scheduledTime = $scheduledTime;
    }
    public function getScheduledTime(){
        return $this->scheduledTime;
    }

    public function setDueDateTime($dueDates){
        $this->dueDates= $dueDates;
    }
    public function getDueDates(){
        return $this->dueDates;
    }
    public function addDueDate($dueDate){
        array_push($this->dueDates, $dueDate);
    }
    public function deleteDueDate($dueDateId){
        unset($this->dueDates[$dueDateId]);
    }
}