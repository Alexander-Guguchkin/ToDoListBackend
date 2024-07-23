<?php

namespace App\Contracts;

interface IntarfaceTask
{
    public function createTask();
    public function getTasks();
    public function getTask();
    public function getLastTask();
    public function editTask();
    public function deleteTask();
    public function completeTask();
}
