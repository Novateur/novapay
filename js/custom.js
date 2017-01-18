$(document).ready(function(){
	//alert("yup");
})

function account_cont()
{
	var account = $('input:radio[name=account]:checked').val();
	
	if(account==null)
	{
		$('#alert').modal('show');
	}
	else
	{
		if(account=="personal")
		{
			location.assign("create_account.php");
		}
		else
		{
			//goto to business type registration page
		}
	}
}

