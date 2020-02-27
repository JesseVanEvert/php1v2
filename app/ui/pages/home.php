<?php
require APPROOT . '/ui/inc/header.php';
require APPROOT . '/ui/inc/navigation.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="todolist not-done">
             <h1>Todos</h1>
                    <input type="text" class="form-control add-todo" placeholder="Add todo">
                    <button id="addTask" class="btn btn-success">Add</button>
                    <button id="checkAll" class="btn btn-success">Mark all as done</button>
                    <hr>
                    <ul id="sortable" class="list-unstyled">
                    <li class="ui-state-default">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" class="item" />Take out the trash</label>
                        </div>
                    </li>

                    <li class="ui-state-default">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Buy bread</label>
                        </div>
                    </li>
                    <li class="ui-state-default">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Teach penguins to fly</label>
                        </div>
                    </li>
                </ul>
                <div class="todo-footer">
                    <strong><span class="count-todos"></span></strong> Items Left
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="todolist">
             <h1>Already Done</h1>
                <ul id="done-items" class="list-unstyled">
                    <li>Some item <button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button></li>

                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="todolist">
                <h1>Search users</h1>
                <input type="text" class="form-control search-user" placeholder="Name or email">
                <button id="searchUserButton" class="btn">search</button>
            </div>
        </div>
    </div>
</div>

<?php
require APPROOT . '/ui/inc/footer.php';
?>