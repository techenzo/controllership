
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

    console.log('welcome');
 
    $("#department").prop("disabled", true);
    $("#category").click(function() {   
        console.log($("#category option:selected" ).text());
        if($("#category option:selected" ).text() == "Human Resources"){      
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



      
});

function changeSelection(){
var eID = document.getElementById("department");
eID.options[0].selected="true";
}

// $(".delete").off().click(function(){
//     let id = $(this).data("id");

//     $("#id").text(id);
// });


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



