//在表格的第一列中查找等于指定ID的行
function SearchIdInTable(tablerow, findid)
{
    var i;
    var tablerownum = tablerow.length;
	for (i = 1; i < tablerownum; i++)
		if ($("#Table tr:eq(" + i + ") td:eq(0)").html() == findid)
			return i;
	return -1;
}
//用CSS控制奇偶行的颜色
function SetTableRowColor()
{
	$("#Table tr:odd").css("background-color", "#e6e6fa");
$("#Table tr:even").css("background-color", "#fff0fa");
$("#Table tr:odd").hover(
	function(){$(this).css("background-color", "orange");},
	function(){$(this).css("background-color", "#e6e6fa");}		
);
$("#Table tr:even").hover(
	function(){$(this).css("background-color", "orange");},
	function(){$(this).css("background-color", "#fff0fa");}		
);
}
//响应edit按钮
function editFun(id, name, age)
{
    $("#editdiv").show();
    $("#adddiv").hide();

    $("#editdiv_id").val(id);
    $("#editdiv_name").val(name);
    $("#editdiv_age").val(age);
}
//响应add按钮
function addFun()
{ 
    $("#editdiv").hide();
    $("#adddiv").show();    
}
//记录条数增加
function IncTableRowCount()
{
	var tc = $("#tableRowCount");
	tc.html(parseInt(tc.html()) + 1);
}
//记录条数减少
function DecTableRowCount()
{
	var tc = $("#tableRowCount");
	tc.html(parseInt(tc.html()) - 1);
}
//增加一行
function addRowInTable(cityid, cityname, cityname_en)
{
    //新增加一行
    var appendstr = "<tr>";
    appendstr += "<td>" + cityid + "</td>";
    appendstr += "<td>" + cityname + "</td>";
    appendstr += "<td>" + cityname_en + "</td>";
    appendstr += "<td><input type=\"button\" value=\"Edit\" onclick=\"editFun(cityid, cityname, cityname_en);\" />";
    appendstr += "<input type=\"button\" value=\"Delete\" onclick=\"deleteFun(cityid)\" />";
    appendstr += "<input type=\"button\" value=\"Refresh\" onclick=\"location='admin.php'\"  /></td>";
    appendstr += "</tr>";       	
    $("#Table").append(appendstr);
    IncTableRowCount();
}
//修改某一行
function updataRowInTable(cityid, newname, newname_en)
{
    var i = SearchIdInTable($("#Table tr"), cityid);
    if (i != -1)
    {
	$("#Table tr:eq(" + i + ") td:eq(1)").html(newname != "" ? newname : " ");
        $("#Table tr:eq(" + i + ") td:eq(2)").html(newname_en != "" ? newname_en : " ");
        $("#editdiv").hide();
    }
}
//删除某一行
function deleteRowInTable(cityid)
{
	var i = SearchIdInTable($("#Table tr"), cityid);
	if (i != -1)
	{	
		//删除表格中该行
		$("#Table tr:eq(" + i + ")").remove();
		SetTableRowColor();
		DecTableRowCount();
	}
}
//增加删除修改数据库函数 通过AJAX与服务器通信
function insertFun()
{
    var cityid =$("#adddiv_id").val();
    var cityname = $("#adddiv_name").val();
    var cityname_en = $("#adddiv_age").val();

    //submit to server 返回插入数据的id
    $.post("insert.php", {cityid:cityid,cityname:cityname,cityname_en:cityname_en}, function(data){
        if (data == "f")
        {
            alert("Insert date failed");
        }
        else
        {
            addRowInTable(cityid, cityname, cityname_en);
    	    SetTableRowColor();
    	    $("#adddiv").hide();
        }
    });
}
function deleteFun(cityid)
{
	if (confirm("确认删除?"))
	{
		//submit to server
		$.post("delete.php", {cityid:cityid}, function(data){
			if (data == "f")
			{
			  alert("delete date failed");
			}
			else
			{
                deleteRowInTable(cityid);
			}
	    });
	}
}
function updataFun()
{
    var cityid = $("#editdiv_id").val();
    var cityname = $("#editdiv_name").val();
    var cityname_en = $("#editdiv_age").val(); 

    //submit to server
    $.post("updata.php", {cityid:cityid, cityname:cityname, cityname_en:cityname_en}, function(data){
        if (data == "f")
        {
            alert("Updata date failed");
        }
        else
        {
            updataRowInTable(cityid, cityname, cityname_en);
	    }
    });
}
  
$(document).ready(function()
{
	SetTableRowColor();
	UpdataTableRowCount();
});  
