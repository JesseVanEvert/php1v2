<?php

class GroupModel
{
    private $groupId;
    private $groupName;
    private $groupMembers = array();
    private $groupTodoLists = array();

    public function setGroupId($groupId){
        $this->groupId = $groupId;
    }
    public function getGroupId(){
        return $this->groupId;
    }

    public function setGroupName($groupName){
        $this->groupName = $groupName;
    }
    public function getGroupName(){
        return $this->groupName;
    }

    public function setGroupMembers($groupMembers){
        $this->groupMembers = $groupMembers;
    }
    public function getGroupMembers(){
        return $this->groupMembers;
    }
    public function addGroupMember($member){
        array_push($this->groupMembers, $member);
    }
    public function deleteGroupMember($memberId){
        unset($this->groupMembers[$memberId]);
    }

    public function setGroupTodoLists($todoLists){
        $this->groupTodoLists = $todoLists;
    }
    public function getGroupTodoLists(){
        return $this->groupTodoLists;
    }
    public function addTodolist($todoList){
        array_push($this->groupTodoLists, $todoList);
    }
    public function deleteFromTodoLists($todoListId){
        unset($this->groupTodoLists[$todoListId]);
    }

}