<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
body { 
    margin-left: 3px;
    margin-top: 0px;
    margin-right: 3px;
    margin-bottom: 0px;
}
.STYLE1 {
    color: #e1e2e3;
    font-size: 12px;
}
.STYLE6 {color: #000000; font-size: 12; }
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
    color: #344b50;
    font-size: 12px;
}
.STYLE21 {
    font-size: 12px;
    color: #3b6375;
}
.STYLE22 {
    font-size: 12px;
    color: #295568;
}
a:link{
    color:#e1e2e3; text-decoration:none;
}
a:visited{
    color:#e1e2e3; text-decoration:none;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="6%" height="19" valign="bottom"><div align="center"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>tb.gif" width="14" height="14" /></div></td>
                <td width="94%" valign="bottom"><span class="STYLE1"> 订单管理 -> 订单列表</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              <a href="<?php echo U('tianjia');?>"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>add.gif" width="10" height="10" /> 添加</a>   &nbsp; 
              </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td width="4%" height="20" bgcolor="d3eaef" class="STYLE10"><div align="center">
          <input type="checkbox" name="checkbox" id="checkbox" />
        </div></td>
        <td width="5%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单id</span></div></td>
        <td width="25%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单号</span></div></td>
        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">总金额</span></div></td>
        <td width="7%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否付款</span></div></td>
        <td width="7%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否发货</span></div></td>
        <td width="13%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">下单时间</span></div></td>
        <td width="*" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
      <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">
          <input type="checkbox" name="checkbox2" id="checkbox2" />
        </div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($v["order_id"]); ?></span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><a href="<?php echo U('Order/detail',array('order_id'=>$v['order_id']));?>" style="color:blue;"><?php echo ($v["order_number"]); ?></a></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($v["order_price"]); ?></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($v['order_status']=='0' ? '未付款' : '已付款'); ?></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($v['is_send']=='是'?'已发货':'未发货'); ?></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></div></td>

        <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
        <img src="<?php echo C('ADMIN_IMAGE_PATH');?>del.gif" width="10" height="10" /> 删除 |
         查看 | 
        <a href="<?php echo U('upd',array('order_id'=>$v['order_id']));?>" style="color:rgb(59,99,117)"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>edit.gif" width="10" height="10" /> 编辑</a>
       </div></td>
      </tr><?php endforeach; endif; ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="33%"><div align="left"><span class="STYLE22">&nbsp;&nbsp;&nbsp;&nbsp;共有<strong> 243</strong> 条记录，当前第<strong> 1</strong> 页，共 <strong>10</strong> 页</span></div></td>
        <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="49"><div align="center"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>main_54.gif" width="40" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>main_56.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>main_58.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>main_60.gif" width="40" height="15" /></div></td>
            <td width="37" class="STYLE22"><div align="center">转到</div></td>
            <td width="22"><div align="center">
              <input type="text" name="textfield" id="textfield"  style="width:20px; height:12px; font-size:12px; border:solid 1px #7aaebd;"/>
            </div></td>
            <td width="22" class="STYLE22"><div align="center">页</div></td>
            <td width="35"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>main_62.gif" width="26" height="15" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<h1><a href="<?php echo U('putExcel');?>">导出数据</a></h1>
</body>
</html>