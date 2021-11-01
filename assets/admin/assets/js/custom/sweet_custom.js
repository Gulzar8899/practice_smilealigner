function sweetAlertConformation(callback, message)
{
	Swal.fire({
    	title				: 'Are you sure?',
      	//text 				: message,
      	imageUrl         : 'http://smilealigners.in/assets/images/delete.svg',
      	showCancelButton	: true,
      	confirmButtonColor  : '#ff0000',
      	cancelButtonColor	: '#6D3745',
      	confirmButtonText	: 'Yes',
      	cancelButtonText    : 'No',
        allowOutsideClick : false,
        width               : 450,
        padding             : '10px'
	}).then((result) => 
	{
        if (result.value)
        {
            callback(true);
        }
        else
        {
        	callback(false);
        }
    });
}
function showSweetAlert(type, message, timerSet = 60000, showConfirmBtn = true)
{
  Swal.fire({
      	icon				: 'success',
        title            : message,
        confirmButtonColor: '#ff0000',
        confirmButtonText: 'Done',
        customClass: {
            icon: "delete-success",
        },
        width: '22em',
    }).then((result) => 
    {
        if (result.value)
        {
            location.reload();
        }
        else
        {
          location.reload();
        }
    });
    //w3_alert(message, 'delete.svg', 'delete');
}
function showSweetAlertPatient(type, message, timerSet = 60000, showConfirmBtn = true)
{
  Swal.fire({
        icon             : type,
        title            : message,
        showConfirmButton: showConfirmBtn,
        allowOutsideClick : false,
        // timer            : timerSet,
        width            : 450,
        padding          : '10px'
    }).then((result) => 
    {
        if (result.value)
        {
            window.location.href = site_url+'admin/patient/patientListing';
        }
        else
        {
          location.reload('admin/patient/patientListing');
        }
    });
}