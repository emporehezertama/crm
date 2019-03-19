
// datepicker
$('.datepicker').each(function(){
    $(this).pickadate({
        selectMonths: true,
        selectYears: true,
        format: 'yyyy-mm-dd',
    });
});

$('.data-table').DataTable( {
    paging: false,
    bInfo: false,
    ordering: false
} );

/*
function confirm_delete(msg, el)
{
	swal({
	    title: "Are you sure?",
	    text: "You will not be able to recover this imaginary file!",
	    icon: "warning",
	    showCancelButton: true,
	    buttons: {
            cancel: {
                text: "No, cancel!",
                value: null,
                visible: true,
                className: "btn-warning",
                closeModal: true,
            },
            confirm: {
                text: "Yes, delete it!",
                value: true,
                visible: true,
                className: "",
                closeModal: false
            }
	    }
	}).then(isConfirm => {
	    if (isConfirm) {
	        $(el).parent().submit();
	    }
	});
}

*/

function _confirm(msg)
{
    swal({
        title: "Are you sure?",
        text: msg,
        icon: "warning",
        showCancelButton: true,
        buttons: {
            cancel: {
                text: "No, cancel!",
                value: null,
                visible: true,
                className: "btn-warning",
                closeModal: true,
            },
            confirm: {
                text: "Yes, publish it!",
                value: true,
                visible: true,
                className: "",
                closeModal: false
            }
        }
    }).then(isConfirm => {
        if (isConfirm) {
            document.location = url;
        }
    });

    return false;
}

function generate_permalink()
{
    var us = "";
    //Check for data referral
    if ($('.referrer').length > 0) {
        tR  = $('.referrer').length > 1 ? $('.referrer').eq(0) : $('.referrer');
        tRV = tR.val();
        eR  = tR.attr('data-referral');
        eR  = $('.'+eR);
        
        if(typeof eR.attr('data-separator') == 'undefined')
            sp = '-'
        else
            sp = eR.attr('data-separator');
        
        if (us != '') us += '/';
        
        us += cute_url(tRV,sp);
    } 
    if (eR.length > 0) {
        eR.val(us);
    }
}

function cute_url(string)
{
    separator = typeof separator == 'undefined' ? '-' : separator;
    string = $.trim(string).toLowerCase();                
    string = string.replace(/[ ~`!@#$%^&*()\/\\\'\\[\]\{\}_=?;:<>.,+\|"]/g, separator);
    string = string.replace(/-{2,}/g,separator);
    string = string.replace(/_{2,}/g,separator);
    string = string.replace(/\//g,separator);
    string = string.replace(/^-/,'');
    string = string.replace(/-$/,'');

    return string.toLowerCase();
}

$('.idr').priceFormat({
    prefix: 'Rp. ',
    centsSeparator: '.',
    thousandsSeparator: '.',
    centsLimit: 0
});

/**
 * [alert_ description]
 * @param  {[type]} msg [description]
 * @return {[type]}     [description]
 */
function _alert(msg)
{
  if(msg == "") return false;

  bootbox.alert({
    title : "<i class=\"la la-warning\"></i> EMPORE SYSTEM",
    closeButton: false,
    message: msg,
     buttons: {
        ok: {
            label: 'OK',
            className: 'btn btn-sm btn-success'
        },
    },
  })
}

/**
 * [_confirm description]
 * @param  {[type]} msg [description]
 * @return {[type]}     [description]
 */
function confirm_delete(msg, el)
{
  if(msg == "") return false;

  bootbox.confirm({
    title : "<i class=\"la la-warning\"></i> EMPORE SYSTEM",
    message: msg,
    closeButton: false,
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn btn-sm btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn btn-sm btn-danger'
        }
    },
    callback: function (result) {
      if(result)
      { 
           $(el).parent().submit();
      }
      
    }
  });

  return false;
}
