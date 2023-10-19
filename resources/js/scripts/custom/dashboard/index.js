$('#projects').on('change', function () {
    $('#draggable-list-card').text('');

    data = {
        project_id: $("#projects").val()
    };

    $.ajax({
        url: '/dashboard/getProjectByAjax',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (project) {
            $('#draggable-list-card').append(
                '<ul class="list-group" id="basic-list-group">'+
                '</ul>'
            );

            $.each(project.tasks, function (index, task) {
                $('#basic-list-group').append(
                    '<li class="list-group-item draggable">'+
                        '<input type="hidden" value="'+ task.id +'" class="task-id">'+
                        '<div class="media">'+
                            '<div class="media-body">'+
                                '<h5>'+ task.name +'</h5>'+
                                '<span>'+ task.description +'</span>'+
                            '</div>'+
                        '</div>'+
                    '</li>'
                );
            });

            var drake = dragula([document.getElementById('basic-list-group')]);

            // Listen for the 'drop' event
            drake.on('drop', function(el, target, source, sibling) {
                updateTaskPriority();
            });
        }, error: function (error) {
            console.log(error);
        }
    });
});

function updateTaskPriority() {
    var tasksId = [];
    var taskIdInputs = $('#basic-list-group .task-id');

    $.each(taskIdInputs, function (index, inputField) {
        tasksId[index] = $(inputField).val();
    });

    data = {
        tasks_id: tasksId
    };

    $.ajax({
        url: '/tasks/updateTaskPriorityByAjax',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (data) {
            alert(data)
        }, error: function (error) {
            console.log(error);
        }
    });
}