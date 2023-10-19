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

  var editProjectForm = $('#edit-project-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (editProjectForm.length) {
    editProjectForm.validate({
      rules: {
        'name': {
          required: true,
        },
      }
    });
  }
});
