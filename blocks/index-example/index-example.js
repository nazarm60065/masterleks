"use strict";

import './index-example.mustache';

export default () => {
    /* Пример экспорта анонимной функции по умолчанию */

    console.info('hello, World!');
}

export class NamedClass {
    /* Пример экспорта именованного класса  */

    constructor(params) {
        this.params = $.extend(true, {

        },
            params);

        this.init();
    }

    init() {
        console.info('hello, World!');
    }
}