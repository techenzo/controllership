
// $(document).ready(function () {
//     $("#filter").hide();
    
//     $('.contract').change(function() 
//     {  
//         $("#filter").show();
//         $('.cat').change(function() 
//         {       
//             if (!$("#hr").is(":selected")) 
//             {
//                 $('.hresources option[value="no"]').remove();
//                 console.log('waleynawaley'); 
//             } 
//                 else {
//                 console.log('HR');
//             }
//         });
//     });

// });


    
// $(document).ready(function () {

//     console.log('waleynawaley'); 
//     // dropdown();
//     $('.contract').change(function() 
//     {  
//         $('.cat').change(function() 
//         {       
//             if (!$("#hr").is(":selected")) 
//             {
//                 $('.hresources option[value="no"]').remove();
//                 console.log('waleynawaley'); 
//             } 
//                 else {
//                 console.log('HR');
//             }
//         });
//     });

// });



// $(document).ready(function () {
//     $("#department").prop("disabled", true);
//     $("#category").click(function() {   
//         console.log($("#category option:selected" ).text());
//         if($("#category option:selected" ).text() == "Human Resources"){      
//             console.log('hr');
//             $("#department").prop("disabled", false);
//         }
//         else{
//             $("#department").prop("disabled", true);
//             // cannot select the not applicable
//             console.log('others');
//         }
//       });
// });


$(document).ready(function () {


    // search with filters
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
        
        
	});

    console.log('welcome');
 
    $("#department").prop("disabled", true);
    $("#category_type").click(function() {   
        console.log($("#category_type option:selected" ).text());
        if($("#category_type option:selected" ).text() == "Human Resources"){      
            console.log('hr');
            $("#department").prop("disabled", false);
        }
        else{

            // cannot select the not applicable
            changeSelection();
            $("#department").prop("disabled", true);
            console.log('others');
        }
      });


    //   $("#FormDeleteTime").submit(function (event) {
    //     var x = !confirm("Are you sure you want to delete?");
    //        if (x) {
                
    //         location.reload();
    //         // event.preventDefault();
    //            return false;
             
    //        }
    //        else {
    
               
    //            return true;
    //        }
    
    //    });

        $("#FormDeleteTime").live("click",function(event){
            event.stopPropagation();
            if(confirm("Do you want to delete?")) {
             this.click;
                return true;
            }
            else
            {
                // alert("Cancel");
            }       
            event.preventDefault();
         
         });
    


    //Initialize tooltips
//     $('.nav-tabs > li a[title]').tooltip();
    
//     //Wizard
//     $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

//         var $target = $(e.target);
    
//         if ($target.parent().hasClass('disabled')) {
//             return false;
//         }
//     });

//     $(".next-step").click(function (e) {

//         var $active = $('.wizard .nav-tabs li.active');
//         $active.next().removeClass('disabled');
//         nextTab($active);

//     });
//     $(".prev-step").click(function (e) {

//         var $active = $('.wizard .nav-tabs li.active');
//         prevTab($active);

//     });    
 });

// function nextTab(elem) {
//     $(elem).next().find('a[data-toggle="tab"]').click();
// }
// function prevTab(elem) {
//     $(elem).prev().find('a[data-toggle="tab"]').click();
// }

function changeSelection(){
var eID = document.getElementById("department");
eID.options[0].selected="true";
}



$("#effectdate").click(function(){
    $('#effectdate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#effectdate').datepicker('show');
});

$("#expiredate").click(function(){
    $('#expiredate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#expiredate').datepicker('show');
});



$(".uploadfile").click(function(){
    var inputOne = $("#vendor_name");
    var inputTwo = $(".name");
    inputTwo.val(inputOne.val());
});



// $(".delete").off().click(function(){
//     let id = $(this).data("id");

//     $("#id").text(id);
// });



