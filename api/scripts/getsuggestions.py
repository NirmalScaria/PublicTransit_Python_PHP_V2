import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import simplejson as json
import mysql.connector as mysql
from findsinglepath import *
from getnamefromid import *
from functions import *


gx = sys.argv[1]
gy = sys.argv[2]


#REMOVE  THIS

gx = '8.524105'
gy='76.936312'

#TILL HERE


con = mysql.connect(
    host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
    database="parakkumthalika",
    user="dbmasteruser",
    password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)
closerids=[]
cur=con.cursor()
response=[]
command = "select id from stops order by abs("+gx+'-lat)+abs('+gy+'-lng) asc limit 10'
cur.execute(command)
rows=cur.fetchall()
print(rows[0][0])
print(getnamefromid(str(1185)))
myfromloc=rows[0][0]

con = mysql.connect(
    database="connects",
    host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
    user="dbmasteruser",
    password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
)
cur=con.cursor()
searchtime = "090000"

command = "select * from c"+str(myfromloc)+" where time_to_sec(time)>time_to_sec('"+searchtime+"') group by routeid,target order by (if(time_to_sec(time)>time_to_sec('"+searchtime+"'),time_to_sec(time)-time_to_sec('"+searchtime+"'),time_to_sec(time)+86400-time_to_sec('"+searchtime+"'))),reachtime desc limit 10"
print(command)
cur.execute(command)
listedall=cur.fetchall()

listedalljson=json.dumps(listedall,default=json_serial)

listedallparsed=json.loads(listedalljson)


suggs=[]
for item in listedallparsed:
    d=dict()
    d['origin']=getnamefromid(str(myfromloc))
    d['busname']="KSRTC"
    d['buspic']='1'
    d['dest']=getnamefromid(str(item[1]))
    d["depart"]=hhmmss_to_hhmmam(item[2])
    d["reach"]=hhmmss_to_hhmmam(item[4])
    d['routeid']=item[3]
    suggs.append(d)
    #suggs.append(d)
#print(json.dumps(suggs))
#print(rows[0][1])

print(json.dumps(suggs))





cur.close()
con.close()
exit(0)


for i in range(len(rows)):

    closerids.append(rows[i][0])
#REMOVE THIS AFTER TESTING
closerids[0]=666
closerids[1]=55
#TILL HERE

myorig=closerids[0]
del closerids[0]
#print(closerids)


suggs=[]
d=dict()
presenttime=105900
#print(djson)
for i_dest in closerids:
    responseraw = findsinglepath(str(myorig),str(i_dest),str(presenttime),str(18000))
    responsejson = json.loads(responseraw)
    smallestitem=dict()
    smallestitem['wait']=9999999
    smallestitem['dest']=i_dest
    smallestitem['origin']=myorig
    smallestitem['busname']="KSRTC"
    smallestitem['buspic']='1'
    for item in responsejson:
        d=dict()
        d["depart"]=item[2]
        d["reach"]=item[4]
        d['routeid']=item[3]
        d['wait']=get_sec(d['depart'])-no_colons_to_sec(str(presenttime))
        if(smallestitem['wait']>d['wait']):
            smallestitem['depart']=d['depart']
            smallestitem['reach']=d['reach']
            smallestitem['routeid']=d['routeid']
            smallestitem['wait']=d['wait']
        #suggs.append(d)
    #print(json.dumps(suggs))
    #print(rows[0][1])
    suggs.append(smallestitem)
j=0
dell=0
totlen=len(suggs)
#print(suggs)
for i in range(len(suggs)):
    if(j<totlen-dell):
        if(suggs[i]['wait']>999999):
            del suggs[i]
            dell+=1
        suggs[i]['dest']=getnamefromid(str(suggs[i]['dest']))
        suggs[i]['origin']=getnamefromid(str(suggs[i]['origin']))
        j+=1
    
#print(smallestitem)
print(json.dumps(suggs))
for r in rows:
    response.append(r)
# for item in response:
#     print(item)
cur.close()
con.close()