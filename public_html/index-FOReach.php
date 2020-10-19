<?php include('header.php') ?>
<?php include('data.php') ?>


<div id="panel">
    <h1>todo list</h1>
    <div class="todo-list">
        <ul>
        <?php foreach ($todos as $key => $todo): ?>
            <li data-id="<?= $todo['id']?>" class= class="clearfix">
                <div class="checkbox"></div>
                <div class="content"><?= $todo['content'] ?></div>
                <div class="action">
                    <div class="edit">edit</div>
                    <div class="delete">x</div>                       
                </div>
            </li>
            <?php endforeach  ?>
            <li  class="clear-fix complete">
                <div class="checkbox"></div>
                <div class="content">2</div>
                <div class="action">
                    <div class="edit">edit</div>
                    <div class="delete">x</div>
                </div>

            </li>
            <li class="clearfix">
                <div class="checkbox"></div>
                <div class="content">3</div>
                <div class="action">
                    <div class="edit">edit</div>
                    <div class="delete">x</div>
                </div>     
       
            </li>
            <li class="new">
                <div class="checkbox"></div>
                <div class="content" contenteditable="true"></div>                              
            </li>
        </ul>

    </div>
</div>

</li>

<script id="todo-list-template" type="text/x-handlebars-template">
    <li data-id="{{id}}" class="{{#if is_complete}}complete{{/if}}">
        <div class="checkbox"></div>
        <div class="content">{{content}}</div>
        <div class="action">
            <div class="edit">edit</div>
            <div class="delete">x</div>
        </div>
</script>

<? include('footer.php')?>
