<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
 
</head>
<body>
<div class="container">
	<table class="table table-bordered table"
	<thead>
		<tr>
	  <th width="5%">ID</th>
	  <th width="15%">First Name</th>
      <th width="20%">Last Name</th>
      <th width="10%">contact</th>
      <th width="25%">Email</th>
      <th width="15%">Doctor</th>
       <th width="10%">payment</th>

		</tr>
	</thead>
	<tbody id="patient_data"></tbody>
 </table>
</body>
</html>

<script type="text/javascript" language="javascript">
	$(document).ready(function(){
 
	function fetch_patient_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   dataType:"json",
   success:function(data)
   {
    for(var count=0; count<data.length; count++)
    {
     var html_data = '<tr><td>'+data[count].id+'</td>';
     html_data += '<td data-name="fname" class="fname" data-type="text" data-pk="'+data[count].id+'">'+data[count].fname+'</td>';
     html_data += '<td data-name="lname" class="lname" data-type="text" data-pk="'+data[count].id+'">'+data[count].lname+'</td>';
     html_data += '<td data-name="contact" class="contact" data-type="text" data-pk="'+data[count].id+'">'+data[count].contact+'</td>';
     html_data += '<td data-name="email" class="email" data-type="text" data-pk="'+data[count].id+'">'+data[count].email+'</td>';
     html_data += '<td data-name="doctor" class="doctor" data-type="text" data-pk="'+data[count].id+'">'+data[count].doctor+'</td>';
     html_data += '<td data-name="payment" class="payment" data-type="text" data-pk="'+data[count].id+'">'+data[count].payment+'</td></tr>';

     $('#patient_data').append(html_data);
    }
   }
  })
 }
fetch_patient_data();


 $('#patient_data').editable({
  container: 'body',
  selector: 'td.fname',
  url: "update.php",
  title: 'First Name',
  type: "POST",
  //dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#patient_data').editable({
  container: 'body',
  selector: 'td.lname',
  url: "update.php",
  title: 'Last Name',
  type: "POST",
  dataType: 'json',
  source: [{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#patient_data').editable({
  container: 'body',
  selector: 'td.contact',
  url: "update.php",
  title: 'contact',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#patient_data').editable({
  container: 'body',
  selector: 'td.email',
  url: "update.php",
  title: 'Email',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
   var regex = /^[0-9]+$/;
   if(! expression.test(value))
   {
    return 'Numbers only!';
   }
  }
 });

$('#patient_data').editable({
  container: 'body',
  selector: 'td.doctor',
  url: "update.php",
  title: 'Doctor',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
   var regex = /^[0-9]+$/;
   if(! expression.test(value))
   {
    return 'Numbers only!';
   }
  }
 });

$('#patient_data').editable({
  container: 'body',
  selector: 'td.payment',
  url: "update.php",
  title: 'payment',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
   var regex = /^[0-9]+$/;
   if(! expression.test(value))
   {
    return 'Numbers only!';
   }
  }
 });



































});
</script>