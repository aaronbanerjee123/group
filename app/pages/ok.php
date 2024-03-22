<?php if($action == 'add'):?>
    <!-- <div class="col-md-6 mx-auto">
	  <form method="post" enctype="multipart/form-data">

	    <h1 class="h3 mb-3 fw-normal">Create account</h1>

	    <?php if (!empty($errors)):?>
	      <div class="alert alert-danger">Please fix the errors below</div>
	    <?php endif;?>

	    <div class="my-2">
	    	<label class="d-block">
	    		<img class="mx-auto d-block image-preview-edit" src="<?=get_image('')?>" style="cursor: pointer;width: 150px;height: 150px;object-fit: cover;">
	    		<input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
	    	</label>
	    	<?php if(!empty($errors['image'])):?>
		      <div class="text-danger"><?=$errors['image']?></div>
		    <?php endif;?>

	    	<script>
	    		function display_image_edit(file){
	    			document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
	    		}
	    	</script>
	    </div>


	    <div class="form-floating">
	      <input value="<?=old_value('username')?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
	      <label for="floatingInput">Username</label>
	    </div>
	      <?php if(!empty($errors['username'])):?>
	      <div class="text-danger"><?=$errors['username']?></div>
	      <?php endif;?>

	    <div class="form-floating">
	      <input value="<?=old_value('email')?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
	      <label for="floatingInput">Email address</label>
	    </div>
	      <?php if(!empty($errors['email'])):?>
	      <div class="text-danger"><?=$errors['email']?></div>
	      <?php endif;?>

	    <div class="form-floating my-3">
	      <select name="role" class="form-select">
	      	<option value="user">User</option>
	      	<option value="admin">Admin</option>
	      </select>
	      <label for="floatingInput">Role</label>
	    </div>
	      <?php if(!empty($errors['role'])):?>
	      <div class="text-danger"><?=$errors['role']?></div>
	      <?php endif;?>

	    <div class="form-floating">
	      <input value="<?=old_value('password')?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
	      <label for="floatingPassword">Password</label>
	    </div>
	      <?php if(!empty($errors['password'])):?>
	      <div class="text-danger"><?=$errors['password']?></div>
	      <?php endif;?>

	    <div class="form-floating">
	      <input value="<?=old_value('retype_password')?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password">
	      <label for="floatingPassword">Password</label>
	    </div>

	    <a href="<?=ROOT?>/admin/users">
		    <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
		</a>
	    <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Create</button>
	   
	  </form>
	</div> -->

<?php elseif($action == 'edit'):?>

    <!-- <div class="col-md-6 mx-auto">
	  <form method="post" enctype="multipart/form-data">

	    <h1 class="h3 mb-3 fw-normal">Edit account</h1>

        <?php if(!empty($row)):?>
            <?php if (!empty($errors)):?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif;?>

            <div class="form-floating">
                <input value="<?=old_value('username', $row['username'])?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <?php if(!empty($errors['username'])):?>
                <div class="text-danger"><?=$errors['username']?></div>
            <?php endif;?>

            <div class="form-floating">
                <input value="<?=old_value('email', $row['email'])?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <?php if(!empty($errors['email'])):?>
                <div class="text-danger"><?=$errors['email']?></div>
            <?php endif;?>
            
            <?php if(!empty($errors['role'])):?>
                <div class="text-danger"><?=$errors['role']?></div>
            <?php endif;?>

            <div class="form-floating">
                <input value="<?=old_value('password')?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <?php if(!empty($errors['password'])):?>
                <div class="text-danger"><?=$errors['password']?></div>
            <?php endif;?>

            <div class="form-floating">
                <input value="<?=old_value('retype_password')?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password">
                <label for="floatingPassword">Password</label>
            </div>

            <a href="<?=ROOT?>/admin/users">
                <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
            </a>
            <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Save</button>
        <?php endif;?>
	  </form>
	</div> -->
    
<?php elseif($action == 'delete'):?>

<?php else:?>
    <h3>Users<a href='<?=ROOT?>/admin/users/add'><button class="btn btn-primary">Add New User</button></a></h3>
    <div class="table-responsive" >
        <table class="table">

            <tr>
                <th>#</th><th>Username</th><th>Email</th><th>Role</th><th>Image</th><th>Date</th><th></th>
            </tr>

            <?php
                $query = "select * from users order by id desc";
                $rows = query($query);

            ?>

            <?php if(!empty($rows)):?>
                <?php foreach($rows as $row):?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=esc($row['username'])?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['role']?></td>
                    <td>Image</td>
                    <td><?=date("jS M, Y", strtotime($row['date']))?></td>
                    <td>
                        <a href='<?=ROOT?>/admin/users/edit/<?=$row['id']?>'>
                        <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                        </a>
                        <a href='<?=ROOT?>/admin/users/delete/<?=$row['id']?>'>
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
            <?php endif;?>

        </table>
    </div>

<?php endif;?>