<br/>
<br/>
<br/>
<main class="container" style="padding: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('/Project/create'); ?>" class="btn-link" alt="Create Project">Add New</a>
                </div>
            </div>

            <br />
        
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fas fa-list-alt"></i> All Project</h3>
                    <br />
                    <?php
                        if ($project) {
                            ?>
                                <div class="row">
                                    <form class="form-inline ml-4 mb-2" action="<?php echo base_url('/Project/search'); ?>" method="post">
                                        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn my-2 my-sm-0" type="submit">Search</button>
                                    </form>   
                                </div>
                                <br/>
                            <?php
                            echo '<table class="table table-striped table-bordered" id="project">';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th>No</th>';
                                        echo '<th>Customer</th>';
                                        echo '<th>No</th>';
                                        echo '<th>Name</th>';
                                        echo '<th>Location</th>';
                                        echo '<th>Business</th>';
                                        echo '<th>Incharge</th>';
                                        echo '<th>Start date</th>';
                                        echo '<th>End date</th>';
                                        echo '<th>Personnel cost</th>';
                                        echo '<th>Service charge</th>';
                                        echo '<th>Consultancy fee</th>';
                                        echo '<th>Edit</th>';
                                        echo '<th>Delete</th>';
                                        echo '<th>Project & Equipment Requirement</th>';
                                    echo '</tr>';
                                echo '</thead>';

                                echo '<tbody>';
                                    $count = 1;
                                    foreach ($project as $obj) {
                                        
                                        echo '<tr>';
                                            echo '<td>'.$count.'</td>';
                                            foreach($customer as $customerObj){
                                                if($obj['customer_id'] == $customerObj['id']){
                                                    echo '<td>'.$customerObj['customer_name'].'</td>';
                                                }
                                            }
                                            echo '<td><a href="'.base_url().'/Project/view/'.$obj['id'].'">'.$obj['project_no'].'</a></td>';
                                            echo '<td>'.$obj['project_name'].'</td>';
                                            echo '<td>'.$obj['project_location'].'</td>';
                                            echo '<td>'.$obj['project_business'].'</td>';
                                            foreach($staff as $staffObj){
                                                if($obj['project_incharge'] == $staffObj['id']){
                                                    echo '<td>'.$staffObj['staff_name'].'</td>';
                                                }
                                            }
                                            echo '<td>'.$obj['project_start_date'].'</td>';
                                            echo '<td>'.$obj['project_end_date'].'</td>';
                                            echo '<td>'.$obj['total_personnel_cost'].'</td>';
                                            echo '<td>'.$obj['project_service_charge'].'</td>';
                                            echo '<td>'.$obj['project_consultancy_fee'].'</td>';
                                            echo '<td><a class="a-orange" href="'.base_url().'/Project/edit/'.$obj['id'].'" alt="Edit Project - '.$obj['project_name'].'"><i class="far fa-edit"></i></a></td>';
                                            echo '<td><a class="a-orange" href="'.base_url().'/Project/delete/'.$obj['id'].'" alt="Delete Project - '.$obj['project_name'].'"><i class="far fa-trash-alt"></i></a></td>';
                                            echo '<td><a class="a-orange" href="'.base_url().'/Project/req_form/'.$obj['id'].'" alt="req_form Project - '.$obj['project_name'].'"><i class="far fa-edit"></i></a></td>';
                                        echo '</tr>';
                                        $count++;
                                    }
                                echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<div class="col-md-12">';
                                echo '<div class="alert alert-warning" role="alert">';
                                    echo 'No Project Found!';
                                echo '</div>';
                            echo '</div>';
                        }
                    ?>
                <div>
            </div>
        </div>
    </div>
</main>
<br/>
<br/>
<br/>
<script>
    $(document).ready( function () {
        $('#project').DataTable();
    });
</script>