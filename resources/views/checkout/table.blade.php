<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
    <meta name="author" content="FURION" />
    <style type="text/css">
        html {
            font-family: Calibri, Arial, Helvetica, sans-serif;
            font-size: 11pt;
            background-color: white
        }

        a.comment-indicator:hover+div.comment {
            background: #ffd;
            position: absolute;
            display: block;
            border: 1px solid black;
            padding: 0.5em
        }

        a.comment-indicator {
            background: red;
            display: inline-block;
            border: 1px solid black;
            width: 0.5em;
            height: 0.5em
        }

        div.comment {
            display: none
        }

        table {
            /* position: absolute;
            left: -9999px; */
            /* display: none; */
            width: 100%;
            border-collapse: collapse;
            page-break-after: always
        }

        .gridlines td {
            border: 1px dotted black
        }

        .gridlines th {
            border: 1px dotted black
        }

        .b {
            text-align: center
        }

        .e {
            text-align: center
        }

        .f {
            text-align: right
        }

        .inlineStr {
            text-align: left
        }

        .n {
            text-align: right
        }

        .s {
            text-align: left
        }

        td.style0 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style0 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style1 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style1 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style2 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style2 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style3 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style3 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style4 {
            vertical-align: bottom;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style4 {
            vertical-align: bottom;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style5 {
            vertical-align: bottom;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style5 {
            vertical-align: bottom;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style6 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style6 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style7 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style7 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style8 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style8 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style9 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style9 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style10 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style10 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style11 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style11 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style12 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style12 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style13 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style13 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style14 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style14 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style15 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style15 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style16 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style16 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style17 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style17 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style18 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style18 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style19 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style19 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style20 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style20 {
            vertical-align: bottom;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style21 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style21 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style22 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style22 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style23 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style23 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style24 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style24 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style25 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style25 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style26 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style26 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style27 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style27 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style28 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style28 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style29 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style29 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style30 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style30 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style31 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style31 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style32 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style32 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style33 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style33 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style34 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style34 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style35 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style35 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style36 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style36 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style37 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style37 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style38 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style38 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style39 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style39 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style40 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style40 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style41 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style41 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style42 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style42 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style43 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style43 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 1px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style44 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style44 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style45 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style45 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 1px solid #000000 !important;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        table.sheet0 col.col0 {
            width: 42pt
        }

        table.sheet0 col.col1 {
            width: 42pt
        }

        table.sheet0 col.col2 {
            width: 42pt
        }

        table.sheet0 col.col3 {
            width: 42pt
        }

        table.sheet0 col.col4 {
            width: 43.37777728pt
        }

        table.sheet0 col.col5 {
            width: 43.37777728pt
        }

        table.sheet0 col.col6 {
            width: 43.37777728pt
        }

        table.sheet0 col.col7 {
            width: 52.18888829pt
        }

        table.sheet0 col.col8 {
            width: 58.96666599pt
        }

        table.sheet0 tr {
            height: 15pt
        }

        table.sheet0 tr.row44 {
            height: 15.75pt
        }
    </style>
</head>

<body>
    <style>
        @page {
            margin-left: 0.7in;
            margin-right: 0.7in;
            margin-top: 0.75in;
            margin-bottom: 0.75in;
        }

        body {
            margin-left: 0.7in;
            margin-right: 0.7in;
            margin-top: 0.75in;
            margin-bottom: 0.75in;
        }
    </style>
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <tbody>
            <tr class="row0">
                <td class="column0">&nbsp;</td>
                <td class="column1 style21 s style21" colspan="7">PROFORMA INVOICE</td>
                <td class="column8">&nbsp;</td>
            </tr>
            <tr class="row1">
                <td class="column0 style6 s">Exporter/shipper</td>
                <td class="column1 style7 null"></td>
                <td class="column2 style7 null"></td>
                <td class="column3 style8 null"></td>
                <td class="column4 style6 s">Proforma Invoice No. &amp; Date</td>
                <td class="column5 style7 null"></td>
                <td class="column6 style7 null"></td>
                <td class="column7 style7 null"></td>
                <td class="column8 style8 null"></td>
            </tr>
            <tr class="row2">
                <td class="column0 style15 s"> <br> {{$sv->name}} <br> {{$sv->address}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style9 s">{{$invo}}</td>
                <td class="column5 style10 null"></td>
                <td class="column6 style36 n style36" colspan="2">{{date("d/m/Y")}}</td>
                <td class="column8 style11 null"></td>
            </tr>
            <tr class="row3">
                <td class="column0 style15 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style6 s">Buyer's Order No. &amp; Date</td>
                <td class="column5 style7 null"></td>
                <td class="column6 style7 null"></td>
                <td class="column7 style7 null"></td>
                <td class="column8 style8 null"></td>
            </tr>
            <tr class="row4">
                <td class="column0 style15 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style9 s">(Not be confimred)</td>
                <td class="column5 style10 null"></td>
                <td class="column6 style10 null"></td>
                <td class="column7 style10 null"></td>
                <td class="column8 style11 null"></td>
            </tr>
            <tr class="row5">
                <td class="column0 style9 null"></td>
                <td class="column1 style10 null"></td>
                <td class="column2 style10 null"></td>
                <td class="column3 style11 null"></td>
                <td class="column4 style12 s">Other Reference(s) : Approval N0 : {{$spv->approvalno}} Vendor No.</td>
                <td class="column5 style13 null"></td>
                <td class="column6 style13 null"></td>
                <td class="column7 style13 null"></td>
                <td class="column8 style14 null"></td>
            </tr>
            <tr class="row6">
                <td class="column0 style6 s">Processed &amp; Packed By</td>
                <td class="column1 style7 null"></td>
                <td class="column2 style7 null"></td>
                <td class="column3 style8 null"></td>
                <td class="column4 style6 null"></td>
                <td class="column5 style7 null"></td>
                <td class="column6 style7 null"></td>
                <td class="column7 style7 null"></td>
                <td class="column8 style8 null"></td>
            </tr>
            <tr class="row7">
                <td class="column0 style15 s">{{$spv->factoryaddress}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style15 null"></td>
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style16 null"></td>
            </tr>
            <tr class="row8">
                <td class="column0 style15 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style15 s">Shipment : On or before 4 weeks from confirmation</td>
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style16 null"></td>
            </tr>
            <tr class="row9">
                <td class="column0 style15 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style15 null"></td>
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style16 null"></td>
            </tr>
            <tr class="row10">
                <td class="column0 style9 null"></td>
                <td class="column1 style10 null"></td>
                <td class="column2 style10 null"></td>
                <td class="column3 style11 null"></td>
                <td class="column4 style9 null"></td>
                <td class="column5 style10 null"></td>
                <td class="column6 style10 null"></td>
                <td class="column7 style10 null"></td>
                <td class="column8 style11 null"></td>
            </tr>
            <tr class="row11">
                <td class="column0 style6 s">Consginee :</td>
                <td class="column1 style7 null"></td>
                <td class="column2 style7 null"></td>
                <td class="column3 style8 null"></td>
                <td class="column4 style7 s">Notify Party : Buyer (If other than consignee)</td>
                <td class="column5 style7 null"></td>
                <td class="column6 style7 null"></td>
                <td class="column7 style7 null"></td>
                <td class="column8 style8 null"></td>
            </tr>
            <tr class="row12">
                <td class="column0 style15 s">{{$v->name}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style16 null"></td>
            </tr>
            <tr class="row13">
                <td class="column0 style15 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style16 null"></td>
            </tr>
            <tr class="row14">
                <td class="column0 style15 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style16 null"></td>
            </tr>
            <tr class="row15">
                <td class="column0 style15 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style16 null"></td>
                <td class="column4 style10 null"></td>
                <td class="column5 style10 null"></td>
                <td class="column6 style10 null"></td>
                <td class="column7 style10 null"></td>
                <td class="column8 style11 null"></td>
            </tr>
            <tr class="row16">
                <td class="column0 style9 null"></td>
                <td class="column1 style10 null"></td>
                <td class="column2 style10 null"></td>
                <td class="column3 style11 null"></td>
                <td class="column4 style12 s">Country of Origin Goods</td>
                <td class="column5 style14 null"></td>
                <td class="column6 style12 s">Country of Final Destination</td>
                <td class="column7 style13 null"></td>
                <td class="column8 style14 null"></td>
            </tr>
            <tr class="row17">
                <td class="column0 style12 s">By Sea :</td>
                <td class="column1 style13 null"></td>
                <td class="column2 style13 null"></td>
                <td class="column3 style14 null"></td>
                <td class="column4 style25 s style26" colspan="2">India</td>
                <td class="column6 style25 null style26" colspan="3">{{$v->country}}</td>
            </tr>
            <tr class="row18">
                <td class="column0 style12 s">Port of loading : ANY PORT IN INDIA</td>
                <td class="column1 style13 null"></td>
                <td class="column2 style13 null"></td>
                <td class="column3 style14 null"></td>
                <td class="column4 style22 s style31 paymvie" colspan="5" rowspan="2">Payment : Tele</td>
            </tr>
            <tr class="row19">
                <td class="column0 style12 s">Port of Discharge : <br> {{$v->address}}</td>
                <td class="column1 style13 null"></td>
                <td class="column2 style13 null"></td>
                <td class="column3 style14 null"></td>
            </tr>
            <tr class="row20">
                <td class="column0 style22 s style23" colspan="4"></td>
                <td class="column4 style32 s style32">Size</td>
                <td class="column5 style32 s style32">Cartons</td>
                <td class="column6 style32 s style32">Total Net weight ({{$ps[0]->wsym}})</td>
                <td class="column7 style34 s style34">{{$ps[0]->sym}} / {{$ps[0]->wsym}}</td>
                <td class="column8 style32 s style32">Amount ({{$ps[0]->sym}})</td>
            </tr>
            <tr class="row22">
                <td class="column0 style1 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row23">
                <td class="column0 style1 s">Product selected : {{strtoupper($ps[0]->name)}} </td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 s sizevie"></td>
                <td class="column5 style17 n cartonvie">1</td>
                <td class="column6 style17 n quantvieo">1</td>
                <td class="column7 style17 n fistpricevie">{{$ps[0]->sym}}{{$ps[0]->price}}</td>
                <td class="column8 style19 n totalamvie">{{$ps[0]->sym}}{{$ps[0]->price}}</td>
            </tr>
            <tr class="row24">
                <td class="column0 style1 s">{{strtoupper($ps[0]->subs[0])}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row25">
                <td class="column0 style1 s">{{count($ps[0]->subs) > 1 ? strtoupper($ps[0]->subs[1]) : ''}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style19 null"></td>
            </tr>
            <tr class="row26">
                <td class="column0 style1 s">{{count($ps[0]->subs) > 2 ? strtoupper($ps[0]->subs[2]) : ''}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row27">
                <td class="column0 style1 null">{{count($ps[0]->subs) > 3 ? strtoupper($ps[0]->subs[3]) : ''}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style19 null"></td>
            </tr>
            <tr class="row28">
                <td class="column0 style1 null">{{count($ps[0]->subs) > 4 ? strtoupper($ps[0]->subs[4]) : ''}}</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row29">
                <td class="column0 style1 s shipinvie">Shiping Term : CNF</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row30">
                <td class="column0 style1 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row31">
                <td class="column0 style1 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row32">
                <td class="column0 style1 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row33">
                <td class="column0 style1 s">Total quantity and amount with tolerance of +/-10%</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row34">
                <td class="column0 style1 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row35">
                <td class="column0 style1 s quantvie"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row36">
                <td class="column0 style1 null"></td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 null"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style17 null"></td>
                <td class="column5 style17 null"></td>
                <td class="column6 style17 null"></td>
                <td class="column7 style17 null"></td>
                <td class="column8 style17 null"></td>
            </tr>
            <tr class="row37">
                <td class="column0 style12 null"></td>
                <td class="column1 style13 null"></td>
                <td class="column2 style13 null"></td>
                <td class="column3 style13 null"></td>
                <td class="column4 style18 s">Total</td>
                <td class="column5 style18 n cartonvie">1</td>
                <td class="column6 style18 n quantvieo">1</td>
                <td class="column7 style18 null"></td>
                <td class="column8 style20 n totalamvie">{{$ps[0]->sym}}{{$ps[0]->price}}</td>
            </tr>
            <tr class="row38">
                <td class="column0 style6 null"></td>
                <td class="column1 style7 null"></td>
                <td class="column2 style7 null"></td>
                <td class="column3 style7 null"></td>
                <td class="column4 style7 null"></td>
                <td class="column5 style7 null"></td>
                <td class="column6 style7 null"></td>
                <td class="column7 style7 null"></td>
                <td class="column8 style8 null"></td>
            </tr>
            <tr class="row39">
                <td class="column0 style15 s">Amount in Words :</td>
                <td class="column1 style2 null"></td>
                <td class="column2 style2 s amwordvie"></td>
                <td class="column3 style2 null"></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style16 null"></td>
            </tr>
            <tr class="row40">
                <td class="column0 style9 null"></td>
                <td class="column1 style10 null"></td>
                <td class="column2 style10 null"></td>
                <td class="column3 style10 null"></td>
                <td class="column4 style10 null"></td>
                <td class="column5 style10 null"></td>
                <td class="column6 style10 null"></td>
                <td class="column7 style10 null"></td>
                <td class="column8 style11 null"></td>
            </tr>
            <tr class="row41">
                <td class="column0 style37 s style45" colspan="5" rowspan="4">Note : This is a computer generated
                    invoice on behalf of Vendor for estimate price calculation. Official confirmation and profroma
                    invoice will follow.</td>
                <td class="column5 style22 s style24" colspan="4">For</td>
            </tr>
            <tr class="row42">
                <td class="column5 style2 s">On behalf of {{$sv->name}}.</td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style3 null"></td>
            </tr>
            <tr class="row43">
                <td class="column5 style2 null"></td>
                <td class="column6 style2 null"></td>
                <td class="column7 style2 null"></td>
                <td class="column8 style3 null"></td>
            </tr>
            <tr class="row44">
                <td class="column5 style4 null"></td>
                <td class="column6 style4 null"></td>
                <td class="column7 style4 null"></td>
                <td class="column8 style5 null"></td>
            </tr>
        </tbody>
    </table>
</body>

</html>