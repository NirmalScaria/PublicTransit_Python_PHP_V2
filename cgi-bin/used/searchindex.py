#!/usr/bin/python
import sys
sys.path.insert(0, "/home/parakcyy/scripts")
import json
import mysql.connector as mysql
def getnamefromid(inpid,cur2):
    cur2.execute("select stopname from stops where id="+inpid)
    #print("COMMAND IS: "+"select stopname from stops where stopname like '"+origin.upper()+"%'  order by id limit 10")
    rows=cur2.fetchall()
    if(len(rows)==0):
        return "REALLYWENTWRONG"
    else:
        return (rows[0][0])

    cur.close()
    con.close()



def to_seconds(timestr):
    seconds= 0
    for part in timestr.split(':'):
        seconds= seconds*60 + int(part)
    return seconds



#from funfilltyping import *
#from fungetnamefromid import *
from findsinglepath import *
from finddoubleconnect import *
con = mysql.connect(
    host="parakkumthalika.in",
    database="parakcyy_routes",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cur=con.cursor(buffered=True)

cona = mysql.connect(
    host="parakkumthalika.in",
    database="parakcyy_parakkumthalika",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cura=cona.cursor()

source = sys.argv[1]
destin = sys.argv[2]
time = sys.argv[3]
startlagmax=sys.argv[4]
minlayover=sys.argv[5]
maxlayover=sys.argv[6]
numberofresults=30




jsonsinglepaths= findsinglepath(source,destin,time,startlagmax)
singlepaths=json.loads(jsonsinglepaths)
result=[]




# tags="REACH FIRST"


# for item in singlepaths:
#     cur.execute("select * from routes where id="+str(item[3]))
#     res1=cur.fetchall()
    
    # numberofsteps=1
    # origin=getnamefromid(str(res1[0][2]))

    # #str(item[3])
    # dest=getnamefromid(str(res1[0][3]))
    # getinp=getnamefromid(source)
    # getoutp=getnamefromid(destin)
    # getint=item[2]
    # getoutt=item[4]
    # typeofbus="ksrtc"
    # nameofbus=res1[0][1]
    
    
    
    
    
    
    # tags="ROUTE"
#json2=json.dumps(result)



jsondoublepaths= finddoubleconnect(source,destin,time,startlagmax,minlayover,maxlayover,numberofresults)
doublepaths=json.loads(jsondoublepaths)


for i in range(0,len(singlepaths)):
    singlepaths[i]=[1]+singlepaths[i]
    tags=["DIRECT"]
    singlepaths[i]=[tags]+singlepaths[i]
    singlepaths[i]=[(singlepaths[i][7])]+singlepaths[i]
    #print item
for i in range(0,len(doublepaths)):
    tags = ["CONNECT"]
    doublepaths[i]=[2]+doublepaths[i]
    doublepaths[i]=[tags]+doublepaths[i]
    doublepaths[i]=[doublepaths[i][12]]+doublepaths[i]
    #print item
masterres=singlepaths+doublepaths
masterres=sorted(masterres,key=lambda x:x[0])[:26]

finalresult=[]
for i in range(0,len(masterres)):
    if(i==0):
        if(masterres[i][2]==1):
            masterres[i][1]=["FIRST"]+masterres[i][1]
        else:
            masterres[i][1]=["FIRST"]
    if(i==1):
        if(masterres[i][2]==1):
            masterres[i][1]=["SECOND"]+masterres[i][1]
        else:
            masterres[i][1]=["SECOND"]
    if(masterres[i][2]==1):
        tags=masterres[i][1]

        cur.execute("select * from routes where id="+str(masterres[i][6])+";")
        res1=cur.fetchall()
        numberofsteps=1
        origin=getnamefromid(str(res1[0][2]),cura)
        dest=getnamefromid(str(res1[0][3]),cura)
        getinp=getnamefromid(source,cura)
        getoutp=getnamefromid(destin,cura)
        getint=masterres[i][5]
        getoutt=masterres[i][7]
        typeofbus="ksrtc"
        nameofbus=res1[0][1]
        objres={
            "numberofsteps":numberofsteps,
            "tags":tags,
            "typeofbus":typeofbus,
            "nameofbus":nameofbus,
            "originofbus":origin,
            "destofbus":dest,
            "getinp":getinp,
            "getint":getint,
            "getoutp":getoutp,
            "getoutt":getoutt
        }

    if(masterres[i][2]==2):

        cur.execute("select * from routes where id="+str(masterres[i][6])+";")
        route1=cur.fetchall()
        cur.execute("select * from routes where id="+str(masterres[i][12])+";")
        route2=cur.fetchall()

        objres={
            "numberofsteps":2,
            "tags":masterres[i][1],
            "typeofbus":["ksrtc","ksrtc"],
            "nameofbus":[route1[0][1],route2[0][1]],
            "originofbus":[getnamefromid(str(route1[0][2]),cura),getnamefromid(str(route2[0][2]),cura)],
            "destofbus":[getnamefromid(str(route1[0][3]),cura),getnamefromid(str(route2[0][3]),cura)],
            "getinp":[getnamefromid(str(source),cura),getnamefromid(str(masterres[i][4]),cura)],
            "getint":[masterres[i][5],masterres[i][10]],
            "getoutp":[getnamefromid(str(masterres[i][4]),cura),getnamefromid(str(destin),cura)],
            "getoutt":[masterres[i][7],masterres[i][11]]
        }

    finalresult+=[(objres)]
#for item in masterres:
    #print item
finalresultjson=json.dumps(finalresult)

# print "single:"
# for item in singlepaths:
#     print item
# print "double:"
# for item in doublepaths:
#     print item
# print "final:"
# for item in masterres:
#     print item
    
    
    
print finalresultjson

# print "singlepaths:"
# print singlepaths
# print "doublepaths:"
# print doublepaths



cur.close()
con.close()


#print json2
