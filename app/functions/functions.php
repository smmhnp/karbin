<?php

function Role ($role){
    switch ($role):
        case 'super_admin':
            $rol = 'مدیر ارشد';
            break;
        case 'admin':
            $rol = 'مدیر پروژه';
            break;
        case 'developer':
            $rol = 'توسعه دهنده';
            break;
        case 'user':
            $rol = 'کاربر عادی';
            break;  
        default:
            $rol = "";
            break;
    endswitch;

    return $rol;
}

function color_preference_style ($preference){
                        
    switch ($preference) :
        case 'بالا' :
            $color = 'high';
            break;
        case 'متوسط' :
            $color = 'medium';
            break;
        case 'پایین' :
            $color = 'low';
            break;
    endswitch;

    return $color;
}

function translate_preference ($preference){
                        
    switch ($preference) :
        case 'بالا' :
            $preference = 'high';
            break;
        case 'متوسط' :
            $preference = 'medium';
            break;
        case 'پایین' :
            $preference = 'low';
            break;
    endswitch;

    return $preference;
}

function color_status_style ($status){
                        
    switch ($status) :
        case 'برای انجام' :
            $color = 'todo';
            break;
        case 'در حال انجام' :
            $color = 'inprogress';
            break;
        case 'بازبینی' :
            $color = 'review';
            break;
        case 'انجام شده' :
            $color = 'done';
            break;
    endswitch;

    return $color;
}

function translate_status($status){
                        
    switch ($status) :
        case 'برای انجام' :
            $status = 'todo';
            break;
        case 'در حال انجام' :
            $status = 'inprogress';
            break;
        case 'بازبینی' :
            $status = 'review';
            break;
        case 'انجام شده' :
            $status = 'done';
            break;
    endswitch;

    return $status;
}

function status ($status){
    switch ($status):
        case 'active':
            $result = 'فعال';
            break;
        case 'inactive':
            $result = 'غیرفعال';
            break;
    endswitch;

    return $result;
}