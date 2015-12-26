<!DOCTYPE html>
<html>
<head>
	<title>Send mail</title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
	<script type="text/javascript" src="include/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="include/jquery.validate.min.js"></script>
	<script type="text/javascript">
	//validation goes here
			$(document).ready(function (){
			//validate form inputs through jquery validation library
			$(".form").validate({
				rules: {
					name: {
						required: true	
					},
					email: {
						required: true,
						email: true,
						laxEmail: true
					},
					city: {
						required: true
					},
					phone : {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 11
					},
					salary : {
						required: true,
						digits: true,
						number: true,
						notEqual: 0
					},
					startDate: {
						required: true,
						date: true
					},
					question : {
						required: true,
					},
					cv : {
						required: true
					}


				},
				messages : {
					name: {
						required: "Please enter a name"
					},
					email: {
						required: "Please enter an email",
						email: "email must be in the form of xxx@yyy.zzz"
					},
					address: {
						required: "Please enter an address"	
					},
					phone : {
						required: "Please enter a telephone",
						number: "Please enter a valid phone"
					},
					salary : {
						required: "Please enter a salary",
						digits: "Salary must not be numbers only",
						number: "slary must be numbers only"
					},
					startDate :{
						required: "Please enter an start date",
						date: "Date must be in thr form of 1991/05/20"
					},
					question : {
						required: "Please enter a question"
					},
					cv :{
						required: "please attatch a cv file"
					}

				}

			});	

			// $.validator.methods.telephone = function( value, element ) {
			//   return this.optional( element ) || /^022/.test( value );
			// }
			jQuery.validator.addMethod("telephone", function(value, element) {
			  // allow any non-whitespace characters as the host part
			  return this.optional( element ) || /^022/.test( value );
			}, 'Telephone must start with 022.');	

			jQuery.validator.addMethod("laxEmail", function(value, element) {
			  // allow any non-whitespace characters as the host part
			  return this.optional( element ) || /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test( value );
			}, 'Please enter a valid email address.');

			jQuery.validator.addMethod("notEqual", function(value, element, param) {
			  return this.optional(element) || value != param;
			}, "Please specify a different salary not 0");


});
	</script>
</head>
<body>
<div id="container">
	<div class="job">Job Application</div>
	<div class="content">
		<form class="form" action="process.php" method="post" enctype="multipart/form-data">
		<table width="80%">
			<tr>
				<td><span>Name :</span></td>
				<td><input type="text" name="name" /></td>
			</tr>	
				
			<tr>	
				<td><span>Email :</span></td>
				<td><input type="text" name="email"  /></td>
			</tr>	

			<tr>
				<td><span>phone :</span></td>
				<td><input type="text" name="phone" /></td>
			</tr>	

			<tr>
				<td><span>city :</span></td>
				<td><input type="text" name="city"  /></td>
			</tr>	

			<tr>
				<td><span>Salary :</span></td>
				<td><input type="text" name="salary" /></td>
			</tr>	

			<tr>
				<td><span>Start Date :</span></td>
				<td><input type="text" name="startDate"   /></td>
			</tr>	

			<tr>
				<td><span>Question :</span></td>
				<td><textarea name="question" cols="30" rows="6"  ></textarea></td>
			</tr>	

			<tr>
				<td><span>Cv :</span></td>
				<td><input type="file" name="cv"   /></td>
			</tr>	

			<tr>
				<td colspan="2"><input type="submit" name="add" value="Add" /></td>
			</tr>
			</form>
		</table>
	</div>
</div>
</body>
</html>