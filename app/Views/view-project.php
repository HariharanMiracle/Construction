<br/>
<br/>
<br/>
<main class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Project Requirements</h2>
        </div>
    </div>
    <br/>
    <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
        <?php
            foreach($customer as $customerObj){
                if($customerObj['id'] == $project['customer_id']){
                    ?>
                        <h4><b>CUSTOMER NAME:</b> <?php echo $customerObj['customer_name']; ?></h4>
                        <h4><b>CUSTOMER ADDRESS:</b> <?php echo $customerObj['customer_address']; ?></h4>                    
                    <?php
                }
            }
        ?>
    </div>
    <br/>
    <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
        <h4><b>BUSINESS NAME:</b> <?php echo $project['project_business']; ?></h4>
        <h4><b>PROJECT NAME:</b> <?php echo $project['project_name']; ?></h4>                    
        <h4><b>PROJECT NUMBER:</b> <?php echo $project['project_no']; ?></h4>                    
        <h4><b>START DATE:</b> <?php echo $project['project_start_date']; ?></h4>                    
        <h4><b>END DATE:</b> <?php echo $project['project_end_date']; ?></h4>                    
        <h4><b>PROJECT LOCATION:</b> <?php echo $project['project_location']; ?></h4>                    
    </div>
    <br/>
    <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
        <div class="row">
            <div class="col-12 text-center">
                <h3>PROJECTED COST</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6 text-center">
                <h4><b>PERSONNEL REQUIRED</b></h4>
            </div>
            <div class="col-6 text-center">
                <h4><b>NUMBER OF DAYS</b></h4>
            </div>
        </div>
        <?php
            foreach($project_requirements as $project_requirementsObj){
                if($project_requirementsObj['project_id'] == $project['id']){
                    ?>
                        <div class="row">
                            <div class="col-6 text-center">
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
                            <div class="col-6 text-center">
                                <h4><?php echo $project_requirementsObj['duration']; ?></h4>
                            </div>
                        </div>              
                    <?php
                }
            }
        ?>
    </div>
    <br/>
    <div class="bg-light p-5" style="border: 2px solid blue; border-radius: 10px;">
        <h4><b>TOTAL PERSONNEL COST: </b> <?php echo $project['total_personnel_cost']; ?></h4>
        <h4><b>SERVICE CHARGE: </b> <?php echo $project['project_service_charge']; ?></h4>                    
        <h4><b>CONSULTANCY FEE: </b> <?php echo $project['project_consultancy_fee']; ?></h4>                    
    </div>
</main>
<br/>
<br/>
<br/>