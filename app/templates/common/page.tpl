<div class="row">
    <div class="pagination-count">
        {%$info%}
    </div>
    <ul class="pagination">
        <li class="previous {%if !$prepg%}disabled{%/if%}">
            <a href="{%if !$prepg%}javascript:void(0);{%else%}{%$prepg%}{%/if%}">上一页</a></li>
        <li class="frist"><a href="{%$first%}">首页</a></li>
        {%section name=sec loop=$pages start=$start max=$max%}
            <li class="{%if $currpage eq $pages[sec].page%}active{%/if%}" tabindex="0">
                <a href="{%$pages[sec].url%}">{%$pages[sec].page%}</a></li>
        {%/section%}
        <li class="last"><a href="{%$last%}">末页</a></li>
        <li class="next {%if !$nextpg%}disabled{%/if%}">
            <a href="{%if !$nextpg%}javascript:void(0);{%else%}{%$nextpg%}{%/if%}">下一页</a></li>
    </ul>
</div>