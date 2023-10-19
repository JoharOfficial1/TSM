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

  var createTaskForm = $('#create-task-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (createTaskForm.length) {
    createTaskForm.validate({
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
