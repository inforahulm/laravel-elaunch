/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/book/book.js":
/*!***********************************!*\
  !*** ./resources/js/book/book.js ***!
  \***********************************/
/***/ (() => {

eval("$(document).ready(function () {\n  $.ajaxSetup({\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    }\n  });\n  /** book model create data  */\n\n  $('#create-book').click(function () {\n    $('#BookForm').trigger(\"reset\");\n    $('#BookModal').modal('show');\n  });\n  $('body').on('click', '.btnsave', function (e) {\n    e.preventDefault();\n    var name = $('#name').val();\n    $('#err').html('');\n    $.ajax({\n      type: \"POST\",\n      url: Url_Book_Store,\n      data: $('#BookForm').serialize(),\n      success: function success(response) {\n        $('#BookForm').trigger(\"reset\");\n        $('#BookModal').modal('hide');\n        window.LaravelDataTables[\"books-table\"].ajax.reload();\n        console.log(response);\n      },\n      error: function error(data) {\n        $('#Err').html(data.responseJSON.errors.name[0]);\n        console.log('Error:', data.responseJSON.errors.name[0]);\n      }\n    });\n  });\n  /**  book model to show data */\n\n  $(document).on('click', '.editUser', function (e) {\n    e.preventDefault();\n    var urledit = $(this).attr('href');\n    $.ajax({\n      type: \"GET\",\n      url: urledit,\n      data: {\n        name: name\n      },\n      success: function success(response) {\n        $('#BookeditModal').find('.modal-body').html(response);\n        $('#BookeditForm').trigger(\"reset\");\n        $('#BookeditModal').modal('show');\n        console.log(response);\n      },\n      error: function error(data) {\n        console.log('Error:', data);\n      }\n    });\n  });\n  /** book model update */\n\n  $('body').on('click', '.btnupdate', function (e) {\n    e.preventDefault();\n    var urlupdate = $(this).attr('href');\n    $('#editErr').html('');\n    $.ajax({\n      type: \"PUT\",\n      url: urlupdate,\n      data: $('#BookeditForm').serialize(),\n      success: function success(response) {\n        $('#BookeditForm').trigger(\"reset\");\n        $('#BookeditModal').modal('hide');\n        window.LaravelDataTables[\"books-table\"].ajax.reload();\n        console.log(response);\n      },\n      error: function error(data) {\n        $('#editErr').html(data.responseJSON.errors.name[0]);\n        console.log('Error:', data.responseJSON.errors.name[0]);\n      }\n    });\n  });\n  $(document).on('click', '.deleteUser', function (e) {\n    e.preventDefault();\n    var id = $(this).data(\"id\");\n    Swal.fire({\n      title: 'Are you sure?',\n      text: \"You won't be able to revert this!\",\n      icon: 'warning',\n      showCancelButton: true,\n      confirmButtonColor: '#3085d6',\n      cancelButtonColor: '#d33',\n      confirmButtonText: 'Yes, delete it!'\n    }).then(function (result) {\n      if (result.isConfirmed) {\n        $.ajax({\n          type: \"DELETE\",\n          url: Url_Book_index + '/' + id,\n          success: function success() {\n            window.LaravelDataTables[\"books-table\"].ajax.reload();\n            Swal.fire('Deleted!', 'Your file has been deleted.', 'success');\n            console.log('success');\n          }\n        });\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYm9vay9ib29rLmpzPzdiNWIiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJhamF4U2V0dXAiLCJoZWFkZXJzIiwiYXR0ciIsImNsaWNrIiwidHJpZ2dlciIsIm1vZGFsIiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJuYW1lIiwidmFsIiwiaHRtbCIsImFqYXgiLCJ0eXBlIiwidXJsIiwiVXJsX0Jvb2tfU3RvcmUiLCJkYXRhIiwic2VyaWFsaXplIiwic3VjY2VzcyIsInJlc3BvbnNlIiwid2luZG93IiwiTGFyYXZlbERhdGFUYWJsZXMiLCJyZWxvYWQiLCJjb25zb2xlIiwibG9nIiwiZXJyb3IiLCJyZXNwb25zZUpTT04iLCJlcnJvcnMiLCJ1cmxlZGl0IiwiZmluZCIsInVybHVwZGF0ZSIsImlkIiwiU3dhbCIsImZpcmUiLCJ0aXRsZSIsInRleHQiLCJpY29uIiwic2hvd0NhbmNlbEJ1dHRvbiIsImNvbmZpcm1CdXR0b25Db2xvciIsImNhbmNlbEJ1dHRvbkNvbG9yIiwiY29uZmlybUJ1dHRvblRleHQiLCJ0aGVuIiwicmVzdWx0IiwiaXNDb25maXJtZWQiLCJVcmxfQm9va19pbmRleCJdLCJtYXBwaW5ncyI6IkFBQ0lBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBWTtBQUMxQkYsRUFBQUEsQ0FBQyxDQUFDRyxTQUFGLENBQVk7QUFDUkMsSUFBQUEsT0FBTyxFQUFFO0FBQ0wsc0JBQWdCSixDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkssSUFBN0IsQ0FBa0MsU0FBbEM7QUFEWDtBQURELEdBQVo7QUFNSDs7QUFFR0wsRUFBQUEsQ0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQk0sS0FBbEIsQ0FBd0IsWUFBWTtBQUNoQ04sSUFBQUEsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlTyxPQUFmLENBQXVCLE9BQXZCO0FBQ0FQLElBQUFBLENBQUMsQ0FBQyxZQUFE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ICAgICAkLmFqYXhTZXR1cCh7XHJcbiAgICAgICAgICAgIGhlYWRlcnM6IHtcclxuICAgICAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgLyoqIGJvb2sgbW9kZWwgY3JlYXRlIGRhdGEgICovIFxyXG5cclxuICAgICAgICAkKCcjY3JlYXRlLWJvb2snKS5jbGljayhmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICQoJyNCb29rRm9ybScpLnRyaWdnZXIoXCJyZXNldFwiKTtcclxuICAgICAgICAgICAgJCgnI0Jvb2tNb2RhbCcpLm1vZGFsKCdzaG93Jyk7XHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgJCgnYm9keScpLm9uKCdjbGljaycsICcuYnRuc2F2ZScsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KClcclxuICAgICAgICAgICAgICAgIHZhciBuYW1lID0gJCgnI25hbWUnKS52YWwoKTtcclxuICAgICAgICAgICAgICAgICQoJyNlcnInKS5odG1sKCcnKTtcclxuICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAkLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6IFwiUE9TVFwiLFxyXG4gICAgICAgICAgICAgICAgICAgIHVybDogVXJsX0Jvb2tfU3RvcmUsXHJcbiAgICAgICAgICAgICAgICAgICAgZGF0YTogJCgnI0Jvb2tGb3JtJykuc2VyaWFsaXplKCksXHJcbiAgICAgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKHJlc3BvbnNlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJyNCb29rRm9ybScpLnRyaWdnZXIoXCJyZXNldFwiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI0Jvb2tNb2RhbCcpLm1vZGFsKCdoaWRlJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5MYXJhdmVsRGF0YVRhYmxlc1tcImJvb2tzLXRhYmxlXCJdLmFqYXgucmVsb2FkKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3BvbnNlKVxyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgJCgnI0VycicpLmh0bWwoZGF0YS5yZXNwb25zZUpTT04uZXJyb3JzLm5hbWVbMF0gKTtcclxuICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnRXJyb3I6JywgZGF0YS5yZXNwb25zZUpTT04uZXJyb3JzLm5hbWVbMF0pO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gICAgICAgXHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4vKiogIGJvb2sgbW9kZWwgdG8gc2hvdyBkYXRhICovXHJcblxyXG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcuZWRpdFVzZXInLCBmdW5jdGlvbiAoZSkgeyBcclxuICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICB2YXIgdXJsZWRpdCA9ICQodGhpcykuYXR0cignaHJlZicpO1xyXG4gICAgICAgICAgICAgICAgJC5hamF4KHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdHlwZTogXCJHRVRcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgdXJsOiB1cmxlZGl0LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBkYXRhOntcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG5hbWU6bmFtZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChyZXNwb25zZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICQoJyNCb29rZWRpdE1vZGFsJykuZmluZCgnLm1vZGFsLWJvZHknKS5odG1sKHJlc3BvbnNlKTtcclxuICAgICAgICAgICAgICAgICAgICAkKCcjQm9va2VkaXRGb3JtJykudHJpZ2dlcihcInJlc2V0XCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICQoJyNCb29rZWRpdE1vZGFsJykubW9kYWwoJ3Nob3cnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3BvbnNlKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdFcnJvcjonLCBkYXRhKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLyoqIGJvb2sgbW9kZWwgdXBkYXRlICovXHJcblxyXG4gICAgICAgICQoJ2JvZHknKS5vbignY2xpY2snLCAnLmJ0bnVwZGF0ZScsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgdmFyIHVybHVwZGF0ZSA9ICQodGhpcykuYXR0cignaHJlZicpO1xyXG4gICAgICAgICAgICAkKCcjZWRpdEVycicpLmh0bWwoJycpOyBcclxuICAgICAgICAgICAgJC5hamF4KHtcclxuICAgICAgICAgICAgICAgIHR5cGU6IFwiUFVUXCIsXHJcbiAgICAgICAgICAgICAgICB1cmw6IHVybHVwZGF0ZSxcclxuICAgICAgICAgICAgICAgIGRhdGE6JCgnI0Jvb2tlZGl0Rm9ybScpLnNlcmlhbGl6ZSgpLCAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChyZXNwb25zZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICQoJyNCb29rZWRpdEZvcm0nKS50cmlnZ2VyKFwicmVzZXRcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnI0Jvb2tlZGl0TW9kYWwnKS5tb2RhbCgnaGlkZScpO1xyXG4gICAgICAgICAgICAgICAgICAgIHdpbmRvdy5MYXJhdmVsRGF0YVRhYmxlc1tcImJvb2tzLXRhYmxlXCJdLmFqYXgucmVsb2FkKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2cocmVzcG9uc2UpXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnI2VkaXRFcnInKS5odG1sKGRhdGEucmVzcG9uc2VKU09OLmVycm9ycy5uYW1lWzBdKTtcclxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnRXJyb3I6JywgZGF0YS5yZXNwb25zZUpTT04uZXJyb3JzLm5hbWVbMF0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgIH0gKTsgIFxyXG5cclxuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLmRlbGV0ZVVzZXInLGZ1bmN0aW9uIChlKXtcclxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICB2YXIgaWQgPSAkKHRoaXMpLmRhdGEoXCJpZFwiKTtcclxuICAgICAgICAgICBcclxuICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgIHRpdGxlOiAnQXJlIHlvdSBzdXJlPycsXHJcbiAgICAgICAgICAgICAgICB0ZXh0OiBcIllvdSB3b24ndCBiZSBhYmxlIHRvIHJldmVydCB0aGlzIVwiLFxyXG4gICAgICAgICAgICAgICAgaWNvbjogJ3dhcm5pbmcnLFxyXG4gICAgICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25Db2xvcjogJyMzMDg1ZDYnLFxyXG4gICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uQ29sb3I6ICcjZDMzJyxcclxuICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiAnWWVzLCBkZWxldGUgaXQhJ1xyXG4gICAgICAgICAgICB9KS50aGVuKChyZXN1bHQpID0+IHtcclxuICAgICAgICAgICAgICAgIGlmIChyZXN1bHQuaXNDb25maXJtZWQpIHtcclxuICAgICAgICAgICAgICAgICAgICAkLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlOiBcIkRFTEVURVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB1cmw6IFVybF9Cb29rX2luZGV4ICsnLycrIGlkLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICB3aW5kb3cuTGFyYXZlbERhdGFUYWJsZXNbXCJib29rcy10YWJsZVwiXS5hamF4LnJlbG9hZCgpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICdEZWxldGVkIScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJ1lvdXIgZmlsZSBoYXMgYmVlbiBkZWxldGVkLicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJ3N1Y2Nlc3MnXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICApXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnc3VjY2VzcycpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSlcclxuICAgICAgICB9KTtcclxuICAgIH0pO1xyXG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2Jvb2svYm9vay5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/book/book.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/book/book.js"]();
/******/ 	
/******/ })()
;