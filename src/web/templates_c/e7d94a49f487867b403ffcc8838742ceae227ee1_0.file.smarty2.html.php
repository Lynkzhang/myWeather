<?php /* Smarty version 3.1.25, created on 2015-06-18 18:17:30
         compiled from "/usr/share/nginx/www/smarty2.html" */ ?>
<?php
/*%%SmartyHeaderCode:166814329955829abaa56639_36174901%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7d94a49f487867b403ffcc8838742ceae227ee1' => 
    array (
      0 => '/usr/share/nginx/www/smarty2.html',
      1 => 1434622647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166814329955829abaa56639_36174901',
  'variables' => 
  array (
    'db_count' => 0,
    'db_coltitle' => 0,
    'col' => 0,
    'db_rows' => 0,
    'dbrow' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.25',
  'unifunc' => 'content_55829abaf35241_93506478',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55829abaf35241_93506478')) {
function content_55829abaf35241_93506478 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '166814329955829abaa56639_36174901';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.8.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="smarty2.js"><?php echo '</script'; ?>
>
<title><?php echo @constant('DB_TABLENAME');?>
</title>
<style>

body {
    width: 600px;
    margin: 40px auto;
    font-family: 'trebuchet MS', 'Lucida sans', Arial;
    font-size: 14px;
    color: #444;
}

table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}
</style>
</head>
<body>
  
<h1>目前支持以下城市</h1>
<table  class="bordered" id="Table">
<caption style="font-size:15px">当前记录数：<label id="tableRowCount"><?php echo $_smarty_tpl->tpl_vars['db_count']->value;?>
</label>  &nbsp;&nbsp;&nbsp; <input type="button" value="Add" onclick="addFun()" />  &nbsp;&nbsp;&nbsp; <input type="button" value="查询城市ID" onclick="location='cityid.php'" />&nbsp;&nbsp;&nbsp; <input type="button" value="fedback" onclick="location='fedback.php'"/>
</caption>

<?php
$_from = $_smarty_tpl->tpl_vars['db_coltitle']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['col'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['col']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
$foreach_col_Sav = $_smarty_tpl->tpl_vars['col'];
?>
    <th><?php echo $_smarty_tpl->tpl_vars['col']->value;?>
</th>
<?php
$_smarty_tpl->tpl_vars['col'] = $foreach_col_Sav;
}
?>
<th>操作</th>
<?php
$_from = $_smarty_tpl->tpl_vars['db_rows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['dbrow'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['dbrow']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['dbrow']->value) {
$_smarty_tpl->tpl_vars['dbrow']->_loop = true;
$foreach_dbrow_Sav = $_smarty_tpl->tpl_vars['dbrow'];
?>
    <tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['dbrow']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['val']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$foreach_val_Sav = $_smarty_tpl->tpl_vars['val'];
?>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</td>
    <?php
$_smarty_tpl->tpl_vars['val'] = $foreach_val_Sav;
}
?>
	<td>
		<input type="button" value="Edit" onclick="editFun('<?php echo $_smarty_tpl->tpl_vars['dbrow']->value['cityid'];?>
', '<?php echo $_smarty_tpl->tpl_vars['dbrow']->value['cityname'];?>
', '<?php echo $_smarty_tpl->tpl_vars['dbrow']->value['cityname_en'];?>
');" />
		<input type="button" value="Delete" onclick="deleteFun('<?php echo $_smarty_tpl->tpl_vars['dbrow']->value['cityid'];?>
')" />
		<input type="button" value="Detail" onclick="location='detailed.php?city=<?php echo $_smarty_tpl->tpl_vars['dbrow']->value['cityname_en'];?>
'" />
	</td> 
    </tr>
<?php
$_smarty_tpl->tpl_vars['dbrow'] = $foreach_dbrow_Sav;
}
?>
</table>

<div id="editdiv" style="display:none;color:red;" align="center">
 <form>
 cityid:<input type=text id="editdiv_id" />
 cityname:<input type=text id="editdiv_name" />
 cityname_en:<input type=text id="editdiv_age" />
 <input type=button name="Updata" value="Updata" onclick="updataFun()" />
</form>
</div>
<div id="adddiv" style="display:none;color:green;" align="center">
 <form>
 cityid:<input type=text id="adddiv_id" />
 cityname:<input type=text id="adddiv_name" />
 cityname_en:<input type=text id="adddiv_age" />
 <input type=button name="Insert" value="Insert" onclick="insertFun()" / >
</form>
</div>
<input type="button" value="Homepage" onclick="location='index.php'" />

</body>
</html>
<?php }
}
?>