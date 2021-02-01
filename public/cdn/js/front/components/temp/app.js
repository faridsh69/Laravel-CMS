Vue.filter('persian_digits', function (value) {
    var i;
    var english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    var persian_numbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    var output = commafy(Math.round(value) ).toString();
    for (i = 0; i < 10; i++) {
        output = output.replace(new RegExp(english_numbers[i], "gim"), persian_numbers[i]);
    }
    return output;
}); 
new Vue({
    el: '#vue_id'
});
function commafy( num ) {
    var str = num.toString().split('.');
    if (str[0].length >= 4) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    if (str[1] && str[1].length >= 5) {
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }
    return str.join('.');
}