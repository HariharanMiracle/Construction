<script>
</script>



$points = $this->input->post('points');
   $passes = $this->input->post('passes'); 
   for($i=0;$i<sizeof($points);$i++)
   {
     $dataSet[$i] = array ('points' => $points[$i], 'passes' => $passses[$i]);
   }