$('.subform').on('submit', function(e) {
    e.preventDefault(); // Отменяем стандартное действие формы

    var formData = $(this).serialize(); // Сериализуем данные формы

    $.ajax({
        url: $(this).attr('action'), // URL для отправки AJAX запроса
        type: 'POST', // Метод запроса
        data: formData, // Данные для отправки
        success: function(response) {
            // Обработка успешного ответа
            console.log(response);
        },
        error: function(xhr, status, error) {
            // Обработка ошибки
            if (xhr.status === 422) {
                // Обработка ошибок валидации
                var errors = xhr.responseJSON.errors;
                for (var field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        var errorLabel = $(this).find('label[for="' + field + '"]');
                        errorLabel.text(errors[field][0]); // Первая ошибка для поля
                    }
                }
            } else {
                console.error(error);
            }
        }
    });
});







