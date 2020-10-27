$(document).ready(function() {
    var maxSum = getMaxSum();
    var paymentLink = getPaymentLink();
    var currentSum;

    $('.payment-sum__value').on('input', function() {
        validatePaymentSum.call(this);
    });

    $('.sberbank-pay__link').on('click', function(event) {
        event.preventDefault();
        redirectTo(paymentLink + '&sum=' + currentSum);
    });

    function validatePaymentSum() {
        this.value = this.value.replace(/[^0-9.]/g, '');

        if (Number.parseFloat(this.value) > maxSum) {
            this.value = maxSum;
        }

        currentSum = this.value;
        setPaymentButtonState();
    }
});

function getMaxSum() {
    return Number.parseFloat($('.payment-sum__value').data('max-sum').replace(' ', ''));
}

function getPaymentLink() {
    return $('.sberbank-pay__link').attr('href');
}

function setPaymentButtonState() {
    if ($('.payment-sum__value').val() === "") {
        $('.sberbank-pay__link').addClass('sberbank-pay__link_disabled');
    }
    else {
        $('.sberbank-pay__link').removeClass('sberbank-pay__link_disabled');
    }
}

function redirectTo(url) {
    var link = document.createElement('a');
    link.setAttribute('target', '_blank');
    link.setAttribute('href', url);
    link.click();
}