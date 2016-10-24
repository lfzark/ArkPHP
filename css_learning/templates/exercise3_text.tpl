<HTML>
<HEAD>
{include file="header.tpl"}
</HEAD>

<BODY>
<div class='content'>
<h5>CSS Text</h5>
<h6>文本的对齐方式</h6>
<pre>
当text-align设置为"justify"，每一行被展开为宽度相等，左，右外边距是对齐（如杂志和报纸）。
h1 {text-align:center;}
p.date {text-align:right;}
p.main {text-align:justify;} 
</pre>
<p class='test_justify'>
just for justify 
just for test
just for justify 
just for test
just for justify 
just for test
just for justify 
just for test
just for justify 
just for test
</p>
<pre>
注释：text-justify 属性只在 IE 中有效。
</pre>

<h6>文本修饰</h6>
<pre>
 {text-decoration:overline;}
 {text-decoration:line-through;}
 {text-decoration:underline;}
 {text-decoration:none;}
</pre>
<p class='overline'>
overline;
</p>
<p class='line-through'>
line-through;
</p>


<h6>文本转换</h6>
<pre>
p.uppercase {text-transform:uppercase;}
p.lowercase {text-transform:lowercase;}
p.capitalize {text-transform:capitalize;}
</pre>
<p class='uppercase'>
uppercase
</p>
<p class='lowercase'>
LOWERCASE
</p>
<p class='capitalize'>
capitalize
</p>

<h6>文本缩进</h6>
<pre>
p {text-indent:50px;}
</pre>


<div>

<div>

</BODY>

</HTML>