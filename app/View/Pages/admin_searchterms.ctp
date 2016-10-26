<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Search Terms
        </div>
        <div class="panel-body">
            <div class="col-lg-4">
                <?php
                echo $this->Form->create('Searchterm');
                echo $this->Form->input('term',array(
                    'type' => 'textbox',
                    'class' => 'form-control',
                    'div' => 'form-group',
                    'required' => true
                ));
                echo $this->Form->submit('Save New Term',array('class' => 'btn'));
                echo $this->Form->end();
                ?>
            </div>
            <div class="col-lg-8"><table class="table table-bordered" id="">
                    <thead>
                        <tr>
                            <th width="15%">ID</th>
                            <th>Search Term</th>
                            <th width="20%">Search Count</th>
                            <th width="20%">Status</th>
                        </tr>
                    </thead>
                    <?php foreach ($termList as $row) { ?>
                        <tr>
                            <td><?php echo $row['Searchterm']['id']; ?></td>
                            <td><?php echo $row['Searchterm']['term']; ?></td>
                            <td><?php echo $row['Searchterm']['search_count']; ?></td>

                            <td>
                                <?php
                                if ($row['Searchterm']['status'] == 1) {
                                    ?><span class="btn btn-xs btn-success">Active</span><?php
                                } else {
                                    ?><span class="btn btn-xs btn-danger">Inactive</span><?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table></div>


        </div>
    </div>

</div>