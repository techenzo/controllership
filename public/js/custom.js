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


$(document).ready(function () {

    $(".text-upload").click(function () {
        $("#inpupload").trigger("click");
    });
    $("#inpupload").change(function () {
        $("#frmupload").submit();
    });

    console.log('Test Enzo');
    // search with filters
    $('.search-panel .dropdown-menu').find('a').click(function (e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#", "");

        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });

    // Dropdown for contract type, category and department
    $("#department").prop("disabled", true);
    $("#category_type").click(function () {
        console.log($("#category_type option:selected").text());
        if ($("#category_type option:selected").text() == "Human Resources") {
            console.log('Human Resources');
            $("#department").prop("disabled", false);
        } else {
            // cannot select the not applicable
            changeSelection();
            $("#department").prop("disabled", true);
            console.log('Others Category');
        }
    });

    //Delete Alert
    $("#FormDeleteTime").live("click", function (event) {
        event.stopPropagation();
        if (confirm("Do you want to delete?")) {
            this.click;
            return true;
        } else {
            // alert("Cancel");
        }
        event.preventDefault();
    });
});

function changeSelection() {
    var eID = document.getElementById("department");
    eID.options[0].selected = "true";
}

// Date picker for effective date            
$("#effectdate").click(function () {
    $('#effectdate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#effectdate').datepicker('show');
});

// Date picker for expiration date
$("#expiredate").click(function () {
    $('#expiredate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#expiredate').datepicker('show');
});

// Upload Files          
$(".uploadfile").click(function () {
    var inputOne = $("#vendor_name");
    var inputTwo = $(".name");
    inputTwo.val(inputOne.val());
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


// function nextTab(elem) {
//     $(elem).next().find('a[data-toggle="tab"]').click();
// }
// function prevTab(elem) {
//     $(elem).prev().find('a[data-toggle="tab"]').click();
// }

// $(".delete").off().click(function(){
//     let id = $(this).data("id");

//     $("#id").text(id);
// });

/***/ }),

/***/ 39:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(2);


/***/ })

/******/ });