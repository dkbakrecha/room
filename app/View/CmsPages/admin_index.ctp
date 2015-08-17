<div class="warper container-fluid">
    <div class="page-header"><h1>Site Content <small>Site Static Content</small></h1></div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Site Content
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'add', 'admin' => true)); ?>'>Add Category</a>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Cms Type</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (!empty($cmsContant)) {
                            foreach ($cmsContant as $row) {
                                ?>
                                <tr>
                                    <td><?php echo __($row['CmsPage']['id']); ?></td>
                                    <td><?php echo __($row['CmsPage']['parent_key'] . " / " . $row['CmsPage']['unique_name']); ?></td>
                                    <td><?php echo __($row['CmsPage']['title']); ?></td>
                                    <td><?php echo substr(trim(strip_tags($row['CmsPage']['description'])), 0, 100); ?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'cms_pages', 'action' => 'edit', $row['CmsPage']['id'] )); ?>">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>