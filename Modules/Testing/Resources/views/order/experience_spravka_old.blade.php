<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
	<style type="text/css">
        /*body {
            font-family: "Times New Roman";
        }
        @font-face {
            font-family: 'Times New Roman';
            src: url({{ storage_path('fonts\times.ttf') }}) format("truetype");
            font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here
        }*/
        .menu {
        position: fixed;
        left:32.5cm;
        top: 0.5cm;
        background-color: lightblue;
        padding: 10px;
        }
		.menu a {
        color: darkblue;
        text-decoration: underline dotted #fff;
        padding:4px 5px 2px 9px;
        }
        .category-wrap h3 {
        font-size: 16px;
        color: rgba(0,0,0,.6);
        margin: 0 0 10px;
        padding: 0 5px;
        position: relative;
        }
        .category-wrap h3:after {
        content: "";
        width: 6px;
        height: 6px;
        /*background: #80C8A0;*/
        position: absolute;
        right: 5px;
        bottom: 2px;
        /*box-shadow: -8px -8px #80C8A0, 0 -8px #80C8A0, -8px 0 #80C8A0;*/
        }
        .category-wrap ul {
        list-style: none;
        margin: 0;
        padding: 0;
        border-top: 1px solid rgba(0,0,0,.3);
        }
        .category-wrap li {margin: 12px 0 0 0px;}
        .category-wrap a {
        text-decoration: none;
        display: block;
        font-size: 13px;
        color: rgba(0,0,0,.6);
        padding: 5px;
        position: relative;
        transition: .3s linear;
        }
        .category-wrap a:after {

        }
        .category-wrap a:hover {
        background: #80C8A0;
        color: white;
        }

        @media print {
            .category-wrap {visibility: hidden;}
        }
      @import url("https://themes.googleusercontent.com/fonts/css?kit=wAPX1HepqA24RkYW1AuHYA");
      .lst-kix_list_4-1 > li {
        counter-increment: lst-ctn-kix_list_4-1;
      }
      ol.lst-kix_list_3-1 {
        list-style-type: none;
      }
      ol.lst-kix_list_3-2 {
        list-style-type: none;
      }
      .lst-kix_list_3-1 > li {
        counter-increment: lst-ctn-kix_list_3-1;
      }
      ol.lst-kix_list_3-3 {
        list-style-type: none;
      }
      ol.lst-kix_list_3-4.start {
        counter-reset: lst-ctn-kix_list_3-4 0;
      }
      .lst-kix_list_5-1 > li {
        counter-increment: lst-ctn-kix_list_5-1;
      }
      ol.lst-kix_list_3-4 {
        list-style-type: none;
      }
      .lst-kix_list_2-1 > li {
        counter-increment: lst-ctn-kix_list_2-1;
      }
      ul.lst-kix_list_1-0 {
        list-style-type: none;
      }
      ol.lst-kix_list_3-0 {
        list-style-type: none;
      }
      ol.lst-kix_list_2-6.start {
        counter-reset: lst-ctn-kix_list_2-6 0;
      }
      .lst-kix_list_3-0 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) ". ";
      }
      ol.lst-kix_list_3-1.start {
        counter-reset: lst-ctn-kix_list_3-1 0;
      }
      .lst-kix_list_3-1 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) ". ";
      }
      .lst-kix_list_3-2 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) "."
          counter(lst-ctn-kix_list_3-2, decimal) ". ";
      }
      .lst-kix_list_4-0 > li {
        counter-increment: lst-ctn-kix_list_4-0;
      }
      .lst-kix_list_5-0 > li {
        counter-increment: lst-ctn-kix_list_5-0;
      }
      ol.lst-kix_list_2-3.start {
        counter-reset: lst-ctn-kix_list_2-3 0;
      }
      ul.lst-kix_list_1-3 {
        list-style-type: none;
      }
      .lst-kix_list_3-5 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) "."
          counter(lst-ctn-kix_list_3-2, decimal) "."
          counter(lst-ctn-kix_list_3-3, decimal) "."
          counter(lst-ctn-kix_list_3-4, decimal) "."
          counter(lst-ctn-kix_list_3-5, decimal) ". ";
      }
      ul.lst-kix_list_1-4 {
        list-style-type: none;
      }
      ul.lst-kix_list_1-1 {
        list-style-type: none;
      }
      .lst-kix_list_3-4 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) "."
          counter(lst-ctn-kix_list_3-2, decimal) "."
          counter(lst-ctn-kix_list_3-3, decimal) "."
          counter(lst-ctn-kix_list_3-4, decimal) ". ";
      }
      ul.lst-kix_list_1-2 {
        list-style-type: none;
      }
      ul.lst-kix_list_1-7 {
        list-style-type: none;
      }
      .lst-kix_list_3-3 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) "."
          counter(lst-ctn-kix_list_3-2, decimal) "."
          counter(lst-ctn-kix_list_3-3, decimal) ". ";
      }
      ol.lst-kix_list_3-5 {
        list-style-type: none;
      }
      ul.lst-kix_list_1-8 {
        list-style-type: none;
      }
      ol.lst-kix_list_3-6 {
        list-style-type: none;
      }
      ul.lst-kix_list_1-5 {
        list-style-type: none;
      }
      ol.lst-kix_list_3-7 {
        list-style-type: none;
      }
      ul.lst-kix_list_1-6 {
        list-style-type: none;
      }
      ol.lst-kix_list_3-8 {
        list-style-type: none;
      }
      .lst-kix_list_3-8 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) "."
          counter(lst-ctn-kix_list_3-2, decimal) "."
          counter(lst-ctn-kix_list_3-3, decimal) "."
          counter(lst-ctn-kix_list_3-4, decimal) "."
          counter(lst-ctn-kix_list_3-5, decimal) "."
          counter(lst-ctn-kix_list_3-6, decimal) "."
          counter(lst-ctn-kix_list_3-7, decimal) "."
          counter(lst-ctn-kix_list_3-8, decimal) ". ";
      }
      .lst-kix_list_2-0 > li {
        counter-increment: lst-ctn-kix_list_2-0;
      }
      ol.lst-kix_list_5-3.start {
        counter-reset: lst-ctn-kix_list_5-3 0;
      }
      .lst-kix_list_2-3 > li {
        counter-increment: lst-ctn-kix_list_2-3;
      }
      .lst-kix_list_3-6 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) "."
          counter(lst-ctn-kix_list_3-2, decimal) "."
          counter(lst-ctn-kix_list_3-3, decimal) "."
          counter(lst-ctn-kix_list_3-4, decimal) "."
          counter(lst-ctn-kix_list_3-5, decimal) "."
          counter(lst-ctn-kix_list_3-6, decimal) ". ";
      }
      .lst-kix_list_4-3 > li {
        counter-increment: lst-ctn-kix_list_4-3;
      }
      .lst-kix_list_3-7 > li:before {
        content: "" counter(lst-ctn-kix_list_3-0, decimal) "."
          counter(lst-ctn-kix_list_3-1, decimal) "."
          counter(lst-ctn-kix_list_3-2, decimal) "."
          counter(lst-ctn-kix_list_3-3, decimal) "."
          counter(lst-ctn-kix_list_3-4, decimal) "."
          counter(lst-ctn-kix_list_3-5, decimal) "."
          counter(lst-ctn-kix_list_3-6, decimal) "."
          counter(lst-ctn-kix_list_3-7, decimal) ". ";
      }
      ol.lst-kix_list_4-5.start {
        counter-reset: lst-ctn-kix_list_4-5 0;
      }
      ol.lst-kix_list_5-0.start {
        counter-reset: lst-ctn-kix_list_5-0 5;
      }
      ol.lst-kix_list_3-7.start {
        counter-reset: lst-ctn-kix_list_3-7 0;
      }
      .lst-kix_list_5-2 > li {
        counter-increment: lst-ctn-kix_list_5-2;
      }
      ol.lst-kix_list_4-2.start {
        counter-reset: lst-ctn-kix_list_4-2 0;
      }
      .lst-kix_list_3-2 > li {
        counter-increment: lst-ctn-kix_list_3-2;
      }
      ol.lst-kix_list_2-2 {
        list-style-type: none;
      }
      ol.lst-kix_list_2-3 {
        list-style-type: none;
      }
      .lst-kix_list_5-0 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) ". ";
      }
      ol.lst-kix_list_2-4 {
        list-style-type: none;
      }
      ol.lst-kix_list_2-5 {
        list-style-type: none;
      }
      .lst-kix_list_5-4 > li {
        counter-increment: lst-ctn-kix_list_5-4;
      }
      .lst-kix_list_4-4 > li {
        counter-increment: lst-ctn-kix_list_4-4;
      }
      ol.lst-kix_list_2-0 {
        list-style-type: none;
      }
      ol.lst-kix_list_2-1 {
        list-style-type: none;
      }
      .lst-kix_list_4-8 > li:before {
        content: "" counter(lst-ctn-kix_list_4-8, lower-roman) ". ";
      }
      .lst-kix_list_5-3 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) "."
          counter(lst-ctn-kix_list_5-2, decimal) "."
          counter(lst-ctn-kix_list_5-3, decimal) ". ";
      }
      .lst-kix_list_4-7 > li:before {
        content: "" counter(lst-ctn-kix_list_4-7, lower-latin) ". ";
      }
      .lst-kix_list_5-2 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) "."
          counter(lst-ctn-kix_list_5-2, decimal) ". ";
      }
      .lst-kix_list_5-1 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) ". ";
      }
      .lst-kix_list_5-7 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) "."
          counter(lst-ctn-kix_list_5-2, decimal) "."
          counter(lst-ctn-kix_list_5-3, decimal) "."
          counter(lst-ctn-kix_list_5-4, decimal) "."
          counter(lst-ctn-kix_list_5-5, decimal) "."
          counter(lst-ctn-kix_list_5-6, decimal) "."
          counter(lst-ctn-kix_list_5-7, decimal) ". ";
      }
      ol.lst-kix_list_5-6.start {
        counter-reset: lst-ctn-kix_list_5-6 0;
      }
      .lst-kix_list_5-6 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) "."
          counter(lst-ctn-kix_list_5-2, decimal) "."
          counter(lst-ctn-kix_list_5-3, decimal) "."
          counter(lst-ctn-kix_list_5-4, decimal) "."
          counter(lst-ctn-kix_list_5-5, decimal) "."
          counter(lst-ctn-kix_list_5-6, decimal) ". ";
      }
      .lst-kix_list_5-8 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) "."
          counter(lst-ctn-kix_list_5-2, decimal) "."
          counter(lst-ctn-kix_list_5-3, decimal) "."
          counter(lst-ctn-kix_list_5-4, decimal) "."
          counter(lst-ctn-kix_list_5-5, decimal) "."
          counter(lst-ctn-kix_list_5-6, decimal) "."
          counter(lst-ctn-kix_list_5-7, decimal) "."
          counter(lst-ctn-kix_list_5-8, decimal) ". ";
      }
      ol.lst-kix_list_4-1.start {
        counter-reset: lst-ctn-kix_list_4-1 0;
      }
      ol.lst-kix_list_4-8.start {
        counter-reset: lst-ctn-kix_list_4-8 0;
      }
      ol.lst-kix_list_3-3.start {
        counter-reset: lst-ctn-kix_list_3-3 0;
      }
      .lst-kix_list_5-4 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) "."
          counter(lst-ctn-kix_list_5-2, decimal) "."
          counter(lst-ctn-kix_list_5-3, decimal) "."
          counter(lst-ctn-kix_list_5-4, decimal) ". ";
      }
      .lst-kix_list_5-5 > li:before {
        content: "" counter(lst-ctn-kix_list_5-0, decimal) "."
          counter(lst-ctn-kix_list_5-1, decimal) "."
          counter(lst-ctn-kix_list_5-2, decimal) "."
          counter(lst-ctn-kix_list_5-3, decimal) "."
          counter(lst-ctn-kix_list_5-4, decimal) "."
          counter(lst-ctn-kix_list_5-5, decimal) ". ";
      }
      ol.lst-kix_list_2-6 {
        list-style-type: none;
      }
      ol.lst-kix_list_2-7 {
        list-style-type: none;
      }
      ol.lst-kix_list_2-8 {
        list-style-type: none;
      }
      .lst-kix_list_3-0 > li {
        counter-increment: lst-ctn-kix_list_3-0;
      }
      .lst-kix_list_3-3 > li {
        counter-increment: lst-ctn-kix_list_3-3;
      }
      ol.lst-kix_list_4-0.start {
        counter-reset: lst-ctn-kix_list_4-0 5;
      }
      .lst-kix_list_3-6 > li {
        counter-increment: lst-ctn-kix_list_3-6;
      }
      .lst-kix_list_2-5 > li {
        counter-increment: lst-ctn-kix_list_2-5;
      }
      .lst-kix_list_2-8 > li {
        counter-increment: lst-ctn-kix_list_2-8;
      }
      ol.lst-kix_list_3-2.start {
        counter-reset: lst-ctn-kix_list_3-2 0;
      }
      ol.lst-kix_list_5-5.start {
        counter-reset: lst-ctn-kix_list_5-5 0;
      }
      .lst-kix_list_2-2 > li {
        counter-increment: lst-ctn-kix_list_2-2;
      }
      ol.lst-kix_list_2-4.start {
        counter-reset: lst-ctn-kix_list_2-4 0;
      }
      ol.lst-kix_list_4-7.start {
        counter-reset: lst-ctn-kix_list_4-7 0;
      }
      ol.lst-kix_list_5-0 {
        list-style-type: none;
      }
      .lst-kix_list_2-6 > li:before {
        content: "" counter(lst-ctn-kix_list_2-6, decimal) ". ";
      }
      .lst-kix_list_2-7 > li:before {
        content: "" counter(lst-ctn-kix_list_2-7, lower-latin) ". ";
      }
      .lst-kix_list_2-7 > li {
        counter-increment: lst-ctn-kix_list_2-7;
      }
      .lst-kix_list_3-7 > li {
        counter-increment: lst-ctn-kix_list_3-7;
      }
      ol.lst-kix_list_5-1 {
        list-style-type: none;
      }
      ol.lst-kix_list_5-2 {
        list-style-type: none;
      }
      .lst-kix_list_2-4 > li:before {
        content: "" counter(lst-ctn-kix_list_2-4, lower-latin) ". ";
      }
      .lst-kix_list_2-5 > li:before {
        content: "" counter(lst-ctn-kix_list_2-5, lower-roman) ". ";
      }
      .lst-kix_list_2-8 > li:before {
        content: "" counter(lst-ctn-kix_list_2-8, lower-roman) ". ";
      }
      ol.lst-kix_list_5-4.start {
        counter-reset: lst-ctn-kix_list_5-4 0;
      }
      ol.lst-kix_list_4-6.start {
        counter-reset: lst-ctn-kix_list_4-6 0;
      }
      ol.lst-kix_list_5-1.start {
        counter-reset: lst-ctn-kix_list_5-1 0;
      }
      ol.lst-kix_list_3-0.start {
        counter-reset: lst-ctn-kix_list_3-0 3;
      }
      ol.lst-kix_list_5-7 {
        list-style-type: none;
      }
      ol.lst-kix_list_5-8 {
        list-style-type: none;
      }
      .lst-kix_list_5-7 > li {
        counter-increment: lst-ctn-kix_list_5-7;
      }
      ol.lst-kix_list_4-3.start {
        counter-reset: lst-ctn-kix_list_4-3 0;
      }
      ol.lst-kix_list_5-3 {
        list-style-type: none;
      }
      .lst-kix_list_4-7 > li {
        counter-increment: lst-ctn-kix_list_4-7;
      }
      ol.lst-kix_list_5-4 {
        list-style-type: none;
      }
      ol.lst-kix_list_3-8.start {
        counter-reset: lst-ctn-kix_list_3-8 0;
      }
      ol.lst-kix_list_5-5 {
        list-style-type: none;
      }
      ol.lst-kix_list_5-6 {
        list-style-type: none;
      }
      ol.lst-kix_list_2-5.start {
        counter-reset: lst-ctn-kix_list_2-5 0;
      }
      .lst-kix_list_5-8 > li {
        counter-increment: lst-ctn-kix_list_5-8;
      }
      .lst-kix_list_4-0 > li:before {
        content: "" counter(lst-ctn-kix_list_4-0, decimal) ". ";
      }
      .lst-kix_list_2-6 > li {
        counter-increment: lst-ctn-kix_list_2-6;
      }
      .lst-kix_list_3-8 > li {
        counter-increment: lst-ctn-kix_list_3-8;
      }
      .lst-kix_list_4-1 > li:before {
        content: "" counter(lst-ctn-kix_list_4-1, lower-latin) ". ";
      }
      .lst-kix_list_4-6 > li {
        counter-increment: lst-ctn-kix_list_4-6;
      }
      .lst-kix_list_4-4 > li:before {
        content: "" counter(lst-ctn-kix_list_4-4, lower-latin) ". ";
      }
      ol.lst-kix_list_2-2.start {
        counter-reset: lst-ctn-kix_list_2-2 0;
      }
      .lst-kix_list_4-3 > li:before {
        content: "" counter(lst-ctn-kix_list_4-3, decimal) ". ";
      }
      .lst-kix_list_4-5 > li:before {
        content: "" counter(lst-ctn-kix_list_4-5, lower-roman) ". ";
      }
      .lst-kix_list_4-2 > li:before {
        content: "" counter(lst-ctn-kix_list_4-2, lower-roman) ". ";
      }
      .lst-kix_list_4-6 > li:before {
        content: "" counter(lst-ctn-kix_list_4-6, decimal) ". ";
      }
      ol.lst-kix_list_5-7.start {
        counter-reset: lst-ctn-kix_list_5-7 0;
      }
      .lst-kix_list_5-5 > li {
        counter-increment: lst-ctn-kix_list_5-5;
      }
      .lst-kix_list_3-5 > li {
        counter-increment: lst-ctn-kix_list_3-5;
      }
      ol.lst-kix_list_4-0 {
        list-style-type: none;
      }
      .lst-kix_list_3-4 > li {
        counter-increment: lst-ctn-kix_list_3-4;
      }
      ol.lst-kix_list_4-1 {
        list-style-type: none;
      }
      ol.lst-kix_list_4-4.start {
        counter-reset: lst-ctn-kix_list_4-4 0;
      }
      ol.lst-kix_list_4-2 {
        list-style-type: none;
      }
      ol.lst-kix_list_4-3 {
        list-style-type: none;
      }
      .lst-kix_list_2-4 > li {
        counter-increment: lst-ctn-kix_list_2-4;
      }
      ol.lst-kix_list_3-6.start {
        counter-reset: lst-ctn-kix_list_3-6 0;
      }
      .lst-kix_list_5-3 > li {
        counter-increment: lst-ctn-kix_list_5-3;
      }
      ol.lst-kix_list_2-8.start {
        counter-reset: lst-ctn-kix_list_2-8 0;
      }
      ol.lst-kix_list_4-8 {
        list-style-type: none;
      }
      .lst-kix_list_1-0 > li:before {
        content: "\0020ac  ";
      }
      ol.lst-kix_list_4-4 {
        list-style-type: none;
      }
      ol.lst-kix_list_4-5 {
        list-style-type: none;
      }
      .lst-kix_list_1-1 > li:before {
        content: "o  ";
      }
      .lst-kix_list_1-2 > li:before {
        content: "\0025aa  ";
      }
      ol.lst-kix_list_2-0.start {
        counter-reset: lst-ctn-kix_list_2-0 0;
      }
      ol.lst-kix_list_4-6 {
        list-style-type: none;
      }
      ol.lst-kix_list_4-7 {
        list-style-type: none;
      }
      .lst-kix_list_1-3 > li:before {
        content: "\0025cf  ";
      }
      .lst-kix_list_1-4 > li:before {
        content: "o  ";
      }
      ol.lst-kix_list_3-5.start {
        counter-reset: lst-ctn-kix_list_3-5 0;
      }
      .lst-kix_list_4-8 > li {
        counter-increment: lst-ctn-kix_list_4-8;
      }
      .lst-kix_list_1-7 > li:before {
        content: "o  ";
      }
      ol.lst-kix_list_5-8.start {
        counter-reset: lst-ctn-kix_list_5-8 0;
      }
      ol.lst-kix_list_2-7.start {
        counter-reset: lst-ctn-kix_list_2-7 0;
      }
      .lst-kix_list_1-5 > li:before {
        content: "\0025aa  ";
      }
      .lst-kix_list_1-6 > li:before {
        content: "\0025cf  ";
      }
      .lst-kix_list_5-6 > li {
        counter-increment: lst-ctn-kix_list_5-6;
      }
      .lst-kix_list_2-0 > li:before {
        content: "" counter(lst-ctn-kix_list_2-0, decimal) ". ";
      }
      .lst-kix_list_2-1 > li:before {
        content: "" counter(lst-ctn-kix_list_2-1, lower-latin) ". ";
      }
      ol.lst-kix_list_2-1.start {
        counter-reset: lst-ctn-kix_list_2-1 0;
      }
      .lst-kix_list_4-5 > li {
        counter-increment: lst-ctn-kix_list_4-5;
      }
      .lst-kix_list_1-8 > li:before {
        content: "\0025aa  ";
      }
      .lst-kix_list_2-2 > li:before {
        content: "" counter(lst-ctn-kix_list_2-2, lower-roman) ". ";
      }
      .lst-kix_list_2-3 > li:before {
        content: "" counter(lst-ctn-kix_list_2-3, decimal) ". ";
      }
      .lst-kix_list_4-2 > li {
        counter-increment: lst-ctn-kix_list_4-2;
      }
      ol.lst-kix_list_5-2.start {
        counter-reset: lst-ctn-kix_list_5-2 0;
      }
      ol {
        margin: 0;
        padding: 0;
      }
      table td,
      table th {
        padding: 0;
      }
      .c3 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 141.7pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c32 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 454.4pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c13 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 148.8pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c14 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 163pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c12 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 23.9pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c9 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 68.2pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c21 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 92.9pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c19 {
        border-right-style: solid;
        padding: 0pt 5.8pt 0pt 5.8pt;
        border-bottom-color: #000000;
        border-top-width: 1pt;
        border-right-width: 1pt;
        border-left-color: #000000;
        vertical-align: top;
        border-right-color: #000000;
        border-left-width: 1pt;
        border-top-style: solid;
        border-left-style: solid;
        border-bottom-width: 1pt;
        width: 127.6pt;
        border-top-color: #000000;
        border-bottom-style: solid;
      }
      .c1 {
        color: #000000;
        font-weight: 400;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 12pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c17 {
        color: #333333;
        font-weight: 400;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 12pt;
        font-family: "Times New Roman";
        font-style: italic;
      }
      .c26 {
        color: #000000;
        font-weight: 400;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 14pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c16 {
        color: #000000;
        font-weight: 700;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 10pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c15 {
        color: #000000;
        font-weight: 700;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 14pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c11 {
        color: #333333;
        font-weight: 700;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 14pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c22 {
        color: #333333;
        font-weight: 400;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 14pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c18 {
        color: #000000;
        font-weight: 400;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 10pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c8 {
        color: #000000;
        font-weight: 400;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 12pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c2 {
        background-color: #ffffff;
        padding-top: 0pt;
        padding-bottom: 0pt;
        line-height: 1;
        orphans: 2;
        widows: 2;
        text-align: justify;
      }
      .c4 {
        color: #000000;
        font-weight: 700;
        text-decoration: none;
        vertical-align: baseline;
        font-size: 12pt;
        font-family: "Times New Roman";
        font-style: normal;
      }
      .c5 {
        padding-top: 0pt;
        padding-bottom: 0pt;
        line-height: 1;
        orphans: 2;
        widows: 2;
        text-align: left;
        height: 10pt;
      }
      .c31 {
        padding-top: 12pt;
        padding-bottom: 0pt;
        line-height: 1;
        orphans: 2;
        widows: 2;
        text-align: center;
      }
      .c6 {
        padding-top: 0pt;
        padding-bottom: 0pt;
        line-height: 1;
        orphans: 2;
        widows: 2;
        text-align: center;
      }
      .c20 {
        padding-top: 0pt;
        padding-bottom: 0pt;
        line-height: 1;
        orphans: 2;
        widows: 2;
        text-align: justify;
      }
      .c25 {
        padding-top: 0pt;
        padding-bottom: 0pt;
        line-height: 1;
        orphans: 2;
        widows: 2;
        text-align: right;
      }
      .c7 {
        padding-top: 0pt;
        padding-bottom: 0pt;
        line-height: 1;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
      .c23 {
        padding-top: 0pt;
        padding-bottom: 0pt;
        line-height: 1.15;
        text-align: left;
      }
      .c27 {
        margin-left: -7.3pt;
        border-spacing: 0;
        border-collapse: collapse;
        margin-right: auto;
      }
      .c30 {
        max-width: 728.5pt;
        padding: 56.7pt 56.7pt 35.5pt 56.7pt;
      }
      .c28 {
        font-size: 14pt;
      }
      .c10 {
        height: 10pt;
      }
      .c0 {
        height: 0pt;
      }
      .c29 {
        background-color: #ffffff;
      }
      .c24 {
        color: #333333;
      }
      .title {
        background-color: #ffffff;
        padding-top: 0pt;
        color: #000000;
        font-weight: 700;
        font-size: 10pt;
        padding-bottom: 0pt;
        font-family: "Times New Roman";
        line-height: 1;
        text-align: center;
      }
      .subtitle {
        padding-top: 18pt;
        color: #666666;
        font-size: 24pt;
        padding-bottom: 4pt;
        font-family: "Times New Roman";
        line-height: 1;
        page-break-after: avoid;
        font-style: italic;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
      li {
        color: #000000;
        font-size: 10pt;
        font-family: "Times New Roman";
      }
      p {
        margin: 0;
        color: #000000;
        font-size: 10pt;
        font-family: "Times New Roman";
      }
      h1 {
        padding-top: 24pt;
        color: #000000;
        font-weight: 700;
        font-size: 24pt;
        padding-bottom: 6pt;
        font-family: "Times New Roman";
        line-height: 1;
        page-break-after: avoid;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
      h2 {
        padding-top: 18pt;
        color: #000000;
        font-weight: 700;
        font-size: 18pt;
        padding-bottom: 4pt;
        font-family: "Times New Roman";
        line-height: 1;
        page-break-after: avoid;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
      h3 {
        padding-top: 14pt;
        color: #000000;
        font-weight: 700;
        font-size: 14pt;
        padding-bottom: 4pt;
        font-family: "Times New Roman";
        line-height: 1;
        page-break-after: avoid;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
      h4 {
        padding-top: 12pt;
        color: #000000;
        font-weight: 700;
        font-size: 12pt;
        padding-bottom: 2pt;
        font-family: "Times New Roman";
        line-height: 1;
        page-break-after: avoid;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
      h5 {
        padding-top: 11pt;
        color: #000000;
        font-weight: 700;
        font-size: 11pt;
        padding-bottom: 2pt;
        font-family: "Times New Roman";
        line-height: 1;
        page-break-after: avoid;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
      h6 {
        padding-top: 10pt;
        color: #000000;
        font-weight: 700;
        font-size: 10pt;
        padding-bottom: 2pt;
        font-family: "Times New Roman";
        line-height: 1;
        page-break-after: avoid;
        orphans: 2;
        widows: 2;
        text-align: left;
      }
    </style>
  </head>
  <body class="c29 c30 doc-content">
    <div>
      <p class="c6 c10"><span class="c18"></span></p>
      <p class="c5"><span class="c18"></span></p>
    </div>
    <p class="c6 c10"><span class="c15"></span></p>
    <p class="c6" id="h.gjdgxs">
      <span class="c15"
        >&#1060;&#1086;&#1088;&#1084;&#1072;
        &#1089;&#1087;&#1088;&#1072;&#1074;&#1082;&#1080; &#1086;
        &#1089;&#1090;&#1072;&#1078;&#1077;
        &#1087;&#1088;&#1072;&#1082;&#1090;&#1080;&#1095;&#1077;&#1089;&#1082;&#1086;&#1081;
        &#1076;&#1077;&#1103;&#1090;&#1077;&#1083;&#1100;&#1085;&#1086;&#1089;&#1090;&#1080;
      </span>
    </p>
    <p class="c20 c10"><span class="c15"></span></p>
    <p class="c25"><span class="c16">&#1060;.02-08-02-3</span></p>
    <p class="c6 c10"><span class="c15"></span></p>
    <p class="c6">
      <span class="c15"
        >&#1057;&#1087;&#1088;&#1072;&#1074;&#1082;&#1072; &#1086;
        &#1089;&#1090;&#1072;&#1078;&#1077;
        &#1087;&#1088;&#1072;&#1082;&#1090;&#1080;&#1095;&#1077;&#1089;&#1082;&#1086;&#1081;
        &#1076;&#1077;&#1103;&#1090;&#1077;&#1083;&#1100;&#1085;&#1086;&#1089;&#1090;&#1080;
      </span>
    </p>
    <p class="c6">
      <span class="c15"
        >&#1074; &#1086;&#1073;&#1083;&#1072;&#1089;&#1090;&#1080;
        &#1087;&#1088;&#1086;&#1077;&#1082;&#1090;&#1085;&#1086;&#1075;&#1086;
        &#1084;&#1077;&#1085;&#1077;&#1076;&#1078;&#1084;&#1077;&#1085;&#1090;&#1072;</span
      >
    </p>
    <p class="c10 c20"><span class="c26"></span></p>
    <p class="c29 c31">
      <span class="c11">________{{$user->surname}}___{{$user->name}}___{{$user->middlename}}________</span>
    </p>
    <p class="c6 c29">
      <span class="c17"
        >&#1060;.&#1048;.&#1054;.
        &#1082;&#1072;&#1085;&#1076;&#1080;&#1076;&#1072;&#1090;&#1072;</span
      >
    </p>
    <p class="c25 c10 c29"><span class="c11"></span></p>
    <a id="t.7f56d8a9a3480210f983d8c15ebe34757dbb3388"></a><a id="t.0"></a>
    <table class="c27">
      <tr class="c0">
        <td class="c12" colspan="1" rowspan="1">
          <p class="c6"><span class="c4">&#8470;</span></p>
        </td>
        <td class="c9" colspan="1" rowspan="1">
          <p class="c6">
            <span class="c4"
              >&#1055;&#1077;&#1088;&#1080;&#1086;&#1076;
              &#1074;&#1088;&#1077;&#1084;&#1077;&#1085;&#1080;</span
            >
          </p>
        </td>
        <td class="c21" colspan="1" rowspan="1">
          <p class="c6">
            <span class="c4"
              >&#1053;&#1072;&#1080;&#1084;&#1077;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077;
              &#1086;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1072;&#1094;&#1080;&#1080;</span
            >
          </p>
        </td>
        <td class="c3" colspan="1" rowspan="1">
          <p class="c6">
            <span class="c4"
              >&#1053;&#1072;&#1079;&#1074;&#1072;&#1085;&#1080;&#1077;
              &#1087;&#1088;&#1086;&#1077;&#1082;&#1090;&#1072;
              (&#1087;&#1088;&#1086;&#1075;&#1088;&#1072;&#1084;&#1084;&#1099;/&#1087;&#1086;&#1088;&#1090;&#1092;&#1077;&#1083;&#1103;)</span
            >
          </p>
        </td>
        <td class="c19" colspan="1" rowspan="1">
          <p class="c6">
            <span class="c4"
              >&#1055;&#1088;&#1086;&#1077;&#1082;&#1090;&#1085;&#1072;&#1103;
              &#1088;&#1086;&#1083;&#1100;</span
            >
          </p>
        </td>
        <td class="c14" colspan="1" rowspan="1">
          <p class="c6">
            <span class="c4"
              >&#1057;&#1090;&#1072;&#1078;
              &#1088;&#1072;&#1073;&#1086;&#1090;&#1099; &#1074;
              &#1076;&#1072;&#1085;&#1085;&#1086;&#1081;
              &#1088;&#1086;&#1083;&#1080; &#1089;
              &#1091;&#1095;&#1077;&#1090;&#1086;&#1084;
              &#1079;&#1072;&#1075;&#1088;&#1091;&#1079;&#1082;&#1080;</span
            >
          </p>
          <p class="c6">
            <span class="c4"
              >(&#1074; &#1084;&#1077;&#1089;&#1103;&#1094;&#1072;&#1093;)</span
            >
          </p>
        </td>
        <td class="c13" colspan="1" rowspan="1">
          <p class="c6">
            <span class="c4"
              >&#1044;&#1086;&#1089;&#1090;&#1080;&#1078;&#1077;&#1085;&#1080;&#1103;</span
            >
          </p>
        </td>
      </tr>
      <tr class="c0">
        <td class="c12" colspan="1" rowspan="1">
          <p class="c7"><span class="c8">1</span></p>
        </td>
        <td class="c9" colspan="1" rowspan="1">
          <p class="c6"><span class="c8">{{$experience->date_start}} - {{$experience->date_end}}</span></p>
        </td>
        <td class="c21" colspan="1" rowspan="1">
          <p class="c5"><span class="c8">{{$experience->org_name}}</span></p>
        </td>
        <td class="c3" colspan="1" rowspan="1">
          <p class="c5"><span class="c8">{{$experience->project_name}}</span></p>
        </td>
        <td class="c19" colspan="1" rowspan="1">
          <p class="c5"><span class="c8">{{$experience->project_role}}</span></p>
        </td>
        <td class="c14" colspan="1" rowspan="1">
          <p class="c5"><span class="c8">{{$experience->exp_stazh_s_uchetom_zagruzki}}</span></p>
        </td>
        <td class="c13" colspan="1" rowspan="1">
          <p class="c5"><span class="c8">{{$experience->achievements}}</span></p>
        </td>
      </tr>
      <tr class="c0">
        <td class="c12" colspan="1" rowspan="1">
          <p class="c7"><span class="c8">2</span></p>
        </td>
        <td class="c9" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c21" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c3" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c19" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c14" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c13" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
      </tr>
      <tr class="c0">
        <td class="c12" colspan="1" rowspan="1">
          <p class="c7"><span class="c8">3</span></p>
        </td>
        <td class="c9" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c21" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c3" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c19" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c14" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c13" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
      </tr>
      <tr class="c0">
        <td class="c12" colspan="1" rowspan="1">
          <p class="c7"><span class="c8">&hellip;</span></p>
        </td>
        <td class="c9" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c21" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c3" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c19" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c14" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
        <td class="c13" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
      </tr>
      <tr class="c0">
        <td class="c32" colspan="5" rowspan="1">
          <p class="c25">
            <span class="c8">&#1048;&#1058;&#1054;&#1043;&#1054;:</span>
          </p>
        </td>
        <td class="c14" colspan="1" rowspan="1">
          <p class="c5"><span class="c1"></span></p>
        </td>
        <td class="c13" colspan="1" rowspan="1">
          <p class="c5"><span class="c8"></span></p>
        </td>
      </tr>
    </table>
    <p class="c2 c10"><span class="c22"></span></p>
    <p class="c2">
      <span class="c22"
        >&#1056;&#1091;&#1082;&#1086;&#1074;&#1086;&#1076;&#1080;&#1090;&#1077;&#1083;&#1100;</span
      >
    </p>
    <p class="c2">
      <span class="c22"
        >/
        &#1086;&#1090;&#1074;&#1077;&#1090;&#1089;&#1090;&#1074;&#1077;&#1085;&#1085;&#1086;&#1077;
        &#1083;&#1080;&#1094;&#1086; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        _______________________ ________________________</span
      >
    </p>
    <p class="c2">
      <span class="c24 c28"
        >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp;</span
      ><span class="c24"
        >(&#1087;&#1086;&#1076;&#1087;&#1080;&#1089;&#1100;) &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&#1060;&#1048;&#1054;)</span
      >
    </p>
    <p class="c2 c10"><span class="c22"></span></p>
    <p class="c2"><span class="c22">&#1052;.&#1055;.</span></p>
    <p class="c2 c10"><span class="c22"></span></p>
  </body>
</html>