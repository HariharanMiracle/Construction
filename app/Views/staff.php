<br/>
<br/>
<br/>
<main class="container" style="padding: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('/Staff/create'); ?>" class="btn-link" alt="Create Staff">Add New</a>
                </div>
            </div>

            <br />
        
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fas fa-list-alt"></i> All Staff</h3>
                    <br />
                    <?php
                        if ($staff) {
                            ?>
                                <div class="row">
                                    <form class="form-inline ml-4 mb-2" action="<?php echo base_url('/Staff/search'); ?>" method="post">
                                        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn my-2 my-sm-0" type="submit">Search</button>
                                    </form>   
                                </div>
                                <br/>
                            <?php
                            echo '<table class="table table-striped table-bordered" id="staff">';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th>No</th>';
                                        echo '<th>Staff_number</th>';
                                        echo '<th>Staff_name</th>';
                                        echo '<th>Staff_role</th>';
                                        echo '<th>Contract</th>';
                                        echo '<th>Edit</th>';
                                        echo '<th>Delete</th>';
                                    echo '</tr>';
                                echo '</thead>';

                                echo '<tbody>';
                                    $count = 1;
                                    foreach ($staff as $obj) {
                                        
                                        echo '<tr>';
                                            echo '<td>'.$count.'</td>';
                                            echo '<td>'.$obj['staff_number'].'</td>';
                                            echo '<td>'.$obj['staff_name'].'</td>';
                                            foreach($job as $jobObj){
                                                if($jobObj['id'] == $obj['staff_role']){
                                                    echo '<td>'.$jobObj['job_role'].'</td>';
                                                }
                                            }
                                            if($obj['contract'] == 1){
                                                echo '<td>Yes</td>';
                                            }
                                            else{
                                                echo '<td>No</td>';
                                            }
                                            echo '<td><a class="a-orange" href="'.base_url().'/Staff/edit/'.$obj['id'].'" alt="Edit Staff - '.$obj['staff_name'].'"><i class="far fa-edit"></i></a></td>';
                                            echo '<td><a class="a-orange" href="'.base_url().'/loStaff/delete/'.$obj['id'].'" alt="Delete Staff - '.$obj['staff_name'].'"><i class="far fa-trash-alt"></i></a></td>';
                                        echo '</tr>';
                                        $count++;
                                    }
                                echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<div class="col-md-12">';
                                echo '<div class="alert alert-warning" role="alert">';
                                    echo 'No Staff Found!';
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
        $('#staff').DataTable();
    });
</script>