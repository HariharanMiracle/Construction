<br/>
<br/>
<br/>
<main class="container" style="padding: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('/Customer/create'); ?>" class="btn-link" alt="Create Customer">Add New</a>
                </div>
            </div>

            <br />
        
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fas fa-list-alt"></i> All Customer</h3>
                    <br />
                    <?php
                        if ($customer) {
                            ?>
                                <div class="row">
                                    <form class="form-inline ml-4 mb-2" action="<?php echo base_url('/Customer/search'); ?>" method="post">
                                        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn my-2 my-sm-0" type="submit">Search</button>
                                    </form>   
                                </div>
                                <br/>
                            <?php
                            echo '<table class="table table-striped table-bordered" id="customer">';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th>No</th>';
                                        echo '<th>Customer_name</th>';
                                        echo '<th>Customer_address</th>';
                                        echo '<th>Customer_phone</th>';
                                        echo '<th>Edit</th>';
                                        echo '<th>Delete</th>';
                                    echo '</tr>';
                                echo '</thead>';

                                echo '<tbody>';
                                    $count = 1;
                                    foreach ($customer as $obj) {
                                        
                                        echo '<tr>';
                                            echo '<td>'.$count.'</td>';
                                            echo '<td>'.$obj['customer_name'].'</td>';
                                            echo '<td>'.$obj['customer_address'].'</td>';
                                            echo '<td>'.$obj['customer_phone'].'</td>';
                                            echo '<td><a class="a-orange" href="'.base_url().'/Customer/edit/'.$obj['id'].'" alt="Edit Customer - '.$obj['title'].'"><i class="far fa-edit"></i></a></td>';
                                            echo '<td><a class="a-orange" href="'.base_url().'/Customer/delete/'.$obj['id'].'" alt="Delete Customer - '.$obj['title'].'"><i class="far fa-trash-alt"></i></a></td>';
                                        echo '</tr>';
                                        $count++;
                                    }
                                echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<div class="col-md-12">';
                                echo '<div class="alert alert-warning" role="alert">';
                                    echo 'No Customer Found!';
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
        $('#customer').DataTable();
    });
</script>