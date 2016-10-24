<HTML>
<HEAD>
{include file="header.tpl"}
</HEAD>

<BODY>
<div class='content'>

<h5>CSS 注释</h5>
<pre>
CSS注释以 "/*" 开始, 以 "*/" 结束
/*这是个注释*/
</pre>

<div>

<h5>id 和 class 选择器</h5>
<h6>id 选择器</h6>
<pre>
#para1
{
text-align:center;
color:red;
} 
</pre>

<h6>class 选择器</h6>
<pre>
.para1
{
text-align:center;
color:red;
} 
</pre>

<h6>指定特定的HTML元素使用class</h6>
<pre>
在以下实例中, 所有的 p 元素使用 class="center" 让该元素的文本居中:
p.center {text-align:center;} 
</pre>

<pre>
类名的第一个字符不能使用数字！它无法在 Mozilla 或 Firefox 中起作用。
</pre>

<h5>多重样式将层叠为一个,优先级</h5>
<pre>
一般而言，所有的样式会根据下面的规则层叠于一个新的虚拟样式表中，其中数字 4 拥有最高的优先权。

1.浏览器缺省设置
2.外部样式表
3.内部样式表（位于 <head> 标签内部）
4.内联样式（在 HTML 元素内部）

</pre>

<div>

</BODY>

</HTML>