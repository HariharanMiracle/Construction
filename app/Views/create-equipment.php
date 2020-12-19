<br/>
<br/>
<br/>
<main class="container">
    <h3>Add Equipment</h3>
	<div class="container">
		<form action="<?php echo base_url('Equipment/store');?>" name="equipment_create" id="equipment_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="equipment_no">Equipment_no <span id="equipment_no_err" style="color:red;">*</span></label>
                <input type="text" name="equipment_no" class="form-control" id="equipment_no" placeholder="Please enter equipment_no" required>
            </div>

            <div class="form-group">
                <label for="equipment_name">Equipment_name <span id="equipment_name_err" style="color:red;">*</span></label>
                <input type="text" id="equipment_name" name="equipment_name" class="form-control" placeholder="Please enter equipment_name" required/>
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