import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql
from findsinglepath import *
from getnamefromid import *
from functions import *
from datetime import datetime

gx = sys.argv[1]
gy = sys.argv[2]

searchtime = "09:00:00"
mytime=datetime.now()
searchtime=mytime.strftime("%H%M%S")


#REMOVE  THIS

#gx = '8.524105'
#gy='76.936312'

#TILL HERE
suggs=[]
suggslen=0
con = mysql.connect(
    host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
    database="parakkumthalika",
    user="dbmasteruser",
    password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)
closerids=[]
cur=con.cursor()
response=[]
command = "select id, stopname from stops order by abs("+gx+'-lat)+abs('+gy+'-lng) asc limit 10'
cur.execute(command)
rows=cur.fetchall()
i=0
while((i<9)&(suggslen<15)):
    print(rows[i][0])
    print(rows[i][1])
    myfromloc=rows[i][0]

    con = mysql.connect(
        database="connects",
        host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
    )
    cur=con.cursor()




    commandbeta = """

    SELECT * from c"""+str(myfromloc)+""" 
    group by routeid
    order by 
        if(  (time_to_sec(time)>time_to_sec('"""+searchtime+"""')),
            (time_to_sec(time)-time_to_sec('"""+searchtime+"""')),
            (time_to_sec(time)+86400-time_to_sec('"""+searchtime+"""'))
            )
           limit 20

    """
    cur.execute(commandbeta)
    listedall=cur.fetchall()

    listedalljson=json.dumps(listedall,default=json_serial)

    listedallparsed=json.loads(listedalljson)
    #print(listedallparsed)


    for item in listedallparsed:
        d=dict()
        d['origin']=getnamefromid(str(myfromloc))
        d['busname']="KSRTC"
        d['buspic']='1'
        d['dest']=getnamefromid(str(item[5]))
        d["depart"]=hhmmss_to_hhmmam(item[2])
        d["reach"]=hhmmss_to_hhmmam(item[6])
        d['routeid']=item[3]
        suggs.append(d)
        #suggs.append(d)
    #print(json.dumps(suggs))
    #print(rows[0][1])

    suggslen=len(suggs)
    i+=1
print(json.dumps(suggs))




cur.close()
con.close()
exit(0)

