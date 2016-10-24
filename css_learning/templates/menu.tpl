<HTML>
<HEAD>

{include file="header.tpl"}
</HEAD>

<BODY>

<h1>{$tips}</h5>
<div class='menu'>
{foreach $exercises(key,value)} 
        <A HREF='<!--{ACTION_URL}-->/{$this_action}/{@value}' > {@value}</A>
        <hr>
        <br>
{/foreach}
</div>
<p>
说明:练习CSS使用
</p>
</BODY>

</HTML>