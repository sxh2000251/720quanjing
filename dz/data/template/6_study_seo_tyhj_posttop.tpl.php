<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$posttop = <<<EOF

<div class="pob cl tyhj_posttop" style="background:{$specialbg};border:1px dashed {$study_border};">
<em class="tyhj_posttop_em">
<b>���ĺ�����һ�£�</b>
<a class="tyhj_baidu" href="http://www.baidu.com/s?wd={$keyword['gbk']}{$site}" title="�ٶ�һ����ص�����" target="_blank">�ٶ�</a>
<a class="tyhj_google" href="http://www.google.com.hk/search?sourceid=chrome&amp;ie=UTF-8&amp;q={$keyword['utf8']}{$site}" title="�ùȸ�������ص�����" target="_blank">�ȸ�</a>
<a class="tyhj_360" href="http://www.so.com/s?q={$keyword['utf8']}{$site}" title="360������ص�����" target="_blank">360</a>
<a class="tyhj_sogou" href="http://www.sogou.com/web?query={$keyword['gbk']}{$site}" title="���ѹ�������ص�����" target="_blank">�ѹ�</a>
<a class="tyhj_soso" href="http://www.soso.com/q?pid=s.idx&amp;w={$keyword['gbk']}{$site}" title="��SOSO������ص�����" target="_blank">����</a>
<a class="tyhj_youdao" href="http://www.yodao.com/search?keyfrom=web.suggest&amp;q={$keyword['gbk']}{$site}" title="���е�������ص�����" target="_blank">�е�</a>
<a class="tyhj_gfsoso" href="http://www.gfsoso.com/?q={$keyword['gbk']}{$site}" title="�ùȷ�������ص�����" target="_blank">�ȷ�</a>
<a class="tyhj_yahoo" href="https://sg.search.yahoo.com/search?p={$keyword['utf8']}{$site}" title="���Ż�������ص�����" target="_blank">�Ż�</a>
<a class="tyhj_bing" href="http://cn.bing.com/search?q={$keyword['utf8']}{$site}" title="�ñ�Ӧ������ص�����" target="_blank">��Ӧ</a>
<a class="tyhj_jike" href="http://www.chinaso.com/search/pagesearch.htm?q={$keyword['utf8']}{$site}" title="�ü���������ص�����" target="_blank">����</a>
</em>
</div>

EOF;
?>