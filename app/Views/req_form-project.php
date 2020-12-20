<br/>
<br/>
<br/>
<main class="container">
    <h3>Add Project resource</h3>
	<div class="container">
		<form action="<?php echo base_url('Project/resourceStore');?>" name="project_create" id="project_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
                <div class="row">
                    <div class="col-12 text-center"><h3>Staff Allocation form</h3></div>
                </div>
                <input type ="hidden" name="project_id" id="project_id" value="<?php echo $project['id']; ?>"/>
                <br/>
                <?php
                    foreach($project_requirements as $project_requirementsObj){
                        if($project_requirementsObj['project_id'] == $project['id']){
                            ?>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <h4>
                                            <?php echo $project_requirementsObj['quantity']; ?>
                                            <?php
                                                foreach($job as $jobObj){
                                                    if($jobObj['id'] == $project_requirementsObj['job_id']){
                                                        ?> <?php echo $jobObj['job_role']; ?> <?php
                                                    }
                                                }
                                            ?>
                                        </h4>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4><?php echo $project_requirementsObj['duration']; ?></h4>
                                    </div>
                                    <div class="col-4">
                                        <?php
                                            foreach($job as $jobObj){
                                                if($jobObj['id'] == $project_requirementsObj['job_id']){
                                                    foreach($staff as $staffObj){
                                                        if($staffObj['staff_role'] == $jobObj['id']){
                                                            ?>
                                                                <input type="checkbox" id="staff<?php echo $staffObj['id']; ?>" name="staff<?php echo $staffObj['id']; ?>" value="<?php echo $staffObj['id']; ?>"> <?php echo $staffObj['staff_name']; ?>
                                                                <?php
                                                                    if($staffObj['contract'] == 0){
                                                                        echo '(permenant staff)';
                                                                    }
                                                                    else{
                                                                        echo '(contract staff)';
                                                                    }
                                                                ?>
                                                                <br/>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                </div> 
                                <hr/>             
                            <?php
                        }
                    }
                ?>
            </div>
            <br/>
            <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
                <div class="row">
                    <div class="col-12 text-center"><h3>Equipment Allocation form</h3></div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-4 text-center">
                        <h4><b>Quantity</b></h4>
                    </div>
                    <div class="col-4 text-center">
                        <h4><b>Equipment</b></h4>
                    </div>
                    <div class="col-4 text-center">
                        <h4><b>Duration</b></h4>
                    </div>
                </div>
                <hr/>
                <br/>
                <?php
                        foreach($equipment as $equipmentObj){
                            ?>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <input type="number" value="0" id="<?php echo 'quantity'.$equipmentObj['id']; ?>" name="<?php echo 'quantity'.$equipmentObj['id']; ?>" class="form-control" placeholder="Quantity" required/>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h5><?php echo $equipmentObj['equipment_name']; ?></h5>
                                    </div>
                                    <div class="col-4 text-center">
                                        <input type="number" value="0" id="<?php echo 'duration'.$equipmentObj['id']; ?>" name="<?php echo 'duration'.$equipmentObj['id']; ?>" class="form-control" placeholder="Duration" required/>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
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