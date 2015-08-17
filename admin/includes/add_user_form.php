<?php
/**
 * Created by PhpStorm.
 * User: Lumy
 * Date: 17/08/2015
 * Time: 10:08 PM
 */
?>


    <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

        <div class="form-group">
            <label class="text-info" for="email">Eail address:</label>
            <input type="text" class="form-control" name="email" value="" >

        </div>
        <div class="form-group">
            <label class="text-info" for="password">Password:</label>
            <input type="password" class="form-control" name="password" value="">

        </div>

        <div class="form-group">
            <label class="text-info" for="first_name">First name:</label>
            <input type="password" class="form-control" name="first_name" value="">

        </div>

        <div class="form-group">
            <label class="text-info" for="last_name">Last name:</label>
            <input type="password" class="form-control" name="last_name" value="">

        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="perms[watch]" value="1" />Watch Video
            </label>
            <label>
                <input type="checkbox" name="perms[view]" value="1" />View Admin Dashboard
            </label>
            <label>
                <input type="checkbox" name="perms[add]" value="1" />Add
            </label>
            <label>
                <input type="checkbox" name="perms[edit]" value="1" />Edit
            </label>
            <label>
                <input type="checkbox" name="perms[delete]" value="1" />Delete
            </label>
        </div>



        <div class="form-group">
            <input type="submit" type="submit" name="submit" value="Create" class="btn btn-success">

        </div>


    </form>

