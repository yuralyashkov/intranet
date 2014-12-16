var $ = jQuery.noConflict();

jQuery(document).ready(function() {
    // В dataTransfer помещаются изображения которые перетащили в область div
    jQuery.event.props.push('dataTransfer');

    // Максимальное количество загружаемых изображений за одни раз
    var maxFiles = 6;

    // Оповещение по умолчанию
    var errMessage = 0;

    // Кнопка выбора файлов
    var defaultUploadBtn = jQuery('#uploadbtn');

    // Массив для всех изображений
    var dataArray = [];

    // Область информер о загруженных изображениях - скрыта
    jQuery('#uploaded-files').hide();

    // Метод при падении файла в зону загрузки
    jQuery('#drop-files').on('drop', function(e) {
        // Передаем в files все полученные изображения
        var files = e.dataTransfer.files;
        // Проверяем на максимальное количество файлов
        if (files.length <= maxFiles) {
            // Передаем массив с файлами в функцию загрузки на предпросмотр
            loadInView(files);
        } else {
            alert('Вы не можете загружать больше '+maxFiles+' изображений!');
            files.length = 0; return;
        }
        return false;
    });

    // При нажатии на кнопку выбора файлов
    defaultUploadBtn.on('change', function() {
        // Заполняем массив выбранными изображениями
        var files = jQuery(this)[0].files;
        // Проверяем на максимальное количество файлов
        if (files.length <= maxFiles) {
            // Передаем массив с файлами в функцию загрузки на предпросмотр
            loadInView(files);
            // Очищаем инпут файл путем сброса формы
            jQuery('#frm').each(function(){
                this.reset();
            });
        } else {
            alert('Вы не можете загружать больше '+maxFiles+' изображений!');
            files.length = 0;
        }
    });

    // Функция загрузки изображений на предросмотр
    function loadInView(files) {
        // Показываем обасть предпросмотра
        jQuery('#uploaded-holder').show();

        // Для каждого файла
        jQuery.each(files, function(index, file) {

            // Несколько оповещений при попытке загрузить не изображение
            if (!files[index].type.match('image.*')) {

                if(errMessage == 0) {
                    jQuery('#drop-files p').html('Эй! только изображения!');
                    ++errMessage
                }
                else if(errMessage == 1) {
                    jQuery('#drop-files p').html('Стоп! Загружаются только изображения!');
                    ++errMessage
                }
                else if(errMessage == 2) {
                    jQuery('#drop-files p').html("Не умеешь читать? Только изображения!");
                    ++errMessage
                }
                else if(errMessage == 3) {
                    jQuery('#drop-files p').html("Хорошо! Продолжай в том же духе");
                    errMessage = 0;
                }
                return false;
            }

            // Проверяем количество загружаемых элементов
            if((dataArray.length+files.length) <= maxFiles) {
                // показываем область с кнопками
                jQuery('#upload-button').css({'display' : 'block'});
            }
            else { alert('Вы не можете загружать больше '+maxFiles+' изображений!'); return; }

            // Создаем новый экземпляра FileReader
            var fileReader = new FileReader();
            // Инициируем функцию FileReader
            fileReader.onload = (function(file) {

                return function(e) {
                    // Помещаем URI изображения в массив
                    dataArray.push({name : file.name, value : this.result, size : file.size});
                    addImage((dataArray.length-1));
                };

            })(files[index]);
            // Производим чтение картинки по URI
            fileReader.readAsDataURL(file);
        });
        return false;
    }

    // Процедура добавления эскизов на страницу
    function addImage(ind) {
        // Если индекс отрицательный значит выводим весь массив изображений
        if (ind < 0 ) {
            start = 0; end = dataArray.length;
        } else {
            // иначе только определенное изображение
            start = ind; end = ind+1; }
        // Оповещения о загруженных файлах
        if(dataArray.length == 0) {
            // Если пустой массив скрываем кнопки и всю область
            jQuery('#upload-button').hide();
            jQuery('#uploaded-holder').hide();
        } else if (dataArray.length == 1) {
            jQuery('#upload-button span#much-files').html("Был выбран 1 файл");
        } else {
            jQuery('#upload-button span#much-files').html(dataArray.length+" файлов были выбраны");
        }
        // Цикл для каждого элемента массива
        for (i = start; i < end; i++) {
            // размещаем загруженные изображения
            if(jQuery('#dropped-files > .image').length <= maxFiles) {
                jQuery('#dropped-files').append('<div id="img-'+i+'" class="image"><img src="'+dataArray[i].value+'"><span class="file-name">'+dataArray[i].name+'</span><span class="file-size">'+(dataArray[i].size/1024).toFixed(2)+' КБ</span><a href="#" id="drop-'+i+'" class="drop-button"><span class="iconfa-remove"></span></a></div>');
            }
        }
        return false;
    }

    // Функция удаления всех изображений
    function restartFiles() {

        // Установим бар загрузки в значение по умолчанию
        jQuery('#loading-bar .loading-color').css({'width' : '0%'});
        jQuery('#loading').css({'display' : 'none'});
        jQuery('#loading-content').html(' ');

        // Удаляем все изображения на странице и скрываем кнопки
        jQuery('#upload-button').hide();
        jQuery('#dropped-files > .image').remove();
        jQuery('#uploaded-holder').hide();

        // Очищаем массив
        dataArray.length = 0;

        return false;
    }

    // Удаление только выбранного изображения
    jQuery("#dropped-files").on("click","a[id^='drop']", function() {
        // получаем название id
        var elid = jQuery(this).attr('id');
        // создаем массив для разделенных строк
        var temp = new Array();
        // делим строку id на 2 части
        temp = elid.split('-');
        // получаем значение после тире тоесть индекс изображения в массиве
        dataArray.splice(temp[1],1);
        // Удаляем старые эскизы
        jQuery('#dropped-files > .image').remove();
        // Обновляем эскизи в соответсвии с обновленным массивом
        addImage(-1);
    });

    // Удалить все изображения кнопка
    jQuery('#dropped-files #upload-button .delete').click(restartFiles);

    // Загрузка изображений на сервер
    jQuery('#upload-button .upload').click(function() {

        // Показываем прогресс бар
        jQuery("#loading").show();
        // переменные для работы прогресс бара
        var totalPercent = 100 / dataArray.length;
        var x = 0;

        jQuery('#loading-content').html('Загружен '+dataArray[0].name);
        // Для каждого файла
        jQuery.each(dataArray, function(index, file) {
            // загружаем страницу и передаем значения, используя HTTP POST запрос
            jQuery.post('/company/tasks/ajax/upload.php', dataArray[index], function(data) {

                var fileName = dataArray[index].name;
                ++x;

                // Изменение бара загрузки
                jQuery('#loading-bar .loading-color').css({'width' : totalPercent*(x)+'%'});
                // Если загрузка закончилась
                if(totalPercent*(x) == 100) {
                    // Загрузка завершена
                    jQuery('#loading-content').html('Загрузка завершена!');

                    // Вызываем функцию удаления всех изображений после задержки 1 секунда
                    setTimeout(restartFiles, 1000);
                    // если еще продолжается загрузка
                } else if(totalPercent*(x) < 100) {
                    // Какой файл загружается
                    jQuery('#loading-content').html('Загружается '+fileName);
                }

                // Формируем в виде списка все загруженные изображения
                // data формируется в upload.php
                var dataSplit = data.split(':');
                if(dataSplit[1] == 'загружен успешно') {
                    jQuery('#uploaded-files').append('<li><a href="images/'+dataSplit[0]+'">'+fileName+'</a> загружен успешно</li>');

                } else {
                    jQuery('#uploaded-files').append('<li><a href="images/'+data+'. Имя файла: '+dataArray[index].name+'</li>');
                }

            });
        });
        // Показываем список загруженных файлов
        jQuery('#uploaded-files').show();
        return false;
    });

    // Простые стили для области перетаскивания
    jQuery('#drop-files').on('dragenter', function() {
        jQuery(this).css({'box-shadow' : 'inset 0px 0px 20px rgba(0, 0, 0, 0.1)', 'border' : '2px dashed #bb2b2b'});
        return false;
    });

    jQuery('#drop-files').on('drop', function() {
        jQuery(this).css({'box-shadow' : 'none', 'border' : '2px dashed rgba(0,0,0,0.2)'});
        return false;
    });
});