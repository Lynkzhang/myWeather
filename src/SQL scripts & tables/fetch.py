#!/usr/bin/python
# coding = utf-8  
# ToDo: get weather info from weather.com.cn
# and put the information into Database  
# Author: Lynkzhang 
# Date: 2015/05/13

import urllib2  
import json  
import hashlib
import hmac
import base64
import time
import MySQLdb

ISOTIMEFORMAT='%Y%m%d%H%M'
date= time.strftime( ISOTIMEFORMAT, time.localtime() )

areaid ='101020100'
public='http://open.weather.com.cn/data/?areaid='+areaid+'&type='+'forecast_f' +'&date='+ date+'&appid='+'06c23631e2e81a19'
address='http://open.weather.com.cn/data/?areaid='+areaid+'&type='+'forecast_f' +'&date='+ date+'&appid='+'06c236'+'&key='

myhmac=hmac.new(b'a40576_SmartWeatherAPI_b79ae1b',public,hashlib.sha1).digest().encode('base64').rstrip()

#print myhmac

#C=base64.encodestring(C)

address=address+myhmac
print address
# get weather html and parse to json  
weatherHtml = urllib2.urlopen(address).read() 
#print weatherHtml


#print address

weatherJSON = json.JSONDecoder().decode(weatherHtml)  
weatherInfo = weatherJSON
weatherc = weatherInfo['c']
weatherf = weatherInfo['f']
weatherf1= weatherf['f1']


city     = weatherc['c3'].encode('utf8')
city_en  = weatherc['c2'].encode('utf8')
date_y   = weatherf['f0'].encode('utf8')
temp1    = weatherf1[0]['fc'].encode('utf8')
temp2    = weatherf1[0]['fd'].encode('utf8')
weather2 = weatherf1[0]['fb'].encode('utf8')
weather1 = weatherf1[0]['fa'].encode('utf8')
windd1    = weatherf1[0]['fe'].encode('utf8')
windd2    = weatherf1[0]['ff'].encode('utf8')
windp1    = weatherf1[0]['fg'].encode('utf8')
windp2    = weatherf1[0]['fh'].encode('utf8')
#index_d  = weatherInfo['f']['f1']['index_d'].encode('utf8')

#print temp1
#print temp2
#print weather1
#print weather2
#print windd1
#print windd2
#print windp1
#print windp2


try:
    conn=MySQLdb.connect(host='localhost',user='root',passwd='yoourpassword')
    cur=conn.cursor()
     
    #cur.execute('create database if not exists weather')
    conn.select_db('weather')
    
    #cur.execute('create table if not exists '+city_en+' (date char(20) unique,temp_day int,temp_night int, weather_day int, weather_night int, windd_day int,windd_night int, windp_day int,windp_night int)')
    cur.execute('insert into '+city_en+' values('+date_y+','+temp1+','+temp2+','+weather1+','+weather2+','+windd1+','+windd2+','+windp1+','+windp2+') ')
    print 'success!' 

    conn.commit()
    cur.close()
    conn.close()
 
except MySQLdb.Error,e:
     print "Mysql Error %d: %s" % (e.args[0], e.args[1])

