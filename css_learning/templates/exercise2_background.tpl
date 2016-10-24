<HTML>
<HEAD>
{include file="header.tpl"}
</HEAD>

<BODY>
<div class='content'>

<h5>background属性</h5>

<ul>
<li>background-color</li>
	<li>background-image</li>
	<li>background-repeat</li>
	<li>background-attachment</li>
	<li>background-position</li>
</ul>
<h6>背景图像- 设置定位与不平铺</h6>

<pre>
body
{
background-image:url('img_tree.png');
background-repeat:no-repeat;
background-position:right top;
} 
</pre>
<h6>背景- 简写属性</h6>
<pre>
在以上实例中我们可以看到页面的背景颜色通过了很多的属性来控制。

为了简化这些属性的代码，我们可以将这些属性合并在同一个属性中.

背景颜色的简写属性为 "background":
实例
body {background:#ffffff url('img_tree.png') no-repeat right top;}
</pre>

<pre>
 当使用简写属性时，属性值的顺序为：:

    background-color
    background-image
    background-repeat
    background-attachment
    background-position
</pre>

<h6>background-attachment属性</h6>

<pre>
scroll 	背景图片随页面的其余部分滚动。这是默认
fixed 	背景图像是固定的
inherit 	指定background-attachment的设置应该从父元素继承
</pre>
<div>

<div>

</BODY>

</HTML>