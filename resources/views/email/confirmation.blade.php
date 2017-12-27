<html>
<head>
	<style type="text/css">
		table {
		    border-collapse: collapse;
		}
		tr, td {
			border: 1px solid black;
		}	

	</style>	
</head>

<body>
	<div>Dear Student,</div>
	 <br>
	<div>Your booking for the following equipment is confirmed:</div>
	<br>
	<table>
		<tr>
			<td>Item(s): </td>
			<td>
				@foreach($item as $i)
					{{$i->name." "}}
				@endforeach
			</td>
		</tr>
		<tr>
			<td>Booking Start Date: </td>
			<td>{{$from}}</td>
		</tr>
		<tr>
			<td>Booking End Date: </td>
			<td>{{$to}}</td>
		</tr>
	</table>
	<br>

	<div>Please note the following:-</div>
	<ol>
	<li>Please bring along your Student ID for identity verification and collect the above item in the Dean of Student Office (UG/F, East Block) at the above scheduled time.</li>
	<li>You are required to pay a deposit of HK$100 for every single item check-out. Should the booking be marked as a SET, you’re required to pay a deposit of HK$500 for each set. Reserved items will be released to other users if they are not checked out before the specified time.</li>
	<li>Equipment are on loan for not more than <b>five working days</b>. You may renew the loan period ONE time via the online booking system. If the items are requested by other students, renewal will not be granted.</li>
	<li><b>The penalty for late return is $50 for each item or $100 for each set per day.</b> The penalty will be deducted directly from the deposit. If the penalty amount exceeds the deposit amount, your account will be suspended and you will not be allowed to borrow any facilities/equipment immediately. In addition to the penalty, a one-week suspension of loan accounts will be implemented if you return loan item(s) late by <b>three calendar days or more.</b></li>
	<li>For lost and damaged item(s), you will need to make a full compensation. Should you fail to compensate the lost/damaged item(s), the deposit will NOT be refunded and your account will be suspended for <b>ONE semester.</b> </li>
	<li>Please return the loan item(s) punctually to the College Office (G03, G/F, East Wing) and take good care of the equipment. The deposit can be refunded once you’ve returned of loan item(s) as the condition it was rented out.</li>
	</ol>
	<br>
	<div>If you have any questions about how to use the equipment, please feel free to ask the student conveners/ staff. Thank you!</div>

</body>
</html>