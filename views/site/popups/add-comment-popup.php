<div class="add-comment-popup popup">
    <div class="close-popup-btn" svg-data-uri></div>
    <div class="add-comment-popup__content">
        <div class="add-comment-popup__title">Добавьте ваш комментарий к набору</div>
        <div class="add-comment-popup__tip">
            Если вы не нашли нужный набор, укажите нам ваши пожелания и приложите фотографии.
        </div>

        <form class="main-form" id="uploadForm">
            <div class="main-form__row">
                <input type="email" class="main-form__input input-field" required placeholder="Почта">
            </div>
            <div class="main-form__row">
                <input type="text" class="main-form__input input-field" required placeholder="Ваше сообщение">
            </div>
            <div class="files-container">
                <div class="drop-wrap">
                    <div class="drop-hint">Перетащите файлы сюда</div>
                    <div id="drop">
                        <div class="file-name-wrap">
                            <span class="drop-title">Загрузить изображение</span>
                            <a class="file-name dashed-btn">Загрузить фото</a>
                        </div>
                        <input type="file" class="input-file" name="upl" multiple />
                    </div>
                </div>
                <div class="warning">Разрешенные типы файлов: png, jpg, jpeg, gif</div>
                <div class="imgs-for-upload"><ul></ul></div>
            </div>
            <button type="send" class="blue-btn"><span>Отправить</span></button>
        </form>

    </div>
</div>