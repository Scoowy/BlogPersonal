import * as jquery from 'jquery-3.2.1.min';

function $(alias) {
    return document.getElementById(alias);
}

function linkActivo(n) { 

    var link = n

    $(link).jquery.addClass("active");

}
