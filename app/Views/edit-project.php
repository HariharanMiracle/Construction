<br/>
<br/>
<br/>
<main class="container">
    <h3>Edit Project</h3>
	<div class="container">
		<form action="<?php echo base_url('Project/update');?>" name="project_create" id="project_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $project['id']; ?>" required>
            <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
                <label for="project_incharge">Project In-Charge <span id="project_incharge_err" style="color:red;">*</span></label>
                <select name="project_incharge" id="project_incharge">
                    <?php
                        foreach($staff as $staffObj){
                            if($project['project_incharge'] == $staffObj['id']){
                                echo '<option value="'.$staffObj['id'].'" selected>'.$staffObj['staff_name'].'</option>';
                            }
                            else{
                                echo '<option value="'.$staffObj['id'].'">'.$staffObj['staff_name'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <br/>
            <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
                <label for="customer_id">Customer <span id="customer_id_err" style="color:red;">*</span></label>
                <select name="customer_id" id="customer_id">
                    <?php
                        foreach($customer as $customerObj){
                            if($project['customer_id'] == $customerObj['id']){
                                echo '<option value="'.$customerObj['id'].'" selected>'.$customerObj['customer_name'].'</option>';
                            }
                            else{
                                echo '<option value="'.$customerObj['id'].'">'.$customerObj['customer_name'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <br/>
            <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>PERSONNEL REQUIRED</h3>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-4 text-center">
                        <h4><b>Quantity</b></h4>
                    </div>
                    <div class="col-4 text-center">
                        <h4><b>Personnel</b></h4>
                    </div>
                    <div class="col-4 text-center">
                        <h4><b>Duration</b></h4>
                    </div>
                </div>
                <hr/>
                <br/>
                <div id="personnel_fields">
                    <?php
                        foreach($job as $jobObj){
                            $state = false;
                            foreach($project_requirements as $project_requirementsObj){
                                if($project_requirementsObj['project_id'] == $project['id'] && $project_requirementsObj['job_id'] == $jobObj['id']){
                                    ?>
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <input type="hidden" name="<?php echo 'project_requirements'.$jobObj['id']; ?>" class="form-control" id="id" value="<?php echo $project_requirementsObj['id']; ?>" required>
                                                <input type="number" value="<?php echo $project_requirementsObj['quantity']; ?>" id="<?php echo 'quantity'.$jobObj['id']; ?>" name="<?php echo 'quantity'.$jobObj['id']; ?>" class="form-control" placeholder="Quantity" required/>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h5><?php echo $jobObj['job_role']; ?></h5>
                                            </div>
                                            <div class="col-4 text-center">
                                                <input type="number" value="<?php echo $project_requirementsObj['duration']; ?>" id="<?php echo 'duration'.$jobObj['id']; ?>" name="<?php echo 'duration'.$jobObj['id']; ?>" class="form-control" placeholder="Duration" required/>
                                            </div>
                                        </div>
                                    <?php
                                    $state = true;
                                }
                            }
                            if($state == false){
                                ?>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <input type="hidden" name="<?php echo 'project_requirements'.$jobObj['id']; ?>" class="form-control" id="id" value="<?php echo '0'; ?>" required>
                                        <input type="number" value="0" id="<?php echo 'quantity'.$jobObj['id']; ?>" name="<?php echo 'quantity'.$jobObj['id']; ?>" class="form-control" placeholder="Quantity" required/>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h5><?php echo $jobObj['job_role']; ?></h5>
                                    </div>
                                    <div class="col-4 text-center">
                                        <input type="number" value="0" id="<?php echo 'duration'.$jobObj['id']; ?>" name="<?php echo 'duration'.$jobObj['id']; ?>" class="form-control" placeholder="Duration" required/>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                    <br/>
                </div>
            </div>
            <br/>
            <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
                <div class="form-group">
                    <label for="project_business">Project_business <span id="project_business_err" style="color:red;">*</span></label>
                    <input type="text" value="<?php echo $project['project_business']; ?>" name="project_business" class="form-control" id="project_business" placeholder="Please enter project_business" required>
                </div>
                <div class="form-group">
                    <label for="project_name">Project_name <span id="project_name_err" style="color:red;">*</span></label>
                    <input type="text" value="<?php echo $project['project_name']; ?>" name="project_name" class="form-control" id="project_name" placeholder="Please enter project_name" required>
                </div>
                <div class="form-group">
                    <label for="project_no">Project_no <span id="project_no_err" style="color:red;">*</span></label>
                    <input type="text" value="<?php echo $project['project_no']; ?>" name="project_no" class="form-control" id="project_no" placeholder="Please enter project_no" required>
                </div>
                <div class="form-group">
                    <label for="project_start_date">Project_start_date <span id="project_start_date_err" style="color:red;">*</span></label>
                    <input type="date" value="<?php echo $project['project_start_date']; ?>" name="project_start_date" class="form-control" id="project_start_date" placeholder="Please enter project_start_date" required>
                </div>
                <div class="form-group">
                    <label for="project_end_date">Project_end_date <span id="project_end_date_err" style="color:red;">*</span></label>
                    <input type="date" value="<?php echo $project['project_end_date']; ?>" name="project_end_date" class="form-control" id="project_end_date" placeholder="Please enter project_end_date" required>
                </div>
                <div class="form-group">
                    <label for="project_location">Project_location <span id="project_location_err" style="color:red;">*</span></label>
                    <input type="text" value="<?php echo $project['project_location']; ?>" name="project_location" class="form-control" id="project_location" placeholder="Please enter project_location" required>
                </div>
            </div>
            <br/>
            <br/>
            <div class="form-group">
            	<button type="submit" id="send_form" class="btn btn-success">Save</button>
            </div> 
        </form>
	</div>
</main>
<br/>
<br/>
<br/>