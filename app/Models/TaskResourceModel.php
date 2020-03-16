<?php
class TaskResourceModel extends TaskRepository {
    public $Test;
    public function __construct()
    {
        $this->Test = $this->model("ResourceModel");
    }
}
?>
