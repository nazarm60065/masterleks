'use strict';

export  default function YandexMetrics(params) {
    this.params = $.extend({
            yaCounter: '',
            selectors: {
                itemClick: '[data-yandex-goals]'
            }
        },
        params
    );

    this.selectors = this.params.selectors;
    this.yaCounter = this.params.yaCounter;
    this.attachEvents();
};

YandexMetrics.prototype = {
    constructor: window.YandexMetrics,

    attachEvents: function () {
        this.onClickHandler = this.onClickHandler.bind(this);
        this.reachGoals = this.reachGoals.bind(this);
        this.isIsSetMetrics = this.isIsSetMetrics.bind(this);
        this.reachGoal = this.reachGoal.bind(this);

        $(document).on('click', this.selectors.itemClick, this.onClickHandler);
    },

    onClickHandler: function (e) {
        var goals = $(e.currentTarget).data('yandex-goals');

        if (goals && goals.length) {
            this.reachGoals(goals);
        }
    },

    reachGoals: function (goals) {
        if (this.isIsSetMetrics()) {
            $.each(goals, this.reachGoal);
        }
    },

    isIsSetMetrics: function () {
        return typeof window[this.yaCounter] !== 'undefined';
    },

    reachGoal: function (key, value) {
        window[this.yaCounter].reachGoal(value);
    },
};
