<div class="block">

    <div class="block_head">
        <h2>User Management</h2>
    </div> <!--.block_head ends -->
    
    <div class="block_content">

        <table cellpadding="0" cellspacing="0" width="100%">

            <thead>

                <tr>
                    <th class="centered" >Sl.</th>                     
                    <th class="centered" >User Name</th>
                    <th class="centered" >Types</th>
                    <th class="centered" >Created Date</th>
                    <th class="centered" >Action</th>
                </tr>

            </thead>
            
            <tbody>
                <?php $cnt = 1; if (empty ($users)) : ?>

                <tr>
                    <td colspan="5" class="nodatamsg">No user founds.</td>
                </tr>

                <?php else : foreach($users AS $row) : ?>

                <tr>
                    <td class="centered"><?php echo $cnt++; ?></td>
                    <td class="centered"><?php echo $row['username']; ?></td>
                    <td class="centered"><?php echo $row['types']; ?></td>
                    <td class="centered"><?php echo DateHelper::mysqlToHuman($row['create_date']) ?></td>
                    <td class="centered">
                        <a href="<?php echo site_url("user/delete/id/{$row['user_id']}") ?>" id='delete'>Delete</a>
                    </td>
                </tr>

                <?php endforeach; endif ?>
                </tbody>
        </table>

        <div class="pagination right">
            <?php echo $this->pagination->create_links() ?>
        </div> <!--.pagination ends-->

    </div> <!--.block_content ends-->

</div> <!--.block ends-->
