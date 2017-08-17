/* <i.mouto.org> 搜索部分 @卜卜口 */
!function($){
    var S = $('#S'),
        Si = $('input[name=s]'),
        Sl = $('#Sl'),
        T,
        T2;
    Si.on('focus change keypress keyup', function(){
        clearTimeout(T);
        T = setTimeout(function(){
            if(!(Si.val()).replace(/(\s*)/g, '')){
                Sl.innerHTML = '<li><a><h3>键入内容索引文章</h3><span>Type the content indexing articles.</span></a></li>';
            }else{
                // 接口地址，替换掉相同文件 https://github.com/itorr/imouto/blob/master/x/x.s.php
                $.post(SURL, 'key=' + Si.val(), function(p){
                    if(!p || !p.length) {
                        return Sl.html('<li><a><h3>键入内容索引文章</h3><span>Type the content indexing articles.</span></a></li>')
                    }
                    var Ks = (Si.val()).match(/([\u4e00-\u9fa5\u0800-\u4e00A-Za-z0-9]{1,12})/g),
                        Kr = RegExp('(' + (Ks || []).join('|').replace(/\|$/, '') + ')', 'i'),
                        Kg = RegExp('(' + (Ks || []).join('|').replace(/\|$/, '') + ')', 'gi');
                    var o,
                        h = '',
                        i = p.length;
                    while(i--){
                        o = p[i];
                        h += '<li><a href="' + url(o.pid) + '" class="t-' + o.category + '"><h3>' + o.title.replace(Kg, "<b>$1</b>") + '</h3><p>' + (o.text || '').replace(Kg, "<b>$1</b>") + '</p><span>' + redate(o.created) + '</span></a></li>'
                    }
                    Sl.html(h || '<li><a><h3>没有找到相关内容</h3><span>No related content found.</span></a></li>');
                })
            }
            Sl.removeClass()
        }, 200)

    });
    S.on('submit', function(){
        Si.on('focus', function(){
        });
        return false
    });
    Si.on('blur', function(){
        clearTimeout(T2);
        T2 = setTimeout(function(){
            if(!Si.val()){
                Sl.attr('class', 'h')
            }
        }, 200)
    })
}($);
/*搜索 End*/
