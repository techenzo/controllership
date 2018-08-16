$(document).ready(function() {
  
    var vendorNumber = $('#vendor_name').val();
       axios.get('http://127.0.0.1:8000/vendors', {
           vendor_number: vendorNumber
       })
       .then(function(response){
           var optionsVendor = response.data.vendor;  
         console.log(optionsVendor);
    
         $( "#vendor_name" ).autocomplete({
        //    minLength: 2,
           source: optionsVendor,
           focus: function( event, ui ) {
             $( "#vendor_name" ).val( ui.item.value );
            
             return false;
           },
           select: function( event, ui ) {
             $( "#vendor_name" ).val( ui.item.value );
            //  $( "#project-desc" ).val( ui.item.desc );
            //  $( "#vendor_name" ).val( ui.item.desc );
     
             return false;
           }
         })
         .autocomplete( "instance" )._renderItem = function( ul, item ) {
           return $( "<li>" )
             .append( "<div>" + item.value + "<br>" + item.desc + "</div>" )
             .appendTo( ul );
         };
    
           $('.ui-autocomplete').addClass('f-dropdown');
       }); 
    });