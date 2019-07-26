(function (window, document, $) {
    'use strict';

    var methods = {
        /**
         * Инициализация
         * @param options
         * @returns {methods}
         */
        init: function (options) {
            var data, _this;

            _this = this;
            data = $.extend({
                group: '.feedback-form__group',
                control: '.feedback-form__control',
                control_required: '.feedback-form__control_required',

                control_type_text: '.feedback-form__control_type_text',
                control_type_textarea: '.feedback-form__control_type_textarea',
                control_type_list: '.feedback-form__control_type_list',
                control_type_radio: '.feedback-form__control_type_radio',
                control_type_checkbox: '.feedback-form__control_type_checkbox',
                control_type_file: '.feedback-form__control_type_file',

                pseudoFileControl: '.feedback-form__pseudo-file-control',
                pseudoFilesList: '.feedback-form__files-list',
                pseudoFilesItem: '.feedback-form__files-item',

                control_valid_email: '.feedback-form__control_valid_email',
                control_valid_phone: '.feedback-form__control_valid_phone',
                control_valid_textRu: '.feedback-form__control_valid_text-ru',
                control_valid_phoneOrEmail: '.feedback-form__control_valid_phone_or_email',

                submitButton: '.feedback-form__submit',
                submit_uploadProgress: '.feedback-form__submit_upload-progress',

                has_error: '.feedback-form__group_has_error',
                uploadProgressHtml: 'Отправка ',

                successMessageMustache: '#feedback-success-message',
                anotherSuccessFunction: null
            }, options);

            data.submitHtml = $(data.submitButton).html();

            if ($(data.control_valid_phone).length > 0) {
                $(data.control_valid_phone).inputmask('+7 (999) 999-99-99');
            }

            return _this
                .on('change', data.control, data, methods.validationControl)
                .ajaxForm({
                    data: {
                        compid: _this.attr('id'),
                        action: 'submit'
                    },
                    beforeSubmit: function () {
                        return _this.feedbackForm('validationForm', {data: data});

                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        _this.find(data.submitButton).prop('disabled', true)
                            .text(data.uploadProgressHtml + percentComplete + '%...');
                    },
                    success: function (responseText, statusText, xhr, form) {
                        var view, feedbackSuccessMustache;
                        if (!(responseText.errors && responseText.errors.length)) {
                            $.fancybox.close();

                            view = {
                                title: responseText.data.successMessageTitle,
                                text: responseText.data.successMessage
                            };

                            feedbackSuccessMustache = $(data.successMessageMustache);

                            $.fancybox.open(Mustache.render(feedbackSuccessMustache.html(), view), window.fancyboxCustomSettings);
                            form.clearForm();
                            _this.find(data.submitButton).prop('disabled', false).html(data.submitHtml);

                            if (yandexMetricsInstance) {
                                yandexMetricsInstance.reachGoals(responseText.data.ya_goals);
                            }

                            if (GoogleMetricsInstance) {
                                GoogleMetricsInstance.reachGoals(responseText.data.ga_goals);
                            }
                        }
                        else {
                            console.error(responseText.errors)
                        }

                        if (!!data.anotherSuccessFunction) {
                            data.anotherSuccessFunction();
                        }
                    }
                })
                .on('change', data.control_type_file, data, methods.onChangeControlTypeFile);
        },
        /**
         *
         * @param e
         * @returns {boolean}
         */
        validationForm: function validationForm(e) {
            var formValid;

            formValid = true;

            $(this).find(e.data.control).each(function () {
                if (!$(this).feedbackForm('validationControl', e)) {
                    formValid = false;
                }
            });
            return formValid;
        },
        /**
         * todo: реализовать метод для остальных типов контролов
         * @param e
         */
        validationControl: function (e) {

            if ($(this).feedbackForm('isRequired', e)) {
                switch ($(this).feedbackForm('getTypeControl', e)) {
                    default:
                    case 'text':
                    case 'textarea':
                        if ($(this).val() === '') {
                            $(this).closest(e.data.group).addClass(e.data.has_error.substring(1));
                            return false;
                        }
                        else {
                            $(this).closest(e.data.group).removeClass(e.data.has_error.substring(1));
                        }
                        break;
                }
            }

            if (!$(this).feedbackForm('validForRegExp', e)) {
                $(this).closest(e.data.group).addClass(e.data.has_error.substring(1));
                return false;
            }
            else {
                $(this).closest(e.data.group).removeClass(e.data.has_error.substring(1));
            }

            return true;
        },

        isRequired: function (e) {
            return $(this).hasClass(e.data.control_required.substring(1));
        },

        /**
         * todo: реализовать метод
         * @param e
         */
        getTypeControl: function (e) {
            return 'text';
        },

        validForRegExp: function (e) {
            var pattern;

            if ($(this).length && $(this).val() !== '') {
                if ($(this).hasClass(e.data.control_valid_email.substring(1))) {
                    pattern = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                }
                else if ($(this).hasClass(e.data.control_valid_phone.substring(1))) {
                    pattern = /^[0-9() +-]+$/;
                } else if ($(this).hasClass(e.data.control_valid_phoneOrEmail.substring(1))) {
                    pattern = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|^[0-9() +-]+$/;
                }
                else if ($(this).hasClass(e.data.control_valid_textRu.substring(1))) {
                    pattern = /^[а-яА-Яёй -]+$/;
                }
                if (pattern) {
                    return pattern.test($(this).val());
                }
            }
            return true;
        },

        openFileDialog: function (e) {
            $(this)
                .closest(e.data.group)
                .find(e.data.control_type_file)
                .trigger('click');

            e.preventDefault();
        },

        onChangeControlTypeFile: function (e) {
            var file = $(this),
            group = file.closest(e.data.group),
            pseudoFile = group.find(e.data.pseudoFileControl);

            if (file[0].files && file[0].files.length) {
                pseudoFile.find('.feedback-form__pseudo-file-control-text').text(file[0].files[0].name);
            } else {
                pseudoFile.find('.feedback-form__pseudo-file-control-text').text("Выберите файл");
            }
        },

        onDeleteFileItem: function (e) {

        }
    };

    $.fn.feedbackForm = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === "object" || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Метод с именем ' + method + ' не существует для jQuery.feedbackForm');
        }
    };


    $(document).ready(function () {
        $('.feedback-form-link').fancybox($.extend({}, window.fancyboxCustomSettings, {
            beforeLoad: function (instance, current) {
                var $feedbackFormLink = instance.$lastFocus,
                    dataReplace = $feedbackFormLink.data('replaceText'),
                    $content = $(current.src);

                $.each(dataReplace, function (index, data) {
                    if (data.type === 'html') {
                        $content.find(data.selector).html(data.value);
                    }
                    if (data.type === 'val') {
                        $content.find(data.selector).val(data.value);
                    }
                });
            }
        }));
    });
}(window, document, jQuery));
