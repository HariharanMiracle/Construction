<br/>
<br/>
<br/>
<main class="container">
    <h3>Edit Staff</h3>
	<div class="container">
		<form action="<?php echo base_url('Staff/update');?>" name="staff_create" id="staff_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $staff['id']; ?>" required>
            
            <div class="form-group">
                <label for="staff_number">Staff_number <span id="staff_number_err" style="color:red;">*</span></label>
                <input type="text" name="staff_number" class="form-control" id="staff_number" placeholder="Please enter staff_number" value="<?php echo $staff['staff_number']; ?>" required>
            </div>

            <div class="form-group">
                <label for="staff_name">Staff_name <span id="staff_name_err" style="color:red;">*</span></label>
                <input type="text" id="staff_name" name="staff_name" class="form-control" placeholder="Please enter staff_name" value="<?php echo $staff['staff_name']; ?>" required/>
            </div>

            <div class="form-group">
                <label for="staff_role">Staff_role <span id="staff_role_err" style="color:red;">*</span></label>
                <select id="staff_role" name="staff_role">
                    <?php
                        foreach($job as $jobObj){
                            if($jobObj['id'] == $staff['staff_role']){
                                echo '<option value="'.$jobObj['id'].'" selected>'.$jobObj['job_role'].'</option>';
                            }
                            else{
                                echo '<option value="'.$jobObj['id'].'">'.$jobObj['job_role'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="contract">Contract Staff? <span id="contract_err" style="color:red;">*</span></label>
                <select id="contract" name="contract">
                    <?php
                        if($staff['contract'] == 0){
                            ?><option value="0" selected>No</option><?php
                            ?><option value="1">Yes</option><?php
                        }
                        else{
                            ?><option value="0">No</option><?php
                            ?><option value="1" selected>Yes</option><?php
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-success">Save</button>
            </div> 
        </form>
	</div>
</main>
<br/>
<br/>
<br/>