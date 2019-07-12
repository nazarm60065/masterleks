'use strict';

import $ from 'jquery';

window.$ = window.jQuery = window.jquery = $;
import Blazy from 'blazy.min';

window.bLazy = new Blazy();

import './common.sass';

$(document).ready(function () {
    $(window).on('load', function () {
        bLazy.revalidate();
    });
});
