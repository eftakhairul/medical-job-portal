<div class="block">

    <div class="block_head">
        <h2>User Management</h2>
    </div> <!--.block_head ends -->
    
    <div class="block_content">

        <table cellpadding="0" cellspacing="0" width="100%">

            <thead>

                <tr>
                    <th class="centered" width="5%">Sl.</th>
                    <th class="centered" width="25%">User Name</th>
                    <th class="centered" width="10%">Types</th>
                    <th class="centered" width="10%">Joined Date</th>
                    <th class="centered" width="50%" >Action</th>
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
                    <td class="centered"><?php echo DateHelper::mysqlToHuman($row['created_date']) ?></td>
                    <td class="centered">
                        <?php if($this->session->userdata('user_type') == APPLICANT): ?>
                        <a href="<?php echo site_url("applicant/editApplicant/{$row['user_id']}") ?>" >Edit Account</a> |
                        <?php else: ?>
                        <a href="<?php echo site_url("employer/editEmployer/{$row['user_id']}") ?>" >Edit Account</a> |
                        <?php endif; ?>
                        <a href="<?php echo site_url("user/delete/id/{$row['user_id']}") ?>" id='delete'>Delete</a> |
                        <a href="<?php echo site_url("auth/changePassword/{$row['user_id']}") ?>" id='delete'>Change Password</a>
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
