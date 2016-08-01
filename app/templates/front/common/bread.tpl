<ol class="breadcrumb">
  <li><a href="/">首页</a></li>
  {%foreach from=$bread item=item key=key%}
  <li><a href="{%$item.url%}">{%$item.name%}</a></li>
  {%/foreach%}
</ol>
