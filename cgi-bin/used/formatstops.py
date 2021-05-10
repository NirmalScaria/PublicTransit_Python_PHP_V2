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

con = mysql.connect(
    host="parakkumthalika.in",
    database="parakcyy_parakkumthalika",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cur=con.cursor()

#start=666
#dest=55
#time="091000"
command = "select * from stops where id >=2379 and id<2380 order by id"
cur.execute(command)
res = cur.fetchall()
for item in res:
    stopid=item[0]
    placename= item[1]
    url="https://maps.googleapis.com/maps/api/geocode/json?address="+"Valiathovala"+"+india&key=AIzaSyBp2s6hbm3v-ZNH1RK-n3gfM3vTUaq-H90"
    jsonres=requests.get(url).content
    parsed=json.loads(jsonres)
    if(parsed["status"]=="OK"):
        resq= parsed['results']
        lat= resq[0]['geometry']['location']['lat']
        lon=resq[0]['geometry']['location']['lng']
        placeid=resq[0]['place_id']
        distr=""
        if(len(resq[0]['address_components'])>1):
            distr=resq[0]['address_components'][1]["long_name"]
        state="KERALA"
        if(len(resq[0]['address_components'])>2):
            state=resq[0]['address_components'][2]["long_name"]

        query="update stops set placeid='"+placeid+"' ,state='"+state+"' ,district='"+distr+"', lat="+str(lat)+", lng="+str(lon)+" where id = "+str(stopid)
        
        print stopid
        cur.execute(query)

cur.close()
con.close()