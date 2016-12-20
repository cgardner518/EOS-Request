
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


// var $form = $('form.dz');
// if ($form.length == 0) {
//     isAdvancedUpload = false;
// }
// if (isAdvancedUpload) {
//     var droppedFiles = false,
//         $displayBlock = $('#docs_block'),
//         $input = $form.find('#documentation_1'),
//         $label = $form.find('label[for="documentation_1"]'),
//         showFiles = function (files) {
//             $label.text(files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace('{count}', files.length) : files[0].name);
//         };
//
//     //Setup the file upload to handle multiple files & enable Drag & Drop
//     $input.attr('multiple', '').addClass('hide-and-send');
//     $('#docs_add_field').hide();
//     $displayBlock.addClass('dropfile-capable');
//
//     $input.on('change', function (e) {
//         showFiles(e.target.files);
//     });
//
//     $displayBlock.on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
//             e.preventDefault();
//             e.stopPropagation();
//         })
//         .on('dragover dragenter', function () {
//             $displayBlock.addClass('is-dragover');
//         })
//         .on('dragleave dragend drop', function () {
//             $displayBlock.removeClass('is-dragover');
//         })
//         .on('drop', function (e) {
//             droppedFiles = e.originalEvent.dataTransfer.files;
//             showFiles(droppedFiles);
//             $displayBlock.find('.badge').fadeOut();
//         });
//
//     $form.on('submit', function (e) {
//         e.preventDefault();
//         e.stopPropagation();
//
//         if ($form.hasClass('is-uploading')) {
//             return false;
//         }
//
//         $form.addClass('is-uploading');
//
//         var ajaxData = new FormData($form.get(0));
//
//         if (droppedFiles) {
//             $.each(droppedFiles, function (i, file) {
//                 ajaxData.append($input.attr('name'), file);
//             });
//         }
//
//         if (window.saveAction == "promote") {
//             ajaxData.append('promote', true);
//         }
//
//         if (window.workflowAction) {
//             ajaxData.append('workflowAction', window.workflowAction);
//         }
//         $.ajax({
//             url: $form.attr('action'),
//             type: $form.attr('method'),
//             data: ajaxData,
//             dataType: 'json',
//             cache: false,
//             contentType: false,
//             processData: false,
//             complete: function () {
//                 $form.removeClass('is-uploading');
//             },
//             success: function (data) {
//                 if (data.success) {
//                     if (data.redirect) {
//                         console.log("redirecting to " + data.redirect);
//                         window.location.href = data.redirect;
//                     } else if (data.noredirect) {
//                         //not sure what XHR is doing here because chrome won't show responses.
//                         //do nothing.
//                     } else {
//                         window.location.href = "/" + $form.data('route');
//                     }
//                 } else if (data.error) {
//                     $.gritter.add({
//                         // (string | mandatory) the heading of the notification
//                         title: 'Submission Error',
//                         // ((bool | optional) if you want it to fade out on its own or just sit there
//                         //sticky: true,
//                         // (string | mandatory) the text inside the notification
//                         text: data.error
//                     });
//                 } else {
//                     $.gritter.add({
//                         // (string | mandatory) the heading of the notification
//                         title: 'Submission Error',
//                         // ((bool | optional) if you want it to fade out on its own or just sit there
//                         //sticky: true,
//                         // (string | mandatory) the text inside the notification
//                         text: 'There was an unknown error.'
//                     });
//                 }
//             },
//             error: function (data) {
//                 if (data.responseJSON.hasOwnProperty("redirect")) {
//                     var redirect = data.responseJSON.redirect;
//                     delete data.responseJSON.redirect;
//                     window.location.href = redirect;
//                 }
//                 if (data.responseJSON.hasOwnProperty("js")) {
//                     var js = data.responseJSON.js;
//                     delete data.responseJSON.js;
//                     postGritterAction(js);
//                 }
//                 displayGritter(data.responseJSON);
//             },
//         });
//     });
// } // End isAdvancedUpload
