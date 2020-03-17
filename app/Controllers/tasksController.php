<?php
namespace App\Controllers;

require "../vendor/autoload.php";

use App\Core\Controller;
use App\Models\Task ;
use App\Models\TaskModel;

class tasksController extends Controller
{
    function index()
    {
        // require(ROOT . 'app/Models/Task.php');

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
        //    require(ROOT . 'app/Models/Task.php');

            $task= new Task(); // title trong, desctip


            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        // require(ROOT . 'app/Models/Task.php');
        $task= new Task();
//        $task->set('title', 'title');
//        $task->set('description', 'fdsfds');
//
//
//       $title =  $task->get('title'); // title
//
//        $task->title = 'ok';
//        $task->description = 'ok1';
//        $task->action = '2';
//
//        print_r($task->getProperties());die;
//        $abc = new TaskModel('Title','Task');
//        $abc->set('anc','ABC');
//        echo $abc->get('');die();

        $d["task"] = $task->showTask($id);

//        $pẻopẻtie = $task->getProperties(); // ['id' => 1, 'task' => task1, ///]


        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
    //    require(ROOT . 'app/Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>