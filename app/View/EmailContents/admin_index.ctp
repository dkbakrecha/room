<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Email Content
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'add', 'admin' => true)); ?>'>Add Category</a>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                    <thead>
                        <tr role="row" class="heading">
                            <th width="5%">Id</th>
                            <th width="20%">Title</th>
                            <th>Subject</th>
                            <th width="20%">Keyword</th>
                            <th width="5%">Actions</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($emailContent as $row) {
                            //pr($row);
                            ?>
                            <tr>
                                <td><?php echo $row['EmailContent']['id']; ?></td>
                                <td><?php echo $row['EmailContent']['title']; ?></td>
                                <td><?php echo $row['EmailContent']['subject']; ?></td>
                                <td><?php echo $row['EmailContent']['keywords']; ?></td>
                                <td><a href="<?php echo $this->Html->url(array('controller' => 'email_contents', 'action' => 'edit', $row['EmailContent']['id'])); ?>">Edit</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>