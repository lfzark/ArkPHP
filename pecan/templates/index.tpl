<HTML>
<HEAD>
<TITLE>Infomation</TITLE>
{include file="header.tpl"}
</HEAD>

<BODY>

<h5 class="form-signin-heading" align="center">{$tips}</h5>
<textarea id='editor'>

</textarea>
</BODY>

<script type="text/javascript">
var simplemde = new SimpleMDE({ element: document.getElementById("editor"),
  renderingConfig: {
        singleLineBreaks: false,
        codeSyntaxHighlighting: true,
    } });
alert(simplemde.value());
</script>
</HTML>