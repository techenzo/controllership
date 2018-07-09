/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 39);
/******/ })
/************************************************************************/
/******/ ({

/***/ 2:
/***/ (function(module, exports) {


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
    $("#department").prop("disabled", true);
    $("#category").click(function () {
        console.log($("#category option:selected").text());
        if ($("#category option:selected").text() == "Human Resources") {
            console.log('hr');
            $("#department").prop("disabled", false);
        } else {

            // cannot select the not applicable
            changeSelection();
            $("#department").prop("disabled", true);
            console.log('others');
        }
    });
});

function changeSelection() {
    var eID = document.getElementById("department");
    eID.options[0].selected = "true";
}

// $(".delete").off().click(function(){
//     let id = $(this).data("id");

//     $("#id").text(id);
// });


$("#effectdate").click(function () {
    $('#effectdate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#effectdate').datepicker('show');
});

$("#expiredate").click(function () {
    $('#expiredate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#expiredate').datepicker('show');
});

/***/ }),

/***/ 39:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(2);


/***/ })

/******/ });