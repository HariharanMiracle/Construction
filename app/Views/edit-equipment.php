<br/>
<br/>
<br/>
<main class="container">
    <h3>Edit Equipment</h3>
	<div class="container">
		<form action="<?php echo base_url('Equipment/update');?>" name="equipment_edit" id="equipment_edit" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $equipment['id']; ?>" required>

            <div class="form-group">
                <label for="equipment_no">Equipment_no <span id="equipment_no_err" style="color:red;">*</span></label>
                <input type="text" name="equipment_no" class="form-control" id="equipment_no" value="<?php echo $equipment['equipment_no']; ?>" placeholder="Please enter equipment_no" required>
            </div>

            <div class="form-group">
                <label for="equipment_name">Equipment_name <span id="equipment_name_err" style="color:red;">*</span></label>
                <input type="text" name="equipment_name" class="form-control" id="equipment_name" value="<?php echo $equipment['equipment_name']; ?>" placeholder="Please enter equipment_name" required>
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