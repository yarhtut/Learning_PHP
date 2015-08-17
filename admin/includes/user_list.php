<?php
/**
 * Created by PhpStorm.
 * User: Lumy
 * Date: 17/08/2015
 * Time: 8:57 PM
 */
?>

<?php if ($currentUser->hasAccess('add')): ?>

<?php endif; ?>




<table class="table table-hover table-bordered ">
    <thead>
    <tr>
        <td>Email address</td>
        <td>First name</td>
        <td>Last name</td>

        <td>Activated</td>
        <td>Last login</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    </thead>
    <tbody>



    <?php foreach ($users as $u): ?>
        <?php $userArr = $u->toArray(); ?>
        <tr>
            <td><?php echo $userArr['email']; ?></td>
            <td><?php echo isset($userArr['first_name']) ?
                    $userArr['first_name'] : '-'; ?></td>
            <td><?php echo isset($userArr['last_name']) ?
                    $userArr['last_name'] : '-'; ?></td>
            <td><?php echo isset($userArr['activated']) ?
                    ( ( $userArr['activated']== 1) ?'activated': 'unactivated') : '-'; ?></td>


            <td><?php echo isset($userArr['last_login']) ?
                    $userArr['last_login'] : '-'; ?></td>

            <?php if ($currentUser->hasAccess('edit')): ?>
                <td><a href="edit_user.php?id=<?php echo $userArr['id']; ?>">
                        Edit</a></td>
            <?php endif; ?>
            <?php if ($currentUser->hasAccess('delete')): ?>
                <td><a href="delete.php?id=<?php echo $userArr['id']; ?>">
                        Delete</a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

