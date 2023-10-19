/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var editTaskForm = $('#edit-task-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (editTaskForm.length) {
    editTaskForm.validate({
      rules: {
        'project_id': {
          required: true,
        },
        'name': {
          required: true,
        },
        'priority': {
          required: true,
        },
        'description': {
          required: true,
        },
      }
    });
  }
});
