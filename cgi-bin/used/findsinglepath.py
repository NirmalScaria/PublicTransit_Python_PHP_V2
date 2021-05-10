import sys
import requests
sys.path.insert(0,'/var/www/scripts/bets')
import mysql.connector as mysql
import json
from datetime import date, datetime
def json_serial(obj):
    """JSON serializer for objects not serializable by default json code"""

    if isinstance(obj, (datetime, date)):
        return obj.isoformat()
    else:
        return(str(obj))
def findsinglepath(start,dest,time,startlagmax):
    con = mysql.connect(
        host="parakkumthalika.in",
        database="parakcyy_connects",
        user="parakcyy_admin",
        password="Nirmal#21",
    )
    cur=con.cursor()

    #start=666
    #dest=55
    #time="091000"

    command="select * from c"+str(start)+" where target="+str(dest)+" and ((time_to_sec(time)>time_to_sec('"+time+"') and time_to_sec(time)-time_to_sec('"+time+"')<'"+startlagmax+"') or (time_to_sec(time)+86400>time_to_sec('"+time+"') and time_to_sec(time)+86400-time_to_sec('"+time+"')<'"+startlagmax+"')) order by if(time_to_sec(reachtime)>time_to_sec('"+time+"'),time_to_sec(reachtime)-time_to_sec('"+time+"'),time_to_sec(reachtime)+86400-time_to_sec('"+time+"')) limit 30;"


    cur.execute(command)
    listedall=cur.fetchall()
    #print listedall
    listedalljson=json.dumps(listedall,default=json_serial)

    listedallparsed=json.loads(listedalljson)


    return listedalljson

    # for i in range(0,7):
    #     for item in listedallparsed[i]:
    #         print item,
    #     print "."

    # for i in range(0,len(listedall)):
    #     listed=(listedall[i])
    #     listedid=(listed[1])
    #     listedname=json.loads(listed[0])
    #     listedname=[1105 if x == "REALLYWENTWRONG" else x for x in listedname]
    #     listedname=json.dumps(listedname)
    #     print listedname
    #     print listedid
    #     cur.execute("update routes set stops = '"+listedname+"' where id = "+str(listedid))
    cur.close()
    con.close()