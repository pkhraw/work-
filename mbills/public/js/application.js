$(document).ready(function () {
  $('#dp1').datepicker({
      format: 'dd-mm-yyyy' 
   });
});

 
 function updateApplication(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  
  $.ajax({
           	url:'/postajax',
            type: 'POST',
            data: {_token: CSRF_TOKEN, message:"Hello"},
            dataType: 'JSON',
            success: function (data) { 
                alert(data.msg); 
            }
        }); 
 }

function saveApplication(){
	var medType=document.frm_application.medtype.value;
	var trea_code=document.frm_application.seltrea.value;
	var empname=document.frm_application.txtempname.value;
	var txtltr=document.frm_application.txtltr.value;
	var ltrdte=document.frm_application.ltrDate.value;
	if(medType==""){
		swal(
		  'OOPS!',
		  'Please select Medical Type!',
		  'error'
		);
		return;
	}
	if(trea_code==""){
		swal(
		  'OOPS!',
		  'Please select Treasury!',
		  'error'
		);
		return;
	}
	if(empname==""){
		swal(
		  'OOPS!',
		  'Please Enter Employee Name!',
		  'error'
		);
		return;
	}
	if(txtltr==""){
		swal(
		  'OOPS!',
		  'Please Enter Treasury Letter!',
		  'error'
		);
		return;
	}
	if(ltrdte==""){
		swal(
		  'OOPS!',
		  'Please enter letter date!',
		  'error'
		);
		return;
	}
	document.frm_application.method = "post";
	document.frm_application.submit();
}