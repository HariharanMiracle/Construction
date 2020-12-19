<br/>
<br/>
<br/>
<main class="container">
    <h3>Add Customer</h3>
	<div class="container">
		<form action="<?php echo base_url('Customer/store');?>" name="customer_create" id="customer_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="customer_name">Customer_name <span id="customer_name_err" style="color:red;">*</span></label>
                <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Please enter customer_name" required>
            </div>

            <div class="form-group">
                <label for="customer_address">Customer_address <span id="customer_address_err" style="color:red;">*</span></label>
                <textarea id="customer_address" name="customer_address" class="form-control" placeholder="Please enter customer_address" required></textarea>
            </div>

            <div class="form-group">
                <label for="customer_phone">Customer_phone <span id="customer_phone_err" style="color:red;">*</span></label>
                <input type="text" name="customer_phone" class="form-control" id="customer_phone" placeholder="Please enter customer_phone" required>
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