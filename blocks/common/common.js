'use strict';

import $ from 'jquery';

window.$ = window.jQuery = window.jquery = $;
import Blazy from 'blazy.min';

window.bLazy = new Blazy();

import './common.sass';
import YandexMetrics from 'yandex-metrics/yandex-metrica';

$(document).ready(function () {
    $(window).on('load', function () {
        bLazy.revalidate();
    });

    window.YandexMetrics = YandexMetrics;
    if (window.YandexMetrics) {
        window.yandexMetricsInstance = new YandexMetrics({
            yaCounter: 'yaCounter45957462'
        });
    }
});
