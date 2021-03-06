# -*- coding: utf-8 -*-
import smtplib  
import urllib2
import json
import hashlib
import hmac
import base64
import time
import MySQLdb
from email.mime.text import MIMEText  
mail_host="smtp.qq.com"  #设置服务器
mail_user="yourusername"    #用户名
mail_pass="yourpassword"   #口令 
mail_postfix="qq.com"  #发件箱的后缀
mailto_list=["??@??.??"]
def send_mail(to_list,sub,content):  #to_list：收件人；sub：主题；content：邮件内容
    me="myWeather"+"<"+"yourusername"+"@"+"qq.com"+">"   #这里的hello可以任意设置，收到信后，将按照设置显示
    msg = MIMEText(content,_subtype='html',_charset='utf-8')    #创建一个实例，这里设置为html格式邮件
    msg['Subject'] = "今日天气"    #设置主题
    msg['From'] = me  
    msg['To'] = ";".join(to_list)  
    try:  
        s = smtplib.SMTP()  
        s.connect(mail_host)  #连接smtp服务器
        s.login(mail_user,mail_pass)  #登陆服务器
        s.sendmail(me, to_list, msg.as_string())  #发送邮件
        s.close()  
        return True  
    except Exception, e:  
        print str(e)  
        return False  





from warnings import filterwarnings
filterwarnings('ignore', category = MySQLdb.Warning)
ISOTIMEFORMAT='%Y%m%d%H%M'
date= time.strftime( ISOTIMEFORMAT, time.localtime() )

conn=MySQLdb.connect(host='localhost',user='root',passwd='yourpassword')
cur=conn.cursor()


conn.select_db('weather')
cur.execute('select * from maillist')
print 'start sending e-mails!'
data = cur.fetchall()

for i in data:
	areaid = '%d'%i[3]
	name = i[1]
	mailto_list[0]=i[2]	
	cur.execute('select * from cityname_id where cityid = '+ areaid)
	res = cur.fetchone()
	cityname = res [2]
	cur.execute('select * from '+ res[2] +' order by date desc limit 1' )
	res = cur.fetchone()
	tempd=res[1]
	tempn=res[2]
	weathercoded=res[3]
	weathercoden=res[4]
	cur.execute('select * from weathercode where code = %d'%weathercoded )
	res = cur.fetchone()
	weatherday = res[2];
	cur.execute('select * from weathercode where code = %d'%weathercoden )
        res = cur.fetchone()
        weathernight = res[2];
	
	cur.execute('select * from advices  where weather =' +'\''+weatherday+'\'' )
        res = cur.fetchone()
        adviceday = res[1];
	cur.execute('select * from advices where weather = '+'\''+weathernight+'\'' )
        res = cur.fetchone()
        advicenight = res[1];

	text="Today " + cityname  +"\'s temperature is:"
	text=text + "<br>day:%d°C    <br>night:%d°C   "%(tempd,tempn)
	text=text + "<br> weather today is:<br>"
	text=text + "day:"+weatherday
	text=text + "	<br>"+adviceday
	text=text + "<br>night:"+weathernight
	text=text + "   <br>"+advicenight
	text=text + "<br><hr/> Good Luck!<br>myWeather 敬上"
			
	if send_mail(mailto_list,"hello",text):  
		print "发送成功",mailto_list  
	else:  
        	print "发送失败"
